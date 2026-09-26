<?php
require_once __DIR__.'/config.php';
require_role('admin'); $title='Doctor Management'; $pdo=db();
if($_SERVER['REQUEST_METHOD']==='POST'){check_csrf(); $name=post('full_name');$email=strtolower(post('email'));$gender=post('gender');$phone=post('phone');$spec=post('specialization');$pass=(string)($_POST['password']??'');
if(!$name||!filter_var($email,FILTER_VALIDATE_EMAIL)||!$phone||!$spec||strlen($pass)<8){flash('error','Complete all fields; password must be at least 8 characters.');redirect('doctors.php');}
try{$pdo->beginTransaction();$s=$pdo->prepare("INSERT INTO users(full_name,email,password_hash,role,phone) VALUES(?,?,?,'doctor',?)");$s->execute([$name,$email,password_hash($pass,PASSWORD_DEFAULT),$phone]);$uid=$pdo->lastInsertId();$s=$pdo->prepare("INSERT INTO doctors(user_id,gender,phone,specialization) VALUES(?,?,?,?)");$s->execute([$uid,$gender,$phone,$spec]);$pdo->commit();flash('success','Doctor added successfully.');}catch(Throwable $e){$pdo->rollBack();flash('error','Could not add doctor: '.($e->getCode()==='23000'?'Email already exists.':'Database error.'));}redirect('doctors.php');}
$rows=$pdo->query("SELECT d.*,u.full_name,u.email FROM doctors d JOIN users u ON u.id=d.user_id ORDER BY d.id DESC")->fetchAll();require 'header.php'; ?>
<h1>Doctor Management</h1><div class="panel"><h2>Add Doctor</h2><form method="post"><input type="hidden" name="csrf" value="<?=e(csrf())?>"><div class="formgrid">
<div class="field"><label>Full name</label><input name="full_name" required></div><div class="field"><label>Email</label><input type="email" name="email" required></div>
<div class="field"><label>Gender</label><select name="gender"><option>Male</option><option>Female</option><option>Other</option></select></div><div class="field"><label>Phone</label><input name="phone" required></div>
<div class="field"><label>Specialization</label><input name="specialization" required></div><div class="field"><label>Initial password</label><input type="password" name="password" minlength="8" required></div>
</div><br><button class="btn">Add Doctor</button></form></div><br><div class="panel"><h2>Registered Doctors</h2><table><tr><th>Name</th><th>Gender</th><th>Phone</th><th>Specialization</th><th>Email</th></tr>
<?php foreach($rows as $r): ?><tr><td><?=e($r['full_name'])?></td><td><?=e($r['gender'])?></td><td><?=e($r['phone'])?></td><td><?=e($r['specialization'])?></td><td><?=e($r['email'])?></td></tr><?php endforeach; ?></table></div>
<?php require 'footer.php'; ?>
