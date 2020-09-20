<?php
require_once '../core/init.php';

/**
 * Code Written by: Yeasin Al Fahad
 * File Name: getCustomExpense.php
 * Class Name: -
 * Purpose of the file: will return all the expenses between selected two dates
 * Functions included: noFunctiuon
 **/

$staff = new Staff();

if (Input::exists()) {
    $staff->getExpenseByCondition(Input::get('from'),Input::get('to'));
}
