<?php
require_once ('../core/init.php');

if (Input::exists()) {
    if (Token::check(Session::get('token'))) {
        $validate = new Validate();
        $validation = $validate->check($_POST, array(  
        ));
        if ($validation->passed()) {
            $clinic = new Clinic();
            $clinicDB = new ClinicDB;
            try {
                $abbr = str_replace(' ', '', Input::get('abbr'));
                $clinicID = new ID(Input::get('abbr'));
                $clinicID = $clinicID->generateID('clinic');
                $clinic->createClinic('_pdo','clinics', array(
                    'clinicID' => $clinicID,
                    'clinicName' => escape( Input::get('clinicName')),
                    'abbr' => strtoupper($abbr),
                    'salesTaxR' => Input::get('salesTaxR'),
                    'GSTRegister' => Input::get('GSTRegister'),
                    'BankAccount' => Input::get('BankAccount'),
                    'Address' => Input::get('Address') 
                ));
                // dynamic database creation upon clinic registration
                //please check the statement I am not sure whether it will be work or not
                $clinic->setDB($clinicDB->getClinicInfo('clinicID', 'clinicName', escape( Input::get('clinicName'))));
                /**
                 * Change this later on when hosting the file
                 * What should be changed is the name of the file hosting the logs make it as unpredictable as possible
                 * That's to avoid tools like gobuster dirbuster and ffuf to guess it and actually be able possibly exploit
                 * Added escape just for the complexity
                 * Note written by: Taki Eddine
                 */

                $logPath = __ROOT__ . '/logs/'. escape($clinicID);
                /**
                 * Basically inside the log folder each clinic has its own log directory check the System.php for more info
                 * Note written by: Taki Eddine
                 */
                if(!mkdir($logPath)) echo 'Failed to create folder';
                //Session::flash('home', 'You have successfully registered your Clinic');
                //header("Location:index.php");
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
<style>
    * {
        box-sizing: border-box;
    }

    /* Add padding to containers */
    .container {
        padding: 16px;
        margin: auto;
        background-color: white;
        width: 60%;
        border-radius: 5px;
    }

    body {
        font-family: Arial, Helvetica, sans-serif;
        background-color: #3e3e47;
    }

    /* Full-width input fields */
    input[type=text]{
        width: 100%;
        padding: 15px;
        margin: 5px 0 22px 0;
        display: inline-block;
        border: none;
        background: #f1f1f1;
    }

    input[type=text]:focus{
        background-color: #ddd;
        outline: none;
    }

    /* Overwrite default styles of hr */
    hr {
        border: 1px solid #f1f1f1;
        margin-bottom: 25px;
    }

    /* Set a style for the submit button */
    .registerbtn {
        background-color: #4CAF50;
        color: white;
        padding: 16px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
        opacity: 0.9;
    }

    .registerbtn:hover {
        opacity: 1;
    }

    /* Add a blue text color to links */
    a {
        color: dodgerblue;
    }
</style>
<body>
    <form action="" method="POST">
        <div class="container">
            <h1>Register</h1>
            <p>Please fill in this form to create a Clinic account.</p>
            <hr>

            <label for="clinicName"><b>Enter Clinic Name</b></label>
            <input type="text" placeholder="eg. UTM Pusat Kesiatan" name="clinicName" value="<?php echo Input::get('clinicName') ?>" autocomplete="off">

            <label for="abbr"><b>Enter clinic Short Form</b></label>
            <input type="text" placeholder="eg. UTMPK" name="abbr" value="<?php echo Input::get('abbr') ?>" maxlength="4" autocomplete="off">

            <label for="salesTaxR"><b>Sales Tax</b></label>
            <input type="text" name="salesTaxR" value="<?php echo Input::get('salesTaxR') ?>" autocomplete="off">
            <label for="GSTRegister"><b>GST Register</b></label>
            <input type="text" name="GSTRegister" value="<?php echo Input::get('GSTRegister') ?>" autocomplete="off">
            <label for="BankAccount"><b>Your bank account</b></label>
            <input type="text" name="BankAccount" value="<?php echo Input::get('BankAccount') ?>" autocomplete="off">
            <label for="Address"><b>Address</b></label>
            <input type="text" name="Address" value="<?php echo Input::get('Address') ?>" autocomplete="off">
            <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
            <hr>
            <p>By creating a clinic account you agree to our <a href="#">Terms & Privacy</a>.</p>

            <input type="submit" class="registerbtn" value="Register My clinic">
        </div>
    </form>
</body>

