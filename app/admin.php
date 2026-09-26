<?php
require_once __DIR__.'/config.php';
require_role('admin'); $title='Administrator Dashboard';
$pdo=db();
$counts=[
'Doctors'=>(int)$pdo->query("SELECT COUNT(*) FROM doctors")->fetchColumn(),
'Patients'=>(int)$pdo->query("SELECT COUNT(*) FROM patients")->fetchColumn(),
'Appointments'=>(int)$pdo->query("SELECT COUNT(*) FROM appointments WHERE appointment_date=CURDATE()")->fetchColumn(),
'Active Notices'=>(int)$pdo->query("SELECT COUNT(*) FROM notices WHERE expiry_date IS NULL OR expiry_date>=CURDATE()")->fetchColumn()
];
require 'header.php'; ?>
<h1>Administrator Dashboard</h1><p class="muted2">Operational overview and management controls.</p>
<div class="grid"><?php foreach($counts as $k=>$v): ?><div class="card"><div class="muted2"><?=e($k)?></div><div class="stat"><?=$v?></div></div><?php endforeach; ?></div>
<br><div class="panel"><h2>Quick Actions</h2><div class="actions"><a class="btn" href="doctors.php">Manage Doctors</a><a class="btn" href="patients.php">Manage Patients</a><a class="btn" href="appointments.php">Appointments</a><a class="btn" href="notices.php">Notices</a></div></div>
<?php require 'footer.php'; ?>
