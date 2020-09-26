<?php 
require_once '../core/init.php';

$user = new User;
if ($user->loggedIn()) {
    Redirect::to('../dashboard');
    die();
}

$user = new User;
$login = $user->login(Input::get('username',true), Input::get('password',true));
if ($login) {
    System::logActivity('g', 1, 'Login Successful');
    Redirect::to('../../dashboard(PAGE).php');
}else {
    System::logActivity('u', 2, 'Login Attempt Failed');
    Redirect::to('../../index.php?e=lf');
}

?>