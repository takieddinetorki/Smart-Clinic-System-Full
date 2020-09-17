<?php
require_once '../core/init.php';

/**
 * Code Written by: YY
 * File Name: searchInventory.php
 * Class Name: -
 * Purpose of the file: will return all the inventory with search key like value
 * Functions included: 
 **/

$staff = new Staff();

if (Input::exists()) {
    $searchKey = Input::get('searchKey');
    $value = Input::get('value');
    if($searchKey == 'name') {
        $value = escape($value);
    }
    $staff->searchInventory($value,$searchKey);
}
