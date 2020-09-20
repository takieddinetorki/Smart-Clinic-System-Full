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
if (Input::exists()) {
    if (Input::get('condition') == 'delete') {
        if($staff->deleteBilling(Input::get('id'))) echo json_encode(array('status' => 'Delete Successfull'));
        else echo json_encode(array('status' => 'Delete Unsuccessfull'));
    } else {
        $billingData = $staff->getBillingByRecieptNo(Input::get('value'));
        $billingData->status = deescape($billingData->status);
        $patientID = $staff->getDiagnosisReportByID($billingData->receiptNo)->patientID;
        $patientName = deescape($staff->getPatientById($patientID)->name);
        $data = array($billingData, $patientID, $patientName);

        echo json_encode($data);
    }
}else echo json_encode(array('status' => 'NoData'));
