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

<form action="" method="post">
    <div class="field">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" autocomplete="off"/>
    </div>
    <div class="field">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" autocomplete="off"/>
    </div>
    <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
    <input type="submit" value="login">
</form>
<a href="index.php">Home</a>