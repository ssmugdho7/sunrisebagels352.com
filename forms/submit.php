<?php
session_start();
require_once dirname(__DIR__).'/library/helpers.php';
if ($_SERVER['REQUEST_METHOD'] !== 'POST') { header('Location: ../index.php'); exit; }
$type = in_array($_POST['type'] ?? '', ['contact','catering','newsletter'], true) ? $_POST['type'] : 'contact';
$name = trim((string)($_POST['name'] ?? ''));
$email = trim((string)($_POST['email'] ?? ''));
$phone = trim((string)($_POST['phone'] ?? ''));
$topic = trim((string)($_POST['topic'] ?? ''));
$date = trim((string)($_POST['date'] ?? ''));
$guests = trim((string)($_POST['guests'] ?? ''));
$message = trim((string)($_POST['message'] ?? ''));
if ($type !== 'newsletter' && ($name === '' || !filter_var($email, FILTER_VALIDATE_EMAIL) || $message === '')) { http_response_code(422); exit('Please complete the required fields.'); }
$file = app_path('data/inquiries.csv');
$isNew = !is_file($file);
$fh = fopen($file, 'a');
if ($fh) {
    if ($isNew) fputcsv($fh, ['created_at','type','name','email','phone','topic','date','guests','message']);
    fputcsv($fh, [date('c'),$type,$name,$email,$phone,$topic,$date,$guests,$message]); fclose($fh);
}
header('Location: ../thank-you.php');
