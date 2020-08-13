<?php
require_once '../core/init.php';

/**
 * Code Written by: Yeasin Al Fahad
 * File Name: getCustomAppointment.php
 * Class Name: -
 * Purpose of the file: will return all the appointments between selected two dates
 * Functions included: noFunctiuon
 **/

$staff = new Staff();

if (Input::exists()) {
    $staff->listCustomeAppointment(Input::get('from'),Input::get('to'));
}
