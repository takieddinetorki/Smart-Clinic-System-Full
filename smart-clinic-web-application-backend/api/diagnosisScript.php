<?php
require_once '../core/init.php';

/**
 * Code Written by: Yeasin
 * File Name: diagnosisScript.php
 * Class Name: -
 * Purpose of the file: Frontend will make AJAX call to this file and return the DoctorID
 * Functions included: -
 **/

if (Token::check(Session::get('token'))) {
    if ($_POST['actualData'] != null) {
        try {
            $report = new ReportGeneration;
            $staff = new Staff;
            $id = new ID;

            // coverting the data to usable array
            $data = json_decode($_POST['actualData'], true);
            // generating the report first then we proceed
            $reportFile = $report->generateDiagonasticRepor($data);

            if ($reportFile != 'A problem Has been occured during report generating') {
                // creating new diagnosis report
                // generating ID 
                $rid = $id->generateID('receipt');
                $medicationCost = 0;
                // getting the medication cost for all medicines 
                // it will be needed for billing purpose
                foreach ($data['medicines'] as $medi) {
                    // here first getting the price of a medicine then we are converting from std class obj to usable number
                    $singleValue = json_decode(json_encode($staff->searchMedicineByCond(escape($medi['name']), 'name', 'price')), true)['price'];
                    $itemCode = json_decode(json_encode($staff->searchMedicineByCond(escape($medi['name']), 'name', 'itemCode')), true)['itemCode'];
                    // adding the medicines to a db to keep track on medicine will be needed in the financial report module
                    $staff->addMedicineTracker(array(
                        'patientID' => $data['id'],
                        'itemCode' => $itemCode
                    ));
                    $medicationCost = $medicationCost + $singleValue;
                }
                // addint the record into the DB
                $staff->addDiagnosisReport(array(
                    'receiptNo' => $rid,
                    'report' => escape($reportFile),
                    'medicalCost' => $medicationCost,
                    'doctorID' => $data['doctorID'],
                    'patientID' => $data['id']
                ));
                print_r("Successfully Added Diagnostic Report of Patient ID : {$data['id']}");
            } else print_r("A problem Has been occured during report generating of patient ID : {$data['id']}");


            // deelting the diagnosis report, this functin I just validate that rather than creating 
            // any gui for that as it is very simple and straight forward
            // $staff->deleteDiagnosisReport('R79879');

        } catch (Exception $th) {
            die($th->getMessage());
        }
    }
}

//here the front-end code for the GUI as a table format but now just print_r()
// print_r($lol);
