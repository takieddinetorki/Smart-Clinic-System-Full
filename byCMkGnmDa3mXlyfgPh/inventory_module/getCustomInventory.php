<?php
require_once '../core/init.php';

/**
 * Code Written by: YY
 * File Name: getCustomInventory.php
 * Class Name: -
 * Purpose of the file: will return all the inventory between selected two item codes
 * Functions included: 
 **/

$staff = new Staff();

if (Input::exists()) {
    $staff->getCustomInventoryByItemCode(Input::get('start'),Input::get('end'));
}
