<?php
require_once '../core/init.php';

/**
 * Code Written by: Yeasin
 * File Name: editBillingScript.php
 * Class Name: -
 * Purpose of the file: Frontend will make AJAX call to this file and return the Diagonsis Information
 * Functions included: -
 **/

$staff = new Staff();

// if true then it is an edit operation
if ($_POST['value'] != null){
    $billingData = $staff->getBillingByID($_POST['value']);
    $billingData->status = deescape($billingData->status);
    // getting the patient ID
    $patientID = $staff->getDiagnosisReportByID($billingData->receiptNo)->patientID;
    // getting patient Name
    $patientName = deescape($staff->getPatientById($patientID)->name);
    $data = array($billingData, $patientID, $patientName);
    $json_data = json_encode($data);
    //here the front-end code for the GUI as a table format but now just print_r()
    print_r($json_data);
    }

