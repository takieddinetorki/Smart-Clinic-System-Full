<?php

require_once 'core/init.php';

$user = new User;
$clinic = new ClinicDB;
$doc = new Staff;
if ($user->LoggedIn()) {
    echo 'Logged in<br>';

?>
    <p>Hello <?php echo hex2bin($user->data()->username); ?></p>
    <ul>
        <li>Your unique ID in the clinic is: <?php echo $user->data()->staffID ?></li>
        <li>The encryption key: <?php echo $user->data()->encryptionKey ?></li>
        <li>The decrypted encryption key: <?php echo base64_decode($user->data()->encryptionKey) ?></li>
        <li>Encrypted password: <?php echo $user->data()->password ?></li>
        <li>Encrypted password: <?php print_r($user->data());?></li>
        <li>Your clinic name is: <?php echo deescape($clinic->getClinicInfo('clinicName','clinicID',$user->data()->clinicID)) ?></li>
        <li>Your clinic name is: <?php echo json_encode($doc->getAppointmentById('A040840222'))?></li>
        <li>Your clinic name is: <?php echo $doc->getAppointmentInfo('A040840222')->status?></li>
        <li><a href="login_module/logout.php">logout</a></li>
    </ul>
<?php
} else {
?>
    <p>You can <a href="login_module/login_form.php">login</a> or <a href="registration_module/register.php">register</a></p>
<?php
}
?>

