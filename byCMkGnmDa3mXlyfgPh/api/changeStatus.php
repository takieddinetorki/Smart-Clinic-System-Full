<?php
require_once '../core/init.php';

/**
 * Code Written by: Yeasin Al Fahad
 * File Name: changeStatus.php
 * Class Name: -
 * Purpose of the file: Frontend will make AJAX call to this file and make the chanbgews of the status
 * Functions included: noFunctiuon
 **/

$staff = new Staff();

if (Input::exists()) {
    if ($staff->changeAppointmentStatus(Input::get('id'), array('status' => Input::get('status', true)))) $data = array("status" => "passed");
    else $data = array("status" => "failed");
    // printintg the flag
    echo json_encode($data);
} else {
    $data = array("status" => "No Data");
    echo json_encode($data);
}
