<?php
require_once '../core/init.php';

/**
 * Code Written by: Yeasin Al Fahad
 * File Name: getCustomBilling.php
 * Class Name: -
 * Purpose of the file: will return all the billing between selected two dates
 * Functions included: noFunctiuon
 **/

$staff = new Staff();

if (Input::exists()) {
    if (Input::get('condition') == 'date') $staff->getBillingByCondition(null, null, Input::get('from'), Input::get('to'));
    else if (Input::get('condition') == 'id') $staff->getBillingByCondition(Input::get('startID'), Input::get('endID'), null, null);
    else {
        $data = array('status' => 'failed');
        echo json_encode($data);
    }
}
