<?php
require_once '../core/init.php';

/**
 * Code Written by: Mohammad Yeasin
 * File Name: doctorCRUD_bacup_script.php
 * Class Name: null
 * Purpose of the file: Frontend will make AJAX call to this file and return the appropriate results
 * Functions included: null
 **/

 
 if ($_POST['value']) {
    $staff = new Staff();
    $result = $staff->getDoctorByID($_POST['value']);
    $result->name = deescape($result->name);
    $result->nric = deescape($result->nric);
    $result->gender = deescape($result->gender);
    $result->MMCregNo = deescape($result->MMCregNo);
    $result->contactNo = deescape($result->contactNo);
    $result->picture = deescape($result->picture);
    $json_data = json_encode($result);
    //here the front-end code for the GUI as a table format but now just print_r()
    print_r($json_data);
}
