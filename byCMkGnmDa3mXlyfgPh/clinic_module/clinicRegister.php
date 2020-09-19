<?php
require_once ('../core/init.php');

if (Input::exists()) {
    $clinic = new Clinic();
    $clinicDB = new ClinicDB;
    try {
        $abbr = str_replace(' ', '', Input::get('abbr'));

        $clinicID = new ID(Input::get('abbr'));
        $clinicID = $clinicID->generateID('clinic');
        $clinic->createClinic('_pdo','clinics', array(
            'clinicID' => escape($clinicID),
            'clinicName' => escape( Input::get('clinicName')),
            'abbr' => escape(strtoupper($abbr)),
            'salesTaxR' => escape(Input::get('salesTaxR')),
            'GSTRegister' => escape(Input::get('GSTRegister')),
            'BankAccount' => escape(Input::get('BankAccount')),
            'Address' => escape(Input::get('Address')) 
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



