<?php 

function escape($string) {
    return bin2hex(htmlentities($string, ENT_QUOTES, 'UTF-8'));
}
function deescape($string){return hex2bin(html_entity_decode($string));}
?>