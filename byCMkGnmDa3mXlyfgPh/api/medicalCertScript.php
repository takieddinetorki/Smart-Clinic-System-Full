<?php
require_once '../core/init.php';

/**
 * Code Written by: Yeasin Al Fahad
 * File Name: getCustomExpense.php
 * Class Name: -
 * Purpose of the file: will return all the expenses between selected two dates
 * Functions included: noFunctiuon
 **/

$staff = new Staff();

if (Input::exists()) {
    if (Input::get('condition') == 'edit') $staff->getMedCertByReceiptNo(Input::get('value'));
    else if (Input::get('condition') == 'delete') {
        if ($staff->deleteMedCert(Input::get('value'))) echo json_encode(array('status' => 'success'));
        else echo json_encode(array('status' => 'failed'));
    } else echo json_encode(array('status' => 'No Condition Matched'));
} else echo json_encode(array('status' => 'No Input Found'));
