<?php
if (getcwd() == 'C:\xampp\htdocs\smartClinicSystem') {
    require_once 'byCMkGnmDa3mXlyfgPh/global.php';
    //* will delete this extra if else in production
} else if (getcwd() == 'C:\xampp\htdocs\smartClinicSystem\byCMkGnmDa3mXlyfgPh') {
    require_once 'global.php';
} else {
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

spl_autoload_register(function ($class) {
    if (strpos($class, "Dompdf") === false) {
        $Root = str_replace(array('/', '\\'), DIRECTORY_SEPARATOR, __ROOT__);
        $varC = str_replace(array('/', '\\'), "/", $class);
        $var = __DIR__;
        $sub_string = "core";
        if (0 === strpos($class, "Svg")) {
            if (substr($var, strlen($var) - strlen($sub_string), strlen($sub_string)) == $sub_string) {
                $str = substr($var, 0, strlen($var) - strlen($sub_string));
            }
            $dompdf = $str . "libraries/dompdf/lib/php-svg-lib/src/";
            require_once $dompdf . $varC . ".php";
        } else {
            require_once $Root . '/classes/' . $varC . '.php';
        }
    }
});

// spl_autoload_register(function ($class) {
//     if (0 === strpos($class, "Svg")) {
//       $file = str_replace('\\', DIRECTORY_SEPARATOR, $class);
//       $file = realpath(__DIR__ . DIRECTORY_SEPARATOR . $file . '.php');
//       if (file_exists($file)) {
//       include_once $file;
//       }
//   }
//   if (strpos($class, "Dompdf") === false)
//       require_once __ROOT__ . '/classes/' . $class . '.php';
// });

$config = $GLOBALS['config'];
require_once __ROOT__ . '/functions/sanitize.php';
require_once __ROOT__ . '/libraries/dompdf/autoload.inc.php';
require_once __ROOT__ . '/libraries/phpMailer/PHPMailerAutoload.php';
