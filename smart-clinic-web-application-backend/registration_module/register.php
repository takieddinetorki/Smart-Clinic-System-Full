<?php
require_once '../core/init.php';

if (Input::exists()) {
    if (Token::check(Session::get('token'))) {
            $user = new User;
            try {
                //changes 
                $clinicDB = new ClinicDB();
                $clinicID = new ID(Input::get('clinic'));
                $encryption_key = Hash::encrypt(Key::GenerateKey(128));
                $user->create('staff', array(
                    //changes
                    'staffID' => $clinicID->generateID('staff'),
                    'title' => (Input::get('title')),
                    'clinicID' => $clinicDB->getClinicInfo('clinicID','abbr',(Input::get('clinic'))),
                    'firstName' => (Input::get('firstName')),
                    'lastName' => (Input::get('lastName')),
                    'mobileNumber' => (Input::get('mobileNumber')),
                    'email' => (Input::get('email')),
                    'gender' => (Input::get('gender')),
                    'birthdate' => (Input::get('birthdate')),
                    'username' => (Input::get('username')),
                    'password' => Hash::generate(Input::get('password'), $encryption_key,128),
                    'encryptionKey' => $encryption_key
                ));
                Session::flash('home', 'You have been registered successfully');
                Redirect::to('../index.php');
            } catch (Exception $th) {
                die($th->getMessage());
            }
        }
    }
?>
<style>
input {
    margin: 5px;
}
</style>
<form action="" method="post">
    <div class="field">
        <label for="title">Title</label>
        <select name="title" id="title">
            <option value="Mr">Mr</option>
        </select>
    </div>
    <div class="field">
        <label for="firstName">First name</label>
        <input type="text" name="firstName" value="<?php echo Input::get('firstName') ?>" id="firstName" autocomplete="off">
    </div>
    <div class="field">
        <label for="lastName">Last name</label>
        <input type="text" name="lastName" value="<?php echo Input::get('lastName') ?>" id="lastName" autocomplete="off">
    </div>
    <div class="field">
        <label for="clinic">Clinic</label>
        <select name="clinic" id="clinic">        
            <?php 
            $clinicDB = new ClinicDB;
            $data = $clinicDB->getAllAbbreviations();
            ?>
        </select>
    </div>
    <div class="field">
        <label for="mobileNumber">Phone number</label>
        <input type="text" name="mobileNumber" value="<?php echo Input::get('mobileNumber') ?>" id="mobileNumber" autocomplete="off">
    </div>
    <div class="field">
        <label for="email">Email</label>
        <input type="text" name="email" value="<?php echo Input::get('email') ?>" id="email" autocomplete="off">
    </div>
    <div class="field">
        <label for="gender">Gender</label>
        <select name="gender" id="gender">
            <option value="Male">Male</option>
            <option value="Female">female</option>
            <option value="Unspecified">Unspecified</option>
        </select>
    </div>
    <div class="field">
        <label for="birthdate">Birth date</label>
        <input type="date" name="birthdate" value="<?php echo Input::get('birthdate') ?>" id="birthdate" autocomplete="off">
    </div>
    <div class="field">
        <label for="username">Username</label>
        <input type="text" name="username" value="<?php echo Input::get('username') ?>" id="username" autocomplete="off">
    </div>
    <div class="field">
        <label for="password">Password</label>
        <input type="password" name="password" value="" id="password" autocomplete="off">
    </div>
    <div class="field">
        <label for="passwordConf">Confirm password</label>
        <input type="password" name="passwordConf" value="" id="passwordConf" autocomplete="off">
    </div>
    <input type="submit" value="Register" name="submit" />
    <input type="hidden" nanme="token" value="<?php echo Token::generate(); ?>">
</form>
<a href="../index.php">Home</a>