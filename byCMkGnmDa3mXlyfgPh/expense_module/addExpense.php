<?php
require_once '../core/init.php';

if (Input::exists()) {
    if (Token::check(Session::get('token'))) {
        $staff = new Staff();
        $error = false;
        try {
            $data = array(
                'voucherNo' => Input::get('voucherNo'),
                'date' => Input::get('date'),
                'ammount' => Input::get('ammount'),
                'particulation' => escape(Input::get('particulationA')." ".Input::get('particulationB')),
                'accountCode' => Input::get('accountCode')
            );
            //* please add the log activity accordingly
            if ($staff->createExpense($data)) {
                $id = Input::get('voucherNo');
                System::logActivity('g', 1, "New Expense Created with ID ${$id}");
                Redirect::to('../../expenses(PAGE).php');
            } else {
                System::logActivity('u', 2, 'Expense Creation Failed');
                Redirect::to('../../expenses(PAGE).php');
            }
        } catch (Exception $th) { die($th->getMessage()); }
    }
}
