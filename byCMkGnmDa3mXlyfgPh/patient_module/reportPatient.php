<?php
require_once '../core/init.php';
echo 'Please select both id.';
if (Input::exists()) {
    echo 'Input exists';
            $report = new ReportGeneration();
            try {
                $sid = Input::get('sid-r').
                $eid = Input::get('eid-r');
                if($sid && $eid){
                    $report->generatePatientList($sid,$eid);                    
                }
                else echo 'Please select both id.';
            } catch (Exception $th) {
                die($th->getMessage());
            }
       
}else{
    echo 'No Input';
}
