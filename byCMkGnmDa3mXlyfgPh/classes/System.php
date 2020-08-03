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
    //* changes have been made here, please remove the comments while allow the branch to merge into master
    private static $_db,
            $_sessionName,
            $_sessionValue;
    private static $logged = false;
    
    //* We have to make the variables static too inorder to use them inside a static method brother, right?
    public static function logged() {
        self::$_db = DB::getInstance();
        self::$_sessionName = Config::get('session/session_name');
        if (Session::exists(self::$_sessionName)) {
            self::$_sessionValue = Session::get(self::$_sessionName);
            self::$logged = true;
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
        $user = new User;
        $date = date('d-m-Y H:i:s');
        $PublicIP = System::get_client_ip();
        $URL = $_SERVER['REQUEST_URI'];
        $query = ($_SERVER['QUERY_STRING']) ? $_SERVER['QUERY_STRING']: "N/A";
        $json = file_get_contents("http://ipinfo.io/202.190.66.244/geo");
        $json = json_decode($json, true);
        $json["Date"] = $date;
        $json["Activity"] = $activity;
        $json["ID"] = ($user->loggedIn()) ? $user->data()->staffID: "UNKOWN";
        $json = json_encode($json, true);
        $log = $json ."\n";
        switch ($type) {
            case 'a':
                $clinicID = $user->data()->clinicID;
                $ID = $user->data()->staffID; 
                switch ($level) {

                    case 1:
                        
                        $path = __ROOT__ . "/logs/" . $clinicID . "/level-1.lg";
                        System::logFile($path, $log);
                        break;
                    case 2:
                        
                        $path = __ROOT__ . "/logs/" . $clinicID . "/level-2.lg";
                        break;
                    case 3:
                        
                        $path = __ROOT__ . "/logs/" . $clinicID . "/level-3.lg";
                        // level3LogWarning($adminEmail);
                        break;
                }
            break;
            case 'u':
                switch ($level) {
                    case 1:
                        $path = __ROOT__ . "/logs/V2HJ2PtfFbXX6wCrxSAn04KFDZjhtX5y/level-1.lg";
                        System::logFile($path, $log);
                        break;
                    case 2:
                        $path = __ROOT__ . "/logs/V2HJ2PtfFbXX6wCrxSAn04KFDZjhtX5y/level-2.lg";
                        System::logFile($path, $log);
                        break;
                    case 3:
                        $path = __ROOT__ . "/logs/V2HJ2PtfFbXX6wCrxSAn04KFDZjhtX5y/level-3.lg";
                        // level3LogWarning($adminEmail);
                        break;
                }
            break;
            case 'g':
                $user = new User;
                $clinicID = $user->data()->clinicID;
                $ID = $user->data()->staffID; 
                $path = __ROOT__ . "/logs/" . $clinicID . "/g.lg";
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