<?php
require_once '../core/init.php';

if (Input::exists()) {
    if (Token::check(Session::get('token'))) {
        $staff = new Staff();
        $id = new ID;
        $error = false;
        try {
            $data = array(
                'appointmentID' => $id->generateID('appointment'),
                'date' => Input::get('date'),
                'time' => Input::get('time'),
                'status' => Input::get('status', true),
                'patientID' => Input::get('patientID'),
                'doctorID' => Input::get('doctorID')
            );
            //* please add the log activity accordingly
            if ($staff->makeAppointment($data)) {
                System::logActivity('g', 1, 'Appointment Creation Successful');
                Redirect::to('../../appointment_list.php');
            } else {
                System::logActivity('u', 2, 'Appointment Creation Failed');
                Redirect::to('../../appointment_form.php');
            }
        } catch (Exception $th) { die($th->getMessage()); }
    }
}
