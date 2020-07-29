<?php
require_once '../core/init.php';

if (Input::exists()) {
    if (Token::check(Session::get('token'))) {
        $validate = new Validate();
        $validation = $validate->check($_POST, array(
            //no more backend validation
        ));
        if ($validation->passed()) {

            try {
                $email = new Email();
                $email->passwordChangeRequest(Input::get('email'));

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
    <label for="email">Enter Email</label>
    <input type="mail" name="email" id="" value="<?php echo Input::get('email') ?>"> <br>
    <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
    <input type="submit" class="registerbtn" value="Submit">
    </div>
</form>
</body>