<?php 
require_once '../core/init.php';
$user = new User;
if ($user->loggedIn()) {
    die('You are previously logged in. Go <a href="index.php"> home</a>'); 
}
if (Input::exists()) {
    $user = new User;
    $login = $user->login(Input::get('username'), Input::get('password'));
    if ($login) {
        System::logActivity('g', 1, 'Login Successful');
        echo "You are supposed to be logged in";
    }else {
        System::logActivity('u', 2, 'Login Attempt Failed');
        echo "Wrong username/ID or password";
    }
}

?>