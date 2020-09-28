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
$patient = new Patient;

if (Input::exists()) {
    // this will get the patients based on multiple ids
    if (Input::get('condition') == 'multiID') $patient->getPatientByIds(Input::get('startID'), Input::get('endID'));
    // this two will search the patient
    else if (Input::get('condition') == 'id') $patient->searchPatient(Input::get('value'), 'id');
    else if (Input::get('condition') == 'name') $patient->searchPatient(Input::get('value'), 'name');
    // this will delete a patinet
    else if (Input::get('condition') == 'delete') {
        if ($patient->deletePatient(Input::get('patientID'))) echo json_encode(array('status' => 'success'));
        else echo json_encode(array('status' => 'failed'));
    }
    // this will edit a patinet
    else if (Input::get('condition') == 'edit') $patient->getEditPatientsVal(Input::get('editValue'));
    // this will return the patient name based on patient iD
    else {
        $patient = $staff->getPatientById(Input::get('value'));
        $patient->name = deescape($patient->name);
        echo json_encode($patient);
    }
} else  echo json_encode(array('status' => 'No InputFound'));
