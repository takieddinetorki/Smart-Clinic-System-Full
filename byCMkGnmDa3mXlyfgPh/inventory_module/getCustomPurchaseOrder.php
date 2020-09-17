<?php
require_once '../core/init.php';

/**
 * Code Written by: YY
 * File Name: getCustomPurchaseOrder.php
 * Class Name: -
 * Purpose of the file: will return all the purchase order with condition
 * Functions included: 
 **/

$staff = new Staff();

if (Input::exists()) {
    $staff->getCustomPurchaseOrder(Input::get('start'), Input::get('end'), Input::get('from'), Input::get('to'));
}
