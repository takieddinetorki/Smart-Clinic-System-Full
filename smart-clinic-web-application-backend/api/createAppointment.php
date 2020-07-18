<?php
require_once '../core/init.php';

/**
 * Code Written by: Yeasin
 * File Name: createAppointment.php
 * Class Name: -
 * Purpose of the file: Frontend will make AJAX call to this file and return the DoctorID
 * Functions included: -
 **/

$staff = new Staff();

// if true then it is an edit operation
if ($_POST['value']){
    $doctorName = deescape($staff->getDoctorByID($_POST['value'])->name);
    $json_data = json_encode($doctorName);
    print_r($json_data);
}



//here the front-end code for the GUI as a table format but now just print_r()

