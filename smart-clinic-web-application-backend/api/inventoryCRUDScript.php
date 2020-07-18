<?php
require_once '../core/init.php';

/**
 * Code Written by: Mohammad Yeasin
 * File Name: inventoryCRUDScript.php
 * Class Name: null
 * Purpose of the file: Frontend will make AJAX call to this file and return the appropriate results
 * Functions included: null
 **/

 
 if ($_POST['value'] != null) {
    $staff = new Staff();
    $result = $staff->getInventoryByID($_POST['value']);
    $result->quantity = deescape($result->quantity);
    $medicineName = deescape($staff->getMedicineByID($result->itemCode)->name);

    $data = array($result,$medicineName);
    $json_data = json_encode($data);
    //here the front-end code for the GUI as a table format but now just print_r()
    print_r($json_data);
}
