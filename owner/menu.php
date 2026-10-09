<?php $adminTitle='Menu & Prices'; require __DIR__.'/_header.php'; $saved=false; $error=''; $menu=menu_data(); if($_SERVER['REQUEST_METHOD']==='POST'){ verify_csrf(); $raw=(string)($_POST['menu_json']??''); $decoded=json_decode($raw,true); if(is_array($decoded) && isset($decoded['breakfast'],$decoded['lunch'])) { if(save_json('data/menu.json',$decoded)){ $saved=true; $menu=$decoded; } else $error='Could not write data/menu.json. Check file permissions.'; } else $error='Menu data was not valid. Nothing was saved.'; } ?>
<div class="admin-title"><div><span>LIVE MENU</span><h1>Menu & Price Editor</h1><p>Use the visual editor. Saving updates the public menu immediately.</p></div><button class="admin-primary" form="menuForm">Save Menu</button></div>
<?php if($saved): ?><div class="success">Menu saved successfully.</div><?php endif; ?><?php if($error): ?><div class="alert"><?=e($error)?></div><?php endif; ?>
<div id="menuEditor" class="menu-editor"></div>
<form id="menuForm" method="post"><input type="hidden" name="csrf" value="<?=e(csrf_token())?>"><textarea hidden id="menu_json" name="menu_json"><?=e(json_encode($menu,JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE))?></textarea></form>
<script>window.SUNRISE_MENU=<?=json_encode($menu,JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE)?>;</script>
<?php require __DIR__.'/_footer.php'; ?>
