<?php
/**
 * Code Written by: Taki Eddine (Tech)
 * File Name: <System.php>
 * Class Name: <System>
 * Purpose of the file: This class for handling system errors, system bugs, and system logs. This is HIGHLY confidential
 * class and I urge Abderrezak Bouhedda to secure it accordingly
 * Functions included: constructor
 **/
date_default_timezone_set("Asia/Kuala_Lumpur");
class System
{
    private $_db,
            $_sessionName,
            $_sessionValue;
    

    public function __construct($user = null) {
        $this->_db = DB::getInstance();
        $this->_sessionName = Config::get('session/session_name');
        if (Session::exists($this->_sessionName)) {
            $this->_sessionValue = Session::get($this->_sessionName);
        }
    }
    public static function get_client_ip() {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
           $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }
    /** This function will log the activity specified to the file */
    public static function logActivity($type, $level = 0, $activity)
    {
        $date = date('d-m-Y H:i:s');
        $PublicIP = System::get_client_ip();
        if ($PublicIP != '127.0.0.1') {
            $json     = file_get_contents("http://ipinfo.io/202.190.66.244/geo");
            $json     = json_decode($json, true);
            $country  = $json['country'];
            $region   = $json['region'];
            $city     = $json['city'];
        }

        $user = new User;
        $ID = $user->data()->staffID;
        switch ($type) {
            case 'a':
                switch ($level) {
                    case 1:
                        $path = __ROOT__ . "/logs/" . escape($user->data()->clinicID) . "/level-1.lg";
                        $log = $_;
                        logFile($path, $log);
                        break;
                    case 2:
                        $path = __ROOT__ . "/logs/" . escape($user->data()->clinicID) . "/level-1.lg";
                        break;
                    case 3:
                        $path = __ROOT__ . "/logs/" . escape($user->data()->clinicID) . "/level-1.lg";
                        break;
                }
            case 'g':
                $path = __ROOT__ . "/logs/" . escape($user->data()->clinicID) . "/g.lg";
                $log = "[" . $date ."]" . " IP: " . $PublicIP . "; Activity: " . $activity. " ID: " . $ID . "\n";
                System::logFile($path, $log);
                break;
        }
    }
    public static function logFile($path, $string)
    {
        $handle = fopen($path, 'a');
        fwrite($handle, $string);
    }
}

?>