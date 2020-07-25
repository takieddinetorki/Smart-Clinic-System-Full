<?php
require_once '../core/init.php';

/**
 * Code Written by: Yeasin
 * File Name: addPurchaseOrderScript.php
 * Class Name: -
 * Purpose of the file: Frontend will make AJAX call to this file and return the DoctorID
 * Functions included: -
 **/

if (Token::check(Session::get('token'))) {
    if ($_POST['tableData'] != null) {
        try {
            $data = json_decode($_POST['tableData'],true);
            $staff = new Staff;
            $id = new ID;

            // creating the orders table 
            $staff->addPurchaseOrder(array(
                'poNo' => $data['poNo'],
                'deliveryDate' => $data['deliveryInfo']['date'],
                'deliveryAddress' => escape($data['deliveryInfo']['address']),
                'qutotionNo' => escape($data['deliveryInfo']['quotion']),
                'paymentTerm' => escape($data['deliveryInfo']['paymentTerm']),
                'contactPerson' => escape($data['deliveryInfo']['contactPerson']),
                'contactNo' => escape($data['deliveryInfo']['contactNo']),
                'deliveryCharge' => $data['deliveryInfo']['deliveryCharge'],
                'totalAmmount' => $data['totalCost'],
                'vendorCode' => $data['vendorCode'],
            ));


            // creating the orderedItem table
            foreach($data['items'] as $item){
                $staff->addOrderedItem(array(
                    'quantity' => escape($item['quantity']),
                    'price' => $item['price'],
                    'description' => escape($item['description']),
                    'itemCode' => $item['itemCode'],
                    'poNo' => $item['poNo'],
                ));
            }
            
        } catch (Exception $th) {
            die($th->getMessage());
        }
    }
}

//here the front-end code for the GUI as a table format but now just print_r()
// print_r($lol);
