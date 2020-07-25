<?php

require_once '../core/init.php';

/**
 * Code Written by: Mohammad Yeasin
 * File Name: vendorCRUD_backup.php
 * Class Name: null
 * Purpose of the file: This file will ensure the CRUD operations on vendors
 * * you may need to comment and uncomment several lines inorder to check the functionalities
 * Functions included: null
 **/

if (Input::exists()) {
    if (Token::check(Session::get('token'))) {
        try {
        $staff = new Staff();

        // adding a vendor ##validated
        $staff->addVendor(array(
            'vendorCode' => Input::get('vendorCode'),
            'name' => Input::get('name'),
            'address' => Input::get('address').Input::get('addressl2'),
            'contactedPerson' => Input::get('contactedPerson'),
            'contactNo' => Input::get('contactNo')
        ));

        // deleting a doctor ##Validated
        // $staff->deleteVendor(Input::get('vendorCode'));

        // editing a vendor ## uncomment these lines to check edit 
            // $staff->editVendor(Input::get('vendorCode'),array(
            //     'name' => escape(Input::get('name')),
            //     'address' => escape(Input::get('address')).escape(Input::get('addressl2')),
            //     'contactedPerson' => escape(Input::get('contactedPerson')),
            //     'contactNo' => escape(Input::get('contactNo'))
            // ));

        }catch (Exception $th) {
            die($th->getMessage());
        }
    }
}
?>

<form id="doctorCRUD" action="" method="POST" enctype="multipart/form-data">

    <label for="vendorCode">Vendor Code</label>
    <!-- plese comment this line while testing the edit functionality  -->
    <input type="text" name="vendorCode" id="vendorCode" value="<?php echo Input::get('vendorCode') ?>"  required> <br>
    

    <!-- plese uncomment these lines while testing the edit functionality  -->

    <!-- <select name="vendorCode" id="vendorCode" required>
    <option value="">--</option>
            <?php
            $staff = new Staff();
            $staff->getAllVendorCodes();
            ?>
        </select> -->

    <label for="name">Name</label>
    <input type="text" name="name" id="name" value="<?php echo Input::get('name') ?>" required> <br>

    <label for="address">Address</label>
    <input type="text" name="address" id="address" value="<?php echo Input::get('address') ?>" required> <br>
    <input type="text" name="addressl2" id="addressl2" value="<?php echo Input::get('addressl2') ?>"> <br>

    <label for="contactedPerson">contacted Person</label>
    <input type="text" name="contactedPerson" id="contactedPerson" value="<?php echo Input::get('contactedPerson') ?>" required> <br>

    <label for="contactNo">contact No</label>
    <input type="text" name="contactNo" id="contactNo" value="<?php echo Input::get('contactNo') ?>" required> <br>

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

        var vid = "<?php $id = new ID(''); echo $id->generateID('vendor'); ?>";
        $('#vendorCode').val(vid);

        //uncomment this line to check edit 
        // $('#vendorCode').change(function() {
        //     var value = $(this).val();
        //     console.log(value);
        //     if (value){
            // $.post('../api/vendorCRUD_backupScript.php', {
        //             value
        //         }, function(data) {
        //             if (data != null) {
        //                 var results = jQuery.parseJSON(data);
        //                 console.log(results);
        //                 $('#name').val(results.name);
        //                 $('#address').val(results.address);
        //                 $('#contactedPerson').val(results.contactedPerson);
        //                 $('#contactNo').val(results.contactNo);
        //             }
        //         });
        //     }
        // });

    });
</script>