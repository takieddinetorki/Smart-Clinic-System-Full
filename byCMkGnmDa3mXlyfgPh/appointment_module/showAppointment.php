<?php
require_once '../core/init.php';

if (Input::exists()) {
    if (Token::check(Session::get('token'))) {
        $validate = new Validate();
        $validation = $validate->check($_POST, array(
            //no more backend validation
        ));
        if ($validation->passed()) {
            $staff = new Staff();
            try {
                // print_r($staff->listAllAppointment());
                // print_r($staff->listCustomeAppointment(Input::get('search')));
                // print_r($staff->listUpcomingAppointments());
                // $staff->changeAppointmentStatus(Input::get('search'),array(
                //     'status' => 'Completed'
                // ));
                // print_r($staff->listAllAppointment());

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
    <input type="date" name="search" id="" value="<?php echo deescape(Input::get('search')) ?>"> <br>
    <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
    <input type="submit" class="registerbtn" value="search">
    </div>
</form>
</body>