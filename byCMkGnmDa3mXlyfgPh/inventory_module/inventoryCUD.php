<?php
require_once '../core/init.php';

/**
 * Code Written by: YY
 * File Name: inventoryCUD.php
 * Purpose of the file: Create, Update and Delete inventory
 **/

if (Input::exists()) {
    $staff = new Staff();
    $id = new ID;
    $error = false;
    $action = Input::get('action');
    switch($action) {
        case 'add': 
            $data = array(
                'inventoryID' => $id->generateID('inventory'),
                'itemCode' => Input::get('itemCode'),
                'quantity' => Input::get('quantity'),
                'expiry' => Input::get('expiryDate')
            );
            $result = $staff->addInventory($data);
            break;
        case 'delete':
            $result = $staff->deleteInventory(Input::get('id'));
            break;
        case 'edit':
            $data = array(
                'inventoryID' => Input::get('id'),
                'itemCode' => Input::get('itemCode'),
                'quantity' => Input::get('quantity'),
                'expiry' => Input::get('expiryDate')
            );
            $result = $staff->editInventory(Input::get('id'), $data);
            break;
    }
    if ($result) {
        $data = array("status" => "passed");
    }else {
        $data = array("status" => "failed");
    }
    echo json_encode($data);
}