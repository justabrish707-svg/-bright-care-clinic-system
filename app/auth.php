<?php
require_once __DIR__.'/config.php';

if (isset($_POST['login'])) {
    check_csrf();
    $email = strtolower(post('email'));
    $password = (string)($_POST['password'] ?? '');
    $stmt = db()->prepare("SELECT * FROM users WHERE email=? LIMIT 1");
    $stmt->execute([$email]);
    $user = $stmt->fetch();
    if ($user && password_verify($password, $user['password_hash'])) {
        session_regenerate_id(true);
        $_SESSION['user'] = ['id'=>(int)$user['id'],'name'=>$user['full_name'],'role'=>$user['role'],'email'=>$user['email']];
        redirect($user['role']==='admin' ? 'admin.php' : 'doctor.php');
    }
    flash('error','Invalid email or password.');
    redirect('login.php');
}
if (isset($_GET['logout'])) {
    $_SESSION=[];
    session_destroy();
    redirect('login.php');
}
