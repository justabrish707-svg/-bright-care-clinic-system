<?php
require_once __DIR__.'/config.php';
require_role('doctor'); $title='Doctor Dashboard'; $pdo=db();
$uid=(int)auth()['id']; $s=$pdo->prepare("SELECT id FROM doctors WHERE user_id=?");$s->execute([$uid]);$doctorId=$s->fetchColumn();
$st=$pdo->prepare("SELECT COUNT(*) FROM appointments WHERE doctor_id=? AND appointment_date=CURDATE()");$st->execute([$doctorId]);$today=$st->fetchColumn();
$st=$pdo->prepare("SELECT COUNT(DISTINCT patient_id) FROM appointments WHERE doctor_id=?");$st->execute([$doctorId]);$patients=$st->fetchColumn();
require 'header.php'; ?>
<h1>Doctor Dashboard</h1><p class="muted2">Welcome, <?=e(auth()['name'])?>.</p>
<div class="grid"><div class="card"><div class="muted2">Today's Appointments</div><div class="stat"><?=$today?></div></div><div class="card"><div class="muted2">My Patients</div><div class="stat"><?=$patients?></div></div></div><br>
<div class="panel"><h2>Clinical Workspace</h2><div class="actions"><a class="btn" href="patients.php">Patients</a><a class="btn" href="appointments.php">Appointments</a><a class="btn" href="records.php">Medical Records</a><a class="btn" href="notices.php">Notices</a></div></div>
<?php require 'footer.php'; ?>
