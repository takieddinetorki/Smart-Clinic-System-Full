<?php

class Input
{
    public static function exists($type = 'post')
    {
        switch ($type) {
            case 'post':
                return (!empty($_POST)) ? true : false;
                break;
            case 'get':
                return (!empty($_GET)) ? true : false;
                break;
            
            default:
                return false;
                break;
        }
    }
    public static function get($item) {
        if (isset($_POST[$item])) {
            return escape($_POST[$item]);
        }else if(isset($_GET[$item])) {
            return escape($_GET[$item]);
        }
        return '';
    }
    public static function getFile($item,$submit='submit'){
        if(isset($_POST[$submit])) return $_FILES[$item];
        if(isset($_GET[$submit])) return $_FILES[$item];
        return '';
    }
}


?>