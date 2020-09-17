<?php
require_once '../core/init.php';

/**
 * Code Written by: Yeasin Al Fahad
 * File Name: getAppointment.php
 * Purpose of the file: Frontend will make AJAX call to this file and make the chanbgews of the status
 **/

$staff = new Staff();

if (Input::exists()) {

    $data = $staff->getAppointmentById(Input::get('id'));
    $data->status = deescape($data->status);
    $data->patientName = deescape($data->patientName);
    $data->doctorName = deescape($data->doctorName);
    // printintg the flag
    echo json_encode($data);
} else {
    $data = array("status" => "No Data");
    echo json_encode($data);
}
