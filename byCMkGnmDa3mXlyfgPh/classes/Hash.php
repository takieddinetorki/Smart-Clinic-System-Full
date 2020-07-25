<?php

/**
Hashing Class
*/
class Hash{


    public static function generate($password, $key, $keyLength){
        return md5(sha1($password)).md5($key);
    }

    public static function encrypt($data) {
        return base64_encode($data);
    }
    public static function decrypt($data) {
        return base64_decode($data);
    }

}
?>