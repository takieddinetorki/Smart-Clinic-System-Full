<?php

require_once '../core/init.php';

/**
 * Code Written by: Mohammad Yeasin
 * File Name: doctorCRUD_backup.php
 * Class Name: null
 * Purpose of the file: This file will ensure the CRUD operations on doctors
 * * you may need to comment and uncomment several lines inorder to check the functionalities
 * Functions included: null
 **/

if (Input::exists()) {
    if (Token::check(Session::get('token'))) {
        try {
        $staff = new Staff();

        // Putting the file into the server
        $file = Input::getFile('picture');
            $allowed = array('jpg','jpeg','png');
            $ext = explode('.',$file['name']);
            $FileExt = strtolower(end($ext));
            $did = Input::get('doctorID');
            if(in_array($FileExt,$allowed)){
                $fileDest = "./images/doctors/{$did}.{$FileExt}";
                move_uploaded_file($file['tmp_name'],$fileDest);
            }else echo "You can not upload {$fileExt} type of file";

        // adding a doctor ##validated
        $staff->addDoctor(array(
            'doctorID' => Input::get('doctorID'),
            'name' => Input::get('name'),
            'nric' => Input::get('nric'),
            'gender' => Input::get('gender'),
            'MMCregNo' => Input::get('MMCregNo'),
            'contactNo' => Input::get('contactNo'),
            'picture' => $fileDest,
        ));

        // deleting a doctor ##Validated
        // $staff->deleteDoctor(Input::get('doctorID'));

        //editing a doctor ## uncomment these lines to check edit 
        // $did = Input::get('doctorID');
        // if(file_exists($_FILES['picture']['tmp_name']) || !is_uploaded_file($_FILES['picture']['tmp_name'])){
        //     // if no picture uploaded
        //     $staff->editDoctor($did,array(
        //         'name' => escape(Input::get('name')),
        //         'nric' => escape(Input::get('nric')),
        //         'gender' => escape(Input::get('gender')),
        //         'MMCregNo' => escape(Input::get('MMCregNo')),
        //         'contactNo' => escape(Input::get('contactNo')),
        //     ));
        //     echo 'Successfully Edited without changing picture';
        // }else{
        //     $file = Input::getFile('picture');
        //     $allowed = array('jpg','jpeg','png');
        //     $ext = explode('.',$file['name']);
        //     $FileExt = strtolower(end($ext));
        //     if(in_array($FileExt,$allowed)){
        //         $fileDest = "./images/doctors/{$did}.{$FileExt}";
        //         move_uploaded_file($file['tmp_name'],$fileDest);
        //     }else echo "You can not upload {$fileExt} type of file";
            
        //     $staff->editDoctor($did,array(
        //         'name' => escape(Input::get('name')),
        //         'nric' => escape(Input::get('nric')),
        //         'gender' => escape(Input::get('gender')),
        //         'MMCregNo' => escape(Input::get('MMCregNo')),
        //         'contactNo' => escape(Input::get('contactNo')),
        //         'picture' => escape($fileDest),
        //     ));
        //     echo 'Successfully Edited';
        // }

        }catch (Exception $th) {
            die($th->getMessage());
        }
    }
}
?>

<form id="doctorCRUD" action="" method="POST" enctype="multipart/form-data">

    <label for="doctorID">Doctor ID</label>
    <!-- plese comment this line while testing the edit functionality  -->
    <input type="text" name="doctorID" id="doctorID" value="<?php echo Input::get('doctorID') ?>"  required> <br>
    <!-- <select name="doctorID" id="doctorID" required>
    <option value="">--</option>
            <?php
            $staff = new Staff();
            $staff->getAllDoctorID();
            ?>
        </select> -->

    <label for="name">Name</label>
    <input type="text" name="name" id="name" value="<?php echo Input::get('name') ?>" required> <br>

    <label for="nric">NRIC</label>
    <input type="text" name="nric" id="nric" value="<?php echo Input::get('nric') ?>" required> <br>

    <label for="gender">Gender</label>
    <input type="text" name="gender" id="gender" value="<?php echo Input::get('gender') ?>" required> <br>

    <label for="MMCregNo">MMC Reg No</label>
    <input type="text" name="MMCregNo" id="MMCregNo" value="<?php echo Input::get('MMCregNo') ?>" required> <br>

    <label for="contactNo">Contact Number</label>
    <input type="text" name="contactNo" id="contactNo" value="<?php echo Input::get('contactNo') ?>" required> <br>

    <label for="picture">Profile Picture</label>
    <input type="file" name="picture" id="picture" value="<?php echo Input::get('picture') ?>"> <br>

    <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
    <input type="submit" class="registerbtn" name="submit" value="Submit">
    </div>
</form>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>

    $(document).ready(function() {

        //generating doctor ID automatically
        //make comment this 2 line while checking the edititng functionality
        var did = "<?php $id = new ID(''); echo $id->generateID('doctor'); ?>";
        $('#doctorID').val(did);

        //uncomment this line to check edit 
        // $('#doctorID').change(function() {
        //     var value = $(this).val();
        //     console.log(value);
        //     if (value){
                // $.post('../api/doctorCRUD_bacup_script.php', {
        //             value
        //         }, function(data) {
        //             if (data != null) {
        //                 var results = jQuery.parseJSON(data);
        //                 console.log(results);
        //                 $('#name').val(results.name);
        //                 $('#nric').val(results.nric);
        //                 $('#gender').val(results.gender);
        //                 $('#MMCregNo').val(results.MMCregNo);
        //                 $('#contactNo').val(results.contactNo);
        //             }
        //         });
        //     }
        // });

    });
</script>