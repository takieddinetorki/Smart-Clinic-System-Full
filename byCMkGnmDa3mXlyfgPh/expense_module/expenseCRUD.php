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
            try {
                if (!empty($_GET['action']) && $_GET['action'] == "edit") {
                    // edit
                    // login/expenseCRUD.php?action=edit&id=VN075
                    $staff->editExpenses(Input::get('voucherNo'), array(
                        'voucherNo' => Input::get('voucherNo'),
                        'date' => Input::get('date'),
                        'ammount' => Input::get('amount'),
                        'particulation' => Input::get('particulation'),
                        'accountCode' => Input::get('accountCode'),
                    ));
                }else{
                $staff->createExpense(array(
                    'voucherNo' => Input::get('voucherNo'),
                    'date' => Input::get('date'),
                    'ammount' => Input::get('amount'),
                    'particulation' => Input::get('particulation'),
                    'accountCode' => Input::get('accountCode'),
                ));

                //for delete the expenses
                // $staff->deleteExpenses(Input::get('voucherNo'));
            }
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

<form id="myform" action="" method="POST">

    <label for="voucherNo">Voucher No</label>
    <input type="text" name="voucherNo" id="voucherNo" value="<?php echo Input::get('voucherNo') ?>"  required> <br>

    <label for="accountCode">Account Code</label>
    <select name="accountCode" id="accountCode" required>
            <?php
            $staff = new Staff();
            $staff->getAllAccountCode();
            ?>
        </select>

    <label for="name">Account Name</label>
    <input type="text" name="name" id="name" value="<?php echo Input::get('name') ?>" required> <br>

    <label for="date">Date</label>
    <input type="date" name="date" id="date" value="<?php echo Input::get('date') ?>" required> <br>

    <label for="amount">Amount</label>
    <input type="number" name="amount" id="amount" min="0" step=".01" value="<?php echo Input::get('amount') ?>" required> <br>

    <label for="particulation">Particulation</label>
    <input type="text" name="particulation" id="particulation" value="<?php echo Input::get('particulation') ?>" required> <br>

    <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
    <input type="submit" class="registerbtn" name="submit" value="Submit">
    </div>
</form>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }

    $(document).ready(function() {
        $.urlParam = function(name) {
            var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
            if (results)
                return results[1] || 0;
        }
        // login/expenseCRUD.php?action=edit&id=VN531
        var action = $.urlParam('action');
        var id = $.urlParam('id');
        if (action === "edit" && id) {
            $('#voucherNo').val(id);
            $.post('../api/expenseScript.php', {
                value: id,action
            }, function(data) {
                if (data != null) {
                    console.log('entered');
                    var results = jQuery.parseJSON(data);
                    console.log(results);
                    $('#date').val(results.date);
                    $('#amount').val(results.ammount);
                    $('#particulation').val(results.particulation);
                    $('#name').val(results.names);
                    $('#accountCode').val(results.accountCode);
                }
            });
        }


        //please uncomment this 2 line while edit expenses 
        var vid = "<?php $id = new ID(''); echo $id->generateID('voucherNo'); ?>";
        $('#voucherNo').val(vid);

        $('#accountCode').change(function() {
            var value = $(this).val();
            $('#name').val(value);
            if (value){
                $.post('../api/expenseScript.php', {
                    value
                }, function(data) {
                    if (data != null) {
                        var results = jQuery.parseJSON(data);
                        $('#name').val(results);
                    }
                });
            }
        });
    });
</script>