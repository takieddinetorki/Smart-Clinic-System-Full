<?php
require_once '../core/init.php';

/**
 * Code Written by: Yeasin Al Fahad
 * File Name: deleteAppointment.php
 * Purpose of the file: Frontend will make AJAX call to this file and make the chanbgews of the status
 **/

$staff = new Staff();

if (Input::exists()) {

    $data = $staff->getAppointmentById(Input::get('id'));
    if ($staff->deleteAppointment(Input::get('id'))) $data = array("status" => "passed");
    else $data = array("status" => "failed");
    // printintg the flag
    echo json_encode($data);
} else {
    $data = array("status" => "No Data");
    echo json_encode($data);
}
