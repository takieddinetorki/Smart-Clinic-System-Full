<?php
require_once '../core/init.php';

/**
 * Code Written by: Mohammad Yeasin
 * File Name: accountCodeCRUD_backup.php
 * Class Name: null
 * Purpose of the file: This file will ensure the CRUD operations on accountCodes
 ** you may need to comment and uncomment several lines inorder to check the functionalities
 * Functions included: null
 **/
if (Input::exists()) {
    if (Token::check(Session::get('token'))) {
        try {
            $staff = new Staff();

            // adding accountCode
            // please make comment these lines to check other functionality
            $staff->addAccountCode(array(
                'accountCode' => Input::get('accountCode'),
                'name' => (Input::get('name'))
            ));

            // deleting account code ##please uncomment these lines while checking the functionality
            // $staff->deleteAccountCode(Input::get('accountCode'));

            // editing accountCode ##please uncomment these lines while checking the functionality
            // $staff->editAccountCode(Input::get('accountCode'),array(
            //     'name' => escape(Input::get('name'))
            // ));
        } catch (Exception $th) {
            die($th->getMessage());
        }
    }
}
?>

<form id="myform" action="" method="POST">

    <label for="accountCode">Account Code</label>
    <input type="text" name="accountCode" id="accountCode" value="<?php echo Input::get('accountCode') ?>" required> <br>

    <!-- please uncomment these lines while checking editing functionality -->
    <!-- <select name="accountCode" id="accountCode" required>
    <option value="">--</option>
    <?php
    $staff = new Staff();
    $staff->getAllAccountCode();
    ?>
        </select> -->

    <label for="name">Account Name</label>
    <input type="text" name="name" id="name" value="<?php echo Input::get('name') ?>" required> <br>

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
        var accountCode = "<?php $id = new ID('');
                            echo $id->generateID('accountCode'); ?>";
        $('#accountCode').val(accountCode);

        //uncomment this line to check edit ##please uncomment these lines while checking the edititng functionality
        // $('#accountCode').change(function() {
        //     var value = $(this).val();
        //     if (value){
        // $.post('../api/expenseScript.php', {
        //             value
        //         }, function(data) {
        //             if (data != null) {
        //                 var results = jQuery.parseJSON(data);
        //                 $('#name').val(results);
        //             }
        //         });
        //     }
        // });

    });
</script>