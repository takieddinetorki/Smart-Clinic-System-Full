<?php
/**
 * Code Written by: Mohammad Yeasin
 * File Name: expenseScript.php
 * Class Name: null
 * Purpose of the file: Frontend will make AJAX call to this file and return the appropriate results
 * Functions included: null
 **/
require_once '../core/init.php';
$staff = new Staff();
$id = new ID('');

if (!empty($_POST['action']) && $_POST['action'] == "edit") {
    $result = $staff->getExpenseInfo($_POST['value']);
    $result->particulation = deescape($result->particulation);
    $result->names = deescape($staff->getAccountName($result->accountCode));
} else {
    $result = $staff->getAccountName($_POST['value']);
    $result = deescape($result);
}



$json_data = json_encode($result);
print_r($json_data);
