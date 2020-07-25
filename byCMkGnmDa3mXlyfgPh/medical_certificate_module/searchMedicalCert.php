<?php
require_once '../core/init.php';

/**
 * Code Written by: Leong
 * File Name: searchMedicalCert.php
 * Class Name: -
 * Purpose of the file: A search bar which will be used for searching medical certificates based on parameters supplied such as Patient ID, Patient Name or Receipt No
 * Functions included: -
 **/

if (Input::exists()) {
    if (Token::check(Session::get('token'))) {
        $validate = new Validate();
        $validation = $validate->check($_POST, array(
            //no more backend validation
        ));
        if ($validation->passed()) {
            $staff = new Staff();
            try {
                if ($val = Input::get('option')) {
                    switch ($val) {
                        case 'ID':
                            $values = $staff->searchMedCert(Input::get('search'), 'P.patientID');
                            break;
                        case 'Name':
                            $values = $staff->searchMedCert(Input::get('search'), 'P.name');
                            break;
                        case 'ReceiptNo':
                            $values = $staff->searchMedCert(Input::get('search'), 'M.receiptNo');
                            break;
                    }

                    //here the front-end code for the GUI as a table format but now just print_r()
                    print_r($values);
                } else echo 'Please seletc one of the option from the list.';
            } catch (Exception $th) {
                die($th->getMessage());
            }
        } else {
            foreach ($validation->errors() as $error) {
                echo "{$error} <br>";
            }
        }
    }
}
?>
<form action="" method="POST">
    <input type="text" name="search" id="" placeholder="search here" value="<?php echo Input::get('search') ?>"> <br>
    <input type="radio" name="option" id="" value="ID"> Search by Patient ID <br>
    <input type="radio" name="option" id="" value="Name"> Search by Name <br>
    <input type="radio" name="option" id="" value="ReceiptNo"> Search by Receipt No <br>
    <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
    <input type="submit" class="registerbtn" value="search">
    </div>
</form>
</body>