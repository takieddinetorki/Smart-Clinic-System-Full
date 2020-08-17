<?php

class Input
{
    public static function exists($type = 'post', $name = null)
    {
        switch ($type) {

            case 'post' OR 'POST':
                if ($name)
                {
                    echo "Passed POST";
                    return (!empty($_POST["{$name}"])) ? true : false;
                }else 
                {
                    return (!empty($_POST)) ? true : false;
                }
                break;
            case 'get' OR 'GET':
                if ($name)
                {
                    return (!empty($_GET["{$name}"])) ? true : false;
                }else 
                {
                    return (!empty($_GET)) ? true : false;
                }
                break;
            
            default:
                return false;
                break;
        }
    }
    public static function get($item,$isEscaped=false) {
        if($isEscaped){
            if (isset($_POST[$item])) {
                return escape($_POST[$item]);
            }else if(isset($_GET[$item])) {
                return escape($_GET[$item]);
            }
        }else{
            if (isset($_POST[$item])) {
                return ($_POST[$item]);
            }else if(isset($_GET[$item])) {
                return ($_GET[$item]);
            }
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