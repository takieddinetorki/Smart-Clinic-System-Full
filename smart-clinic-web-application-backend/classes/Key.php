<?php 

class Key
{
    public static function GenerateKey($length) {
        $key = '';
        for($i = 0; $i < $length; $i ++) {
            $key .= chr(mt_rand(33, 126));
        }
        return $key;

    }
}

?>