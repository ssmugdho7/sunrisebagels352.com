<?php
header('Content-Type: application/json; charset=utf-8');
session_start();
require_once dirname(__DIR__).'/library/helpers.php';
$cfg = require app_path('config/openai.php');
$input = json_decode((string)file_get_contents('php://input'), true);
$message = trim((string)($input['message'] ?? ''));
if ($message === '' || (function_exists('mb_strlen') ? mb_strlen($message) : strlen($message)) > 500) { http_response_code(422); echo json_encode(['error'=>'Please enter a shorter question.']); exit; }
$now = time();
$_SESSION['chat_times'] = array_values(array_filter($_SESSION['chat_times'] ?? [], fn($t)=>$t > $now-60));
if (count($_SESSION['chat_times']) >= 12) { http_response_code(429); echo json_encode(['error'=>'Please wait a moment before sending another question.']); exit; }
$_SESSION['chat_times'][] = $now;
$key = (string)($cfg['api_key'] ?? '');
if ($key === '' || $key === 'Harold Cabrera') { echo json_encode(['reply'=>'The Sunrise AI Concierge is installed and ready. The owner still needs to replace the placeholder in config/openai.php with an OpenAI API key.']); exit; }
$settings = settings(); $menu = menu_data();
$context = json_encode(['business'=>$settings,'menu'=>$menu], JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
$payload = [
  'model' => $cfg['model'] ?? 'gpt-5.1',
  'instructions' => 'You are the Sunrise Bagels & Deli website concierge. Be concise, friendly and sales-oriented. Answer only from the supplied business settings and menu. Never invent prices, hours, ingredients, policies, delivery availability or allergen guarantees. If a price is 0.00, explain that final pricing is being updated and suggest contacting the restaurant. For allergy questions, advise the customer to confirm directly with staff. Encourage online ordering or catering only when relevant. Business data: '.$context,
  'input' => $message,
  'max_output_tokens' => 300
];
$ch = curl_init($cfg['endpoint'] ?? 'https://api.openai.com/v1/responses');
curl_setopt_array($ch,[CURLOPT_POST=>true,CURLOPT_RETURNTRANSFER=>true,CURLOPT_HTTPHEADER=>['Content-Type: application/json','Authorization: Bearer '.$key],CURLOPT_POSTFIELDS=>json_encode($payload),CURLOPT_TIMEOUT=>25]);
$raw = curl_exec($ch); $status = (int)curl_getinfo($ch,CURLINFO_HTTP_CODE); $err = curl_error($ch); curl_close($ch);
if ($raw === false || $status >= 400) { http_response_code(502); echo json_encode(['error'=>'AI service is temporarily unavailable.']); exit; }
$data = json_decode($raw,true); $reply='';
if (isset($data['output_text']) && is_string($data['output_text'])) $reply=$data['output_text'];
if ($reply==='') foreach (($data['output'] ?? []) as $out) foreach (($out['content'] ?? []) as $c) if (($c['type'] ?? '')==='output_text') $reply .= ($c['text'] ?? '');
if ($reply==='') $reply='I could not generate a response right now. Please contact the restaurant directly.';
echo json_encode(['reply'=>$reply], JSON_UNESCAPED_UNICODE);
