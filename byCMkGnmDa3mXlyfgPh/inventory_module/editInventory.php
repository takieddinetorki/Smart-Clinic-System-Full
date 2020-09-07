<?php
require_once '../core/init.php';

/**
 * Code Written by: YY
 * File Name: editInventory.php
 * Purpose of the file: Frontend will make AJAX call to this file and make the changes on existing inventory
 **/

$staff = new Staff();

if (Input::exists()) {
    $fields = array(
        'inventoryID' => Input::get('id'),
        'itemCode' => Input::get('itemCode'),
        'quantity' => Input::get('quantity'),
        'expiry' => Input::get('expiryDate')
    );
    if ($staff->editInventory(Input::get('id'), $fields)) {
        $data = array("status" => "passed");
    } else {
        $data = array("status" => "failed");
    }
    echo json_encode($data);
} else {
    $data = array("status" => "No Data");
    echo json_encode($data);
}
