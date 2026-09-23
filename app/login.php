<?php require_once 'config.php'; if(auth()) redirect(auth()['role']==='admin'?'admin.php':'doctor.php'); ?>
<!doctype html><html><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Login · Bright Care</title><link rel="stylesheet" href="assets/style.css"></head>
<body class="login"><section class="panel"><h1>🏥 Bright Care Clinic</h1><p class="muted2">Secure staff login</p>
<?php if($f=get_flash()): ?><div class="alert <?=$f[0]?>"><?=e($f[1])?></div><?php endif; ?>
<form method="post" action="auth.php"><input type="hidden" name="csrf" value="<?=e(csrf())?>">
<div class="field"><label>Email</label><input type="email" name="email" required></div><br>
<div class="field"><label>Password</label><input type="password" name="password" required></div><br>
<button class="btn" name="login">Sign in</button></form>
<p class="small muted2">Demo: admin@brightcare.local / Admin@123</p></section></body></html>
