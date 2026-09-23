<?php require_once __DIR__.'/config.php'; require_login(); $u=auth(); $f=get_flash(); ?>
<!doctype html><html lang="en"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title><?=e($title??'Bright Care Clinic')?></title><link rel="stylesheet" href="assets/style.css"></head><body>
<header class="top"><div><strong>🏥 Bright Care Clinic</strong><span class="muted">Management System</span></div><div><?=e($u['name'])?> · <?=e(ucfirst($u['role']))?> · <a href="auth.php?logout=1">Logout</a></div></header>
<div class="layout"><aside><nav>
<a href="<?= $u['role']==='admin'?'admin.php':'doctor.php' ?>">Dashboard</a>
<a href="patients.php">Patients</a><a href="appointments.php">Appointments</a>
<?php if($u['role']==='admin'): ?><a href="doctors.php">Doctors</a><?php endif; ?>
<a href="notices.php">Notices</a>
<?php if($u['role']==='doctor'): ?><a href="records.php">Medical Records</a><?php endif; ?>
</nav></aside><main>
<?php if($f): ?><div class="alert <?=$f[0]?>"><?=e($f[1])?></div><?php endif; ?>
