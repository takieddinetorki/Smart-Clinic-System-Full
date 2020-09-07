<?php
require_once '../core/init.php';

/**
 * Code Written by: YY
 * File Name: addInventory.php
 * Purpose of the file: Frontend will make AJAX call to this file and add new inventory
 **/

if (Input::exists()) {
    if (Token::check(Session::get('token'))) {
        $staff = new Staff();
        $id = new ID;
        $error = false;
        try {
            $data = array(
                'inventoryID' => $id->generateID('inventory'),
                'itemCode' => Input::get('itemCode'),
                'quantity' => Input::get('quantity'),
                'expiry' => Input::get('expiryDate')
            );
            //* please add the log activity accordingly
            if ($staff->addInventory($data)) {
                // System::logActivity('g', 1, 'Inventory Creation Successful');
                // Redirect::to('../../inventory(PAGE).php');
                $data = array("status" => "passed");
            } else {
                $data = array("status" => "failed");
            }
            echo json_encode($data);
        } catch (Exception $th) { die($th->getMessage()); }
    }
}
