<?php
require_once '../core/init.php';

/**
 * Code Written by: Yeasin
 * File Name: getPateintInfo.php
 * Class Name: -
 * Purpose of the file: Frontend will make AJAX call to this file and return the DoctorID
 * Functions included: -
 **/

$staff = new Staff();

// if true then it is an edit operation
if ($_POST['value']){
    $patient = $staff->getPatientById($_POST['value']);
    // need to deesape other value too if needed but for now I only need the name
    $patient->name = deescape($patient->name);
    $json_data = json_encode($patient);
    print_r($json_data);
}



//here the front-end code for the GUI as a table format but now just print_r()

