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
            $user = new User();
            $pid = Input::get('patientID');
            // moving patients photo to the server
            $file = Input::getFile('file');
            $allowed = array('jpg','jpeg','png');
            $ext = explode('.',$file['name']);
            $FileExt = strtolower(end($ext));
            if(in_array($FileExt,$allowed)){
                $fileDest = "../files/profile_pictures/patients/{$pid}.{$FileExt}";
                move_uploaded_file($file['tmp_name'],$fileDest);
            }else echo "You can not upload {$fileExt} type of file";
            
            // moving patients medicalHistory to the server
            $reportDest = '';
            $report = Input::getFile('report');
            if($report != null){
                $Rallowed = array('pdf','xls');
                $reportext = explode('.',$report['name']);
                $reportExt = strtolower(end($reportext));
                if(in_array($reportExt,$Rallowed)){
                    $reportDest = "../files/reports/medical_history/{$pid}.{$reportExt}";
                    move_uploaded_file($report['tmp_name'],$reportDest);
                }
            }


            try {
                // testing creating patients
                $staff->createPatient(array(
                    'patientID' => Input::get('patientID'),
                    'NRIC' =>  Input::get('NRIC'),
                    'dob' => Input::get('dob'),
                    'age' => Input::get('age'),
                    'name' => Input::get('name'),
                    'address' => Input::get('address').Input::get('address_l2'),
                    'gender' => Input::get('gender'),
                    'race' => Input::get('race'),
                    'nationality' => Input::get('nationality'),
                    'maritalStatus' => Input::get('maritalStatus'),
                    'mobileNo' => Input::get('mobileNo'),
                    'spouseName' => Input::get('spouseName'),
                    'emergencyContact' => Input::get('emergencyContact'),
                    'relationship' => Input::get('relationship'),
                    'picture' => $fileDest,
                ));


                //testing editing patient 
                // $staff->editPatient(Input::get('patientID'),array(
                //     'NRIC' => escape(Input::get('NRIC')),
                //     'dob' => escape(Input::get('dob')),
                //     'age' => escape(Input::get('age')),
                //     'name' => escape(Input::get('name')),
                //     'address' => escape(Input::get('address').Input::get('address_l2')),
                //     'gender' => escape(Input::get('gender')),
                //     'race' => escape(Input::get('race')),
                //     'nationality' => escape(Input::get('nationality')),
                //     'maritalStatus' => escape(Input::get('maritalStatus')),
                //     'mobileNo' => escape(Input::get('mobileNo')),
                //     'spouseName' => escape(Input::get('spouseName')),
                //     'emergencyContact' => escape(Input::get('emergencyContact')),
                //     'relationship' => escape(Input::get('relationship')),
                //     'picture' => escape($fileDest),
                //     ));

                // // testing deleting rows 
                // $staff->deletePatient(Input::get('patientID'));
               
                $staff->creatMedicalHistory(array(
                    'patientID' => Input::get('patientID'),
                    'illness' => (Input::get('ill')),
                    'smoking' => (Input::get('smoking')),
                    'drinking' => (Input::get('drinking')),
                    'tobacco' => (Input::get('tobacco')),
                    'foodAllergies' => (Input::get('foodAllergies')),
                    'drugAllergies' => (Input::get('drugAllergies')),
                    'otherAllergies' => (Input::get('otherAllergies')),
                    'report' => $reportDest,
                    'doctorID' => Input::get('doctorID'),
                ));

                // $staff->editMedicalHistory(Input::get('patientID'),array(
                //     'illness' => Input::get('ill'),
                //     'smoking' => Input::get('smoking'),
                //     'drinking' => Input::get('drinking'),
                //     'tobacco' => Input::get('tobacco'),
                //     'foodAllergies' => Input::get('foodAllergies'),
                //     'drugAllergies' => Input::get('drugAllergies'),
                //     'otherAllergies' => Input::get('otherAllergies'),
                //     'report' => Input::get('report'),
                //     'doctorID' => Input::get('doctorID'),
                // ));

                // testing deleting rows 
                // $staff->deleteMedicalHistory(Input::get('patientID'));
               
                // Session::flash('home', 'You have been registered successfully');
                // header("Location:index.php");
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
    input {
        margin: 5px;
    }
</style>

<form action="" method="post" enctype="multipart/form-data">
    <div>
    <label for="patientID"><b>Patient ID</b></label>
    <input type="text" name="patientID" id="patientID" value="<?php echo Input::get('patientID') ?>">

    <label for="NRIC"><b>NRIC / Passport</b></label>
    <input type="text" name="NRIC" id="" value="<?php echo Input::get('NRIC') ?>" autocomplete="off">

    <label for="dob"><b>DOB</b></label>
    <input type="date" name="dob" id="" value="<?php echo Input::get('dob') ?>" autocomplete="off">

    <label for="age"><b>Age</b></label>
    <input type="number" name="age" id="" value="<?php echo Input::get('age') ?>" autocomplete="off">
    </div>

    <div>
    <label for="name"><b>Name</b></label>
    <input type="text" name="name" id="" value="<?php echo Input::get('name') ?>" autocomplete="off">
    </div>

    <div>
    <label for="address"><b>Address</b></label>
    <input type="text" name="address" id="" value="<?php echo Input::get('address') ?>" autocomplete="off">
    </div>

    <div>
    <input type="text" name="address_l2" id="" value="<?php echo Input::get('address_l2') ?>" autocomplete="off">
    </div>
 
    <div>
    <label for="gender"><b>Gender</b></label>
    <input type="radio" name="gender" id="" value="Male" autocomplete="off"> male 
    <input type="radio" name="gender" id="" value="Female" autocomplete="off"> Female

    <label for="race"><b>Race</b></label>
    <select name="race" id="">
        <option value="M">M</option>
        <option value="C">C</option>
        <option value="T">T</option>
        <option value="O">O</option>
    </select>

    <label for="nationality"><b>Nationality</b></label>
    <select name="nationality" id="">
        <option value="MY">MY</option>
        <option value="non-MY">non-MY</option>
    </select>

    <label for="maritalStatus"><b>Marital Status</b></label>
    <input type="radio" name="maritalStatus" id="" value="Single" autocomplete="off"> Single 
    <input type="radio" name="maritalStatus" id="" value="Married" autocomplete="off"> Married
    </div>
    
    <div>
    <label for="mobileNo"><b>Mobile No.</b></label>
    <input type="text" name="mobileNo" id="" value="<?php echo Input::get('mobileNo') ?>" autocomplete="off">

    <label for="spouseName"><b>Spouse Name</b></label>
    <input type="text" name="spouseName" id="" value="<?php echo Input::get('spouseName') ?>" autocomplete="off">
    </div>

    <div>
    <label for="emergencyContact"><b>Emergency Contact</b></label>
    <input type="text" name="emergencyContact" id="" value="<?php echo Input::get('emergencyContact') ?>" autocomplete="off">

    <label for="relationship"><b>Relationship</b></label>
    <input type="text" name="relationship" id="" value="<?php echo Input::get('relationship') ?>" autocomplete="off">
    </div>

    <div>
    <label for="doctorID"><b>Doctor ID</b></label>
    <select name="doctorID" id="did">
    <option value="--"></option>
    <?php
        $staff = new Staff();
        $data = $staff->getAllDoctorID();
    ?>
    </select>

    <label for="docname"><b>Doctor Name</b></label>
    <input type="text" name="docname" id="docname" value="" placeholder="" disabled>
    </div>

    <div>
    <label for="file"><b>Insert Profile Picture:</b></label> <input type="file" name="file"><br><br>
    </div>

    <br>
    <br>
    <br>

    <div>
    <label for="ill"><b>Illness</b></label>
    <input type="radio" name="ill" id="" value="Diabetes" autocomplete="off"> Diabetes 
    <input type="radio" name="ill" id="" value="Heart Patient" autocomplete="off"> Heart Patient
    <input type="radio" name="ill" id="" value="Migraine" autocomplete="off"> Migraine
    <input type="radio" name="ill" id="" value="Blood Pressure" autocomplete="off"> Blood Pressure <br>
    <input type="radio" name="ill" id="" value="Lungs" autocomplete="off"> Lungs
    <input type="radio" name="ill" id="" value="Tuberculosis" autocomplete="off"> Tuberculosis
    <!-- <input type="radio" name="ill" id="" value="<?php echo Input::get('ill')?>" autocomplete="off"> Others
    <input type="text" name="ill" id=""> -->
    </div>    

    <div>
    <label for="smoking"><b>Smoking</b></label>
    <input type="radio" name="smoking" id="" value="Never" autocomplete="off"> Never 
    <input type="radio" name="smoking" id="" value="Occational" autocomplete="off"> Occational
    <input type="radio" name="smoking" id="" value="Habitual" autocomplete="off"> Habitual
    </div>

    <div>
    <label for="drinking"><b>Drinking</b></label>
    <input type="radio" name="drinking" id="" value="Never" autocomplete="off"> Never 
    <input type="radio" name="drinking" id="" value="Occational" autocomplete="off"> Occational
    <input type="radio" name="drinking" id="" value="Habitual" autocomplete="off"> Habitual
    </div>

    <div>
    <label for="tobacco"><b>Tobacco</b></label>
    <input type="radio" name="tobacco" id="" value="Never" autocomplete="off"> Never 
    <input type="radio" name="tobacco" id="" value="Occational" autocomplete="off"> Occational
    <input type="radio" name="tobacco" id="" value="Habitual" autocomplete="off"> Habitual <br>
    <input type="radio" name="tobacco" id="" value="<?php echo Input::get('tobacco')?>" autocomplete="off"> Others
    <input type="text" name="tobacco" id="">
    </div>

    <div>
    <label for="allergies"><b>Allergies</b></label>
    <input type="radio" name="foodAllergies" id="" value="<?php echo Input::get('foodAllergies')?>" autocomplete="off"> Food
    <input type="text" name="foodAllergies" id=""> <br>
    <input type="radio" name="drugAllergies" id="" value="<?php echo Input::get('drugAllergies')?>" autocomplete="off"> Drug 
    <input type="text" name="drugAllergies" id=""> <br>
    <input type="radio" name="otherAllergies" id="" value="<?php echo Input::get('otherAllergies')?>" autocomplete="off"> Others 
    <input type="text" name="otherAllergies" id="">
    </div>

    <div>
    <label for="report"><b>Insert Report:</b></label> <input type="file" name="report" ><br><br>
    </div>
    <input type="submit" value="submit" name="submit" />
    <input type="hidden" nanme="token" value="<?php echo Token::generate(); ?>">
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>

    $(document).ready(function() {

        //generating patient ID automatically
        //make comment this 2 line while checking the edititng functionality
        var pid = "<?php $id = new ID(''); echo $id->generateID('patient');?>";
        $('#patientID').val(pid);

        // dont comment this portino
        $('#did').change(function() {
            var value = $(this).val();
            if (value){
                $.post('../api/doctorCRUD_bacup_script.php', {
                    value
                }, function(data) {
                    if (data != null) {
                        var results = jQuery.parseJSON(data);
                        $('#docname').val(results.name);
                    }
                });
            }
        });
    });
</script>