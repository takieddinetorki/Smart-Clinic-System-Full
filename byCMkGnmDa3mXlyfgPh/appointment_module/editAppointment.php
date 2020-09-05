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
        'appointmentID' => Input::get('id'),
        'date' => Input::get('date'),
        'time' => Input::get('time'),
        'status' => Input::get('status', true)
    );
    $id = Input::get('id');
    if ($staff->changeAppointmentStatus(Input::get('id'), $fields)) {
        $data = array("status" => "passed");
    } else {
        $data = array("status" => "failed");
    }
    // printintg the flag
    echo json_encode($data);
} else {
    $data = array("status" => "No Data");
    echo json_encode($data);
}
