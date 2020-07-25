<?php
$host = "/opt/lampp/htdocs/smartClinicSystem/";
$projectName = "smart-clinic-web-application-backend";

if (getcwd() == $host . $projectName)
{
    require_once 'global.php';
}else {
    require_once '../global.php';
}
session_start();

$GLOBALS['config'] = array(
    'mysql' => array(
        'host' => '127.0.0.1',
        'username' => 'root',
        'password' => '',
        'db' => 'Smart_Clinic',
    ),
    'remember' => array(
        'cookie_name' => 'hash',
        'cookie_expiry' => 2628000 // hash for one month
    ),
    'session' => array(
        'session_name' => 'user',
        'token_name' => 'token'
    )
);

spl_autoload_register(function($class){
    if(strpos($class, "Dompdf") === false)
        require_once __ROOT__.'/classes/' . $class . '.php';
});

$config = $GLOBALS['config'];
require_once __ROOT__ . '/functions/sanitize.php';
require_once __ROOT__ . '/libraries/dompdf/autoload.inc.php';
require_once __ROOT__ . '/libraries/phpMailer/PHPMailerAutoload.php';
?>