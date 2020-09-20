<?php
require_once '../core/init.php';

/**
 * Code Written by: Yeasin Al Fahad
 * File Name: getAppointment.php
 * Purpose of the file: Frontend will make AJAX call to this file and make the chanbgews of the status
 **/

$staff = new Staff();

if (Input::exists()) {

    $fields = array(
        'voucherNo' => Input::get('voucherNo'),
        'date' => Input::get('date'),
        'ammount' => Input::get('ammount'),
        'particulation' => Input::get('particulationA', true),
        'accountCode' => Input::get('accountCode'),
    );
    if ($staff->editExpenses(Input::get('voucherNo'), $fields)) {
        Redirect::to('../../expenses(PAGE).php');
    } else {
        System::logActivity('u', 2, 'Expense Edit Failed');
        Redirect::to('../../expenses(PAGE).php');
    }
    // printintg the flag
    echo json_encode($data);
} else {
    $data = array("status" => "No Data");
    echo json_encode($data);
}
