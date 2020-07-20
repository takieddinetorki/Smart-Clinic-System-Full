<?php 
require_once '../core/init.php';

if (Input::exists()) {
    if (Token::check(Session::get('token'))) {
        $validate = new Validate();
        $validation = $validate->check(array(
            'firstName' => array(
                'required' => true,
                'min' => 2,
                'max' => 30,
            ),
            'lastName' => array(
                'required' => true,
                'min' => 2,
                'max' => 30,
            ),
            'email' => array(
                'required' => true,
                'min' => 2,
                'max' => 30,
            ),
            'clinicInit' => array(
                'required' => true,
                'min' => 4,
                'max' => 4
            ),
            'mobileNumber' => array(
                'required' => true
            ),

        ));

        if ($validation->passed()) {
            $clinic = new Clinic();
            try {
                $encryption_key = Key::GenerateKey(128);
                $cryp = new AES(Input::get('password'), $encryption_key, 128,'CBC');
                $clinicID = new ID(Input::get('clinic'));
                $user->create(array(
                    'clinic' => Input::get('clinic'),
                    'staffID' => $clinicID->generate(),
                    'title' => Input::get('title'),
                    'firstName' => Input::get('firstName'),
                    'lastName' => Input::get('lastName'),
                    'mobileNumber' => Input::get('mobileNumber'),
                    'email' => Input::get('email'),
                    'gender' => Input::get('gender'),
                    'birthdate' => Input::get('birthdate'),
                    'username' => Input::get('username'),
                    'password' => $cryp->encrypt(),
                    'encryptionKey' => $encryption_key
                ));
                Session::flash('home', 'You have been registered successfully');
                header("Location:index.php");
            } catch (Exception $th) {
                die($th->getMessage());
            }
        }else {
            foreach ($validation->errors() as $error) {
                echo "{$error} <br>";
            }
        }
    }
}

?>


<form action="" method="post">
    <div class="field">
        <label for="firstName">Doctor's first name</label>
        <input type="text" name="firstName" value="<?php echo Input::get('firstName') ?>" id="firstName" autocomplete="off">
    </div>
    <div class="field">
        <label for="lastName">Doctor's last name</label>
        <input type="text" name="lastName" value="<?php echo Input::get('lastName') ?>" id="lastName" autocomplete="off">
    </div>
    <div class="field">
        <label for="clinic">Clinic</label>
        <input type="text" name="clinicInit" id="" value="<?php echo Input::get('clinicID') ?>">
    </div>
    <div class="field">
        <label for="mobileNumber">Phone number</label>
        <input type="text" name="mobileNumber" value="<?php echo (Input::get('mobileNumber')) ?>" id="mobileNumber" autocomplete="off">
    </div>
    <div class="field">
        <label for="email">Email</label>
        <input type="text" name="email" value="<?php echo (Input::get('email')) ?>" id="email" autocomplete="off">
    </div>
    <input type="submit" value="Register Doctor" name="submit" />
    <input type="hidden" nanme="token" value="<?php echo Token::generate(); ?>">
</form>