<?php

require_once '../core/init.php';

/**
 * Code Written by: Mohammad Yeasin
 * File Name: medicineCRUD_backup.php
 * Class Name: null
 * Purpose of the file: This file will ensure the CRUD operations on Medicines
 * * you may need to comment and uncomment several lines inorder to check the functionalities
 * Functions included: null
 **/

if (Input::exists()) {
    if (Token::check(Session::get('token'))) {
        try {
        $staff = new Staff();

        // adding a vendor ##validated
        $staff->addMedicine(array(
            'itemCode' => Input::get('itemCode'),
            'name' => Input::get('name'),
            'barcode' => Input::get('barcode'),
            'price' => Input::get('price')
        ));

        // deleting a doctor ##Validated
        // $staff->deleteMedicine(Input::get('itemCode'));

        // editing a vendor ## uncomment these lines to check edit 
            // $staff->editMedicine(Input::get('itemCode'),array(
            //     'name' => escape(Input::get('name')),
            //     'barcode' => escape(Input::get('barcode')),
            //     'price' => Input::get('price')
            // ));

        }catch (Exception $th) {
            die($th->getMessage());
        }
    }
}
?>

<form id="doctorCRUD" action="" method="POST" enctype="multipart/form-data">

    <label for="itemCode">Item Code</label>
    <!-- plese comment this line while testing the edit functionality  -->
    <input type="text" name="itemCode" id="itemCode" value="<?php echo Input::get('itemCode') ?>"  required> <br>
    

    <!-- plese uncomment these lines while testing the edit functionality  -->

    <!-- <select name="itemCode" id="itemCode" required>
    <option value="">--</option>
            <?php
            $staff = new Staff();
            $staff->getAllMedicineCodes();
            ?>
        </select> -->

    <label for="name">Name</label>
    <input type="text" name="name" id="name" value="<?php echo Input::get('name') ?>" required> <br>

    <label for="barcode">Barcode</label>
    <input type="text" name="barcode" id="barcode" value="<?php echo Input::get('barcode') ?>" required> <br>

    <label for="price">Price</label>
    <input type="number" name="price" id="price" min="0" step=".01" value="<?php echo Input::get('price') ?>" required> <br>

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

        var mid = "<?php $id = new ID(''); echo $id->generateID('medicine');?>";
        $('#itemCode').val(mid);

        //uncomment this line to check edit 
        // $('#itemCode').change(function() {
        //     var value = $(this).val();
        //     if (value){
                // $.post('../api/medicineCRUD_backupScript.php', {
        //             value
        //         }, function(data) {
        //             if (data != null) {
        //                 var results = jQuery.parseJSON(data);
        //                 $('#name').val(results.name);
        //                 $('#barcode').val(results.barcode);
        //                 $('#price').val(results.price);
        //             }
        //         });
        //     }
        // });

    });
</script>