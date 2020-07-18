<?php
require_once '../core/init.php';

/**
 * Code Written by: Leong
 * File Name: medicalCertScript.php
 * Class Name: -
 * Purpose of the file: Frontend will make AJAX call to this file and return the appropriate results
 * Functions included: -
 **/

$staff = new Staff();

// if true then it is an edit operation
if (!empty($_POST['action']) && $_POST['action'] == "edit")
    $result = $staff->editMedCertByReceiptNo($_POST['value']);
else
    $result = $staff->getMedCertByReceiptNo($_POST['value']);

$result->PatientName = hex2bin($result->PatientName);
$json_data = json_encode($result);

//here the front-end code for the GUI as a table format but now just print_r()
print_r($json_data);
