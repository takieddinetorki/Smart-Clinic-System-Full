<?php
require_once '../core/init.php';

/**
 * Code Written by: Yeasin
 * File Name: createBillingScript.php
 * Class Name: -
 * Purpose of the file: Frontend will make AJAX call to this file and return the Diagonsis Information
 * Functions included: -
 **/

$staff = new Staff();

// if true then it is an edit operation
if ($_POST['value'] != null){
    $reportData = $staff->getDiagnosisReportByID($_POST['value']);
    $patientName= deescape($staff->getPatientById($reportData->patientID)->name);
    $data = array($reportData,$patientName);
    $json_data = json_encode($data);
    //here the front-end code for the GUI as a table format but now just print_r()
    print_r($json_data);
    }

