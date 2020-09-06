<?php
require_once '../core/init.php';

/**
 * Code Written by: YY
 * File Name: deleteInventory.php
 * Purpose of the file: Frontend will make AJAX call to delete inventory
 **/

$staff = new Staff();

if (Input::exists()) {
    if ($staff->deleteInventory(Input::get('id'))) $data = array("status" => "passed");
    else $data = array("status" => "failed");
    echo json_encode($data);
} else {
    $data = array("status" => "No Data");
    echo json_encode($data);
}
