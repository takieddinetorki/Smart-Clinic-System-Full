<?php
require_once '../core/init.php';

/**
 * Code Written by: Yeasin Al Fahad
 * File Name: getSearchedExpense.php
 * Class Name: -
 * Purpose of the file: will return all the expenses between selected two dates
 * Functions included: noFunctiuon
 **/

$staff = new Staff();

if (Input::exists()) {
    // if searched by particulation then, we have to escap the value first
    if (Input::get('choice') == 'particulation') $staff->searchExpense(escape(Input::get('value')),Input::get('choice'));
    // otherwise 
    else $staff->searchExpense(Input::get('value'),Input::get('choice'));
}
