<?php
require_once '../core/init.php';

/**
 * Code Written by: Mohammad Yeasin
 * File Name: vendorCRUD_bacup_script.php
 * Class Name: null
 * Purpose of the file: Frontend will make AJAX call to this file and return the appropriate results
 * Functions included: null
 **/

 
 if ($_POST['value']) {
    $staff = new Staff();
    $result = $staff->getVendorByID($_POST['value']);
    $result->name = deescape($result->name);
    $result->address = deescape($result->address);
    $result->contactedPerson = deescape($result->contactedPerson);
    $result->contactNo = deescape($result->contactNo);
    $json_data = json_encode($result);
    //here the front-end code for the GUI as a table format but now just print_r()
    print_r($json_data);
}
