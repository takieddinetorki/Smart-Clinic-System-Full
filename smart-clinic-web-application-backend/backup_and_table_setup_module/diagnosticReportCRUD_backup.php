<?php

require_once '../core/init.php';

/**
 * Code Written by: Mohammad Yeasin
 * File Name: diagnosticReportCRUD_backup.php
 * Class Name: null
 * Purpose of the file: This file will ensure the CRUD operations on Diagnosis Report's Options
 * Functions included: null
 * all the functionalities are checked, you will feel bored while checing all of them
 * * you may need to comment and uncomment several lines inorder to check the functionalities
 **/

if (Input::exists()) {
    if (Token::check(Session::get('token'))) {
        try {
        $staff = new Staff();

        // adding symptoms 
        $staff->addSymptoms(array(
            'name' => nput::get('sname'),
        ));

        // adding diagnosis
        $staff->addDiagnosis(array(
            'name' => Input::get('dname'),
        ));

        // adding treatment
        $staff->addTreatments(array(
            'name' => Input::get('tname'),
        ));

        // adding allergy
        $staff->addAllergies(array(
            'name' => Input::get('aname'),
        ));

        // deleting symptoms 
        // $staff->deleteSymptoms(escape(Input::get('sname')));
        // deleting diagnosis 
        // $staff->deleteDiagnosis(escape(Input::get('dname')));
        // deleting treatment 
        // $staff->deleteTreatment(escape(Input::get('tname')));
        // deleting allergy 
        // $staff->deleteAllergy(escape(Input::get('aname')));


        // editing SYmptoms
        // $staff->editSymptoms(escape(Input::get('sname')),array(
        //     'name' => escape(Input::get('schange')),
        // ));
        // editing Diagnosis
        // $staff->editDiagnosis(escape(Input::get('dname')),array(
        //     'name' => escape(Input::get('dchange')),
        // ));
        // editing Treatment
        // $staff->editTreatment(escape(Input::get('tname')),array(
        //     'name' => escape(Input::get('tchange')),
        // ));
        // editing Allergy
        // $staff->editAllergy(escape(Input::get('aname')),array(
        //     'name' => escape(Input::get('achange')),
        // ));


        }catch (Exception $th) {
            die($th->getMessage());
        }
    }
}
?>

<form id="diagnosticCRUD" action="" method="POST">

    <b>Symptoms</b> <br>
    <label for="sname">Symptoms Old Name</label>
    <input type="text" name="sname" id="sname" value="<?php echo Input::get('sname') ?>"> <br> <br>
    <!-- please uncomment this lines when want to check edit functionality -->
    <!-- <label for="schange">Symptoms New Name</label>
    <input type="text" name="schange" id="schange" value="<?php echo Input::get('schange') ?>"> <br> <br> -->

    <b>Diagnosis</b><br>
    <label for="dname">Diagnosis Old Name</label>
    <input type="text" name="dname" id="dname" value="<?php echo Input::get('dname') ?>"> <br><br>
    <!-- please uncomment this lines when want to check edit functionality -->
    <!-- <label for="dchange">Diagnosis New Name</label>
    <input type="text" name="dchange" id="dchange" value="<?php echo Input::get('dchange') ?>"> <br><br> -->

    <b>Treatment</b><br>
    <label for="tname">Treatment Old Name</label>
    <input type="text" name="tname" id="tname" value="<?php echo Input::get('tname') ?>"> <br><br>
    <!-- please uncomment this lines when want to check edit functionality -->
    <!-- <label for="tchange">Treatment New Name</label>
    <input type="text" name="tchange" id="tchange" value="<?php echo Input::get('tchange') ?>"> <br><br> -->

    <b>Allergy</b> <br>
    <label for="aname">Allergy Old Name</label>
    <input type="text" name="aname" id="aname" value="<?php echo Input::get('aname') ?>"> <br><br>
    <!-- please uncomment this lines when want to check edit functionality -->
    <!-- <label for="achange">Allergy New Name</label>
    <input type="text" name="achange" id="achange" value="<?php echo Input::get('achange') ?>"> <br><br> -->

    <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
    <input type="submit" class="registerbtn" name="submit" value="Submit">
    </div>
</form>
</body>