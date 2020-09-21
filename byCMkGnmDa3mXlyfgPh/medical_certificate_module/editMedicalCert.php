<?php
require_once '../core/init.php';

if (Input::exists()) {
    if (Token::check(Session::get('token'))) {
        $staff = new Staff();
        try {
            $data = array(
                'endingDate' => Input::get('to'),
                'reason' => Input::get('reason', true)
            );
            //* please add the log activity accordingly
            $id = Input::get('receiptNo');
            if ($staff->editMedCert($id,$data)) {
                System::logActivity('g', 1, "Medical Cert Edited with ID ${$id}");
                Redirect::to('../../medical-cert(PAGE).php');
            } else {
                System::logActivity('u', 2, "Medical Cert Edition Failed with ID ${$id}");
                Redirect::to('../../medical-cert(PAGE).php');
            }
        } catch (Exception $th) {
            die($th->getMessage());
        }
    }
}
