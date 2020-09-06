<?php
require_once '../core/init.php';

/**
 * Code Written by: YY
 * File Name: getInventoryById.php
 * Purpose of the file: Frontend make AJAX call to get inventory by id for edit purpose
 **/

$staff = new Staff();

if (Input::exists()) {

    $data = $staff->getInventoryById(Input::get('id'));
    $data->name = deescape($data->name);
    echo json_encode($data);
} else {
    $data = array("status" => "No Data");
    echo json_encode($data);
}
