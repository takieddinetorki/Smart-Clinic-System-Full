<?php
require_once '../core/init.php';

if (Input::exists()) {
    if (Token::check(Session::get('token'))) {
        $staff = new Staff();
        try {
            $data = array(
                'receiptNo' => Input::get('receiptNo'),
                'startingDate' => Input::get('from'),
                'endingDate' => Input::get('to'),
                'reason' => Input::get('reason', true)
            );
            //* please add the log activity accordingly
            if ($staff->createMedCert($data)) {
                $id = Input::get('receiptNo');
                System::logActivity('g', 1, "New Medical Cert Created with ID ${$id}");
                Redirect::to('../../medical-cert(PAGE).php');
            } else {
                System::logActivity('u', 2, 'Expense Creation Failed');
                Redirect::to('../../medical-cert(PAGE).php');
            }
        } catch (Exception $th) {
            die($th->getMessage());
        }
    }
}
