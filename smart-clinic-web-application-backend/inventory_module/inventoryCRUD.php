<?php

require_once '../core/init.php';

/**
 * Code Written by: Mohammad Yeasin
 * File Name: inventoryCRUD.php
 * Class Name: null
 * Purpose of the file: This file will ensure the CRUD operations on Inventory
 * * you may need to comment and uncomment several lines inorder to check the functionalities
 * Functions included: null
 **/

if (Input::exists()) {
    if (Token::check(Session::get('token'))) {
        try {
        $staff = new Staff();

        // adding an inventory item ##validated
        $staff->addInventory(array(
            'inventoryID' => Input::get('inventoryID'),
            'quantity' => Input::get('quantity'),
            'expiry' => Input::get('expiry'),
            'itemCode' => Input::get('itemCode'),
        ));

        // deleting an inventory item ##Validated
        // $staff->deleteInventory(Input::get('inventoryID'));

        // editing an inventory item ## uncomment these lines to check edit 
            // $staff->editInventroy(Input::get('inventoryID'),array(
            //     'quantity' => escape(Input::get('quantity')),
            //     'expiry' => Input::get('expiry'),
            //     'itemCode' => Input::get('itemCode'),
            // ));

        }catch (Exception $th) {
            die($th->getMessage());
        }
    }
}
?>

<form id="inventoryCRUD" action="" method="POST">

    <label for="inventoryID">Inventory ID</label>
    <!-- plese comment this line while testing the edit functionality  -->
    <input type="text" name="inventoryID" id="inventoryID" value="<?php echo Input::get('inventoryID') ?>"  required> <br>
    

    <!-- plese uncomment these lines while testing the edit functionality  -->

    <!-- <select name="inventoryID" id="inventoryID" required>
    <option value="">--</option>
            <?php
            $staff = new Staff();
            $staff->getAllInventoryIDs();
            ?>
        </select> -->

    <label for="itemCode">Item Code</label>
    <select name="itemCode" id="itemCode" required>
    <option value="">--</option>
    <?php
            $staff = new Staff();
            $staff->getAllMedicineCodes();
            ?>
        </select>

    <label for="name">Name</label>
    <input type="text" name="name" id="name" value="<?php echo Input::get('name') ?>" required> <br>

    <label for="quantity">Stock</label>
    <input type="number" name="quantity" id="quantity" min="0" value="<?php echo Input::get('quantity') ?>" required> <br>
    
    <label for="expiry">Expiry Date</label>
    <input type="date" name="expiry" id="expiry" value="<?php echo Input::get('expiry') ?>" required> <br>

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
        var ivid = "<?php $id = new ID(''); echo $id->generateID('inventory');?>";
        $('#inventoryID').val(ivid);

        // dont comment this portino
        $('#itemCode').change(function() {
            var value = $(this).val();
            if (value){
                $.post('../api/medicineCRUD_backupScript.php', {
                    value
                }, function(data) {
                    if (data != null) {
                        var results = jQuery.parseJSON(data);
                        $('#name').val(results.name);
                    }
                });
            }
        });


        //uncomment this line to check edit 
        // $('#inventoryID').change(function() {
        //     var value = $(this).val();
        //     if (value){
            // $.post('../api/inventoryCRUDScript.php', {
        //             value
        //         }, function(data) {
        //             if (data != null) {
        //                 var results = jQuery.parseJSON(data);
        //                 $('#quantity').val(results[0].quantity);
        //                 $('#expiry').val(results[0].expiry);
        //                 $('#itemCode').val(results[0].itemCode);
        //                 $('#name').val(results[1]);
        //             }
        //         });
        //     }
        // });

    });
</script>