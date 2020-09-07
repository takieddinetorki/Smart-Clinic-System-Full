<?php
require_once '../core/init.php';

/**
 * Code Written by: YY
 * File Name: getVendorByCode.php
 * Purpose of the file: Get vendor details by vendor code
 **/

$staff = new Staff();

if (Input::exists()) {
    $data = $staff->getVendorById(Input::get('code'));
    $data->name = deescape($data->name);
    $data->address = deescape($data->address);
    $data->contactedPerson = deescape($data->contactedPerson);
    $data->contactNo = deescape($data->contactNo);
    echo json_encode($data);
} else {
    $data = array("status" => "No Data");
    echo json_encode($data);
}
