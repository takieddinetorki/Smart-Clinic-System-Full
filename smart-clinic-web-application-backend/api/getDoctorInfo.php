<?php
require_once '../core/init.php';

/**
 * Code Written by: Yeasin
 * File Name: getDoctorInfo.php
 * Class Name: -
 * Purpose of the file: Frontend will make AJAX call to this file and return the DoctorID
 * Functions included: -
 **/

$staff = new Staff();

// if true then it is an edit operation
if ($_POST['value'] != null)
    $doctorID = $staff->getMedicalHistoryById($_POST['value'])->doctorID;

$json_data = json_encode($doctorID);

//here the front-end code for the GUI as a table format but now just print_r()
print_r($json_data);
