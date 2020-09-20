<?php
require_once '../core/init.php';

/**
 * Code Written by: Yeasin Al Fahad
 * File Name: editBilling.php
 * Class Name: -
 * Purpose of the file: add a new billing
 * Functions included: noFunctiuon
 **/

$staff = new Staff();

if (Input::exists()) {
    $staff = new Staff();

    $data = array(
        'status' => Input::get('status', true),
        'consultation' => Input::get('consultation'),
        'treatment' => Input::get('treatment'),
        'medication' => Input::get('medication'),
        'discount' => Input::get('discount'),
        'totalAmount' => Input::get('totalAmount'),
    );

    if ($staff->editBilling(Input::get('id'),$data)) {
        echo json_encode(array('status' => 'success'));
    } else {
        echo json_encode(array('status' => 'failed'));
    }
}
else echo json_encode(array('status' => 'NoData'));
