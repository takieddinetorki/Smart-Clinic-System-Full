<?php 
require_once '../core/init.php';

$user = new User;
if ($user->loggedIn()) {
    Riderect::to('../dashboard');
    die();
}

$user = new User;
$login = $user->login(Input::get('username'), Input::get('password'));
if ($login) {
    System::logActivity('g', 1, 'Login Successful');
    Redirect::to('../../dashboard.php');
}else {
    System::logActivity('u', 2, 'Login Attempt Failed');
    Redirect::to('../../index.php?e=lf');
}

?>