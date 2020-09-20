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

if (Input::exists()) {
    If(Input::get('status') == 'edit'){
        $result = $staff->getExpenseInfo(Input::get('value'));
        $result->particulation = deescape($result->particulation);
        $result->names = deescape($staff->getAccountName($result->accountCode));
    }else if(Input::get('status') == 'delete'){
        $staff->deleteExpenses(Input::get('value'));
        $result = array('status' => 'passed');
    }
    else {
        $result = $staff->getAccountName(Input::get('value'));
        $result = deescape($result);
    }
} else $result = array('status' => 'failed');

echo json_encode($result);
