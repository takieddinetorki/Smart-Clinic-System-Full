<?php
require_once '../core/init.php';

/**
 * Code Written by: Yeasin Al Fahad
 * File Name: getCustomcerts.php
 * Class Name: -
 * Purpose of the file: will return all the certs between selected two dates
 * Functions included: noFunctiuon
 **/

$staff = new Staff();

if (Input::exists()) {
    if (Input::get('condition') == 'date') $staff->getMedCertByCondition('','',Input::get('from'), Input::get('to'));
    else if (Input::get('condition') == 'multiID') $staff->getMedCertByCondition(Input::get('startID'), Input::get('endID'), '', '');
    else if (Input::get('condition') == 'id') $staff->searchMedCert(Input::get('value'), 'P.patientID');
    else if (Input::get('condition') == 'name') $staff->searchMedCert(Input::get('value'), 'P.name');
    else echo json_encode(array('error' => 'No condition Matched'));
} else echo json_encode(array('error' => 'No Input Found'));
