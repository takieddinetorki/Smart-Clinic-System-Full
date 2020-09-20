<?php
require_once '../core/init.php';

/**
 * Code Written by: Yeasin Al Fahad
 * File Name: addBilling.php
 * Class Name: -
 * Purpose of the file: add a new billing
 * Functions included: noFunctiuon
 **/

$staff = new Staff();

if (Input::exists()) {
    $staff = new Staff();
    $id = new ID;
    $bid = $id->generateID('billing');

    $data = array(
        'billingID' => $bid,
        'date' => Input::get('date'),
        'time' => Input::get('time'),
        'status' => Input::get('status', true),
        'consultation' => Input::get('consultation'),
        'treatment' => Input::get('treatment'),
        'medication' => Input::get('medication'),
        'discount' => Input::get('discount'),
        'totalAmount' => Input::get('totalAmount'),
        'receiptNo' => Input::get('receiptNo'),
    );

    if ($staff->addBilling($data)) {
        echo json_encode(array('status' => 'success'));
    } else {
        echo json_encode(array('status' => 'failed'));
    }
}
else echo json_encode(array('status' => 'NoData'));
