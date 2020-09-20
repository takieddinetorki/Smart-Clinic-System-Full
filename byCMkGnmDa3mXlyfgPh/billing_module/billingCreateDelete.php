<?php

require_once '../core/init.php';

/**
 * Code Written by: Mohammad Yeasin
 * File Name: billingCreateDelete.php
 * Class Name: null
 * Purpose of the file: This file will ensure the create and delete operation on billing
 * Functions included: null
 **/

if (Input::exists()) {
    if (Token::check(Session::get('token'))) {
        try {
            $staff = new Staff();
            $id = new ID;
            $bid = $id->generateID('billing');
            // adding a doctor ##validated
            $staff->addBilling(array(
                'billingID' => $bid,
                'date' => Input::get('iDate'),
                'time' => Input::get('iTime'),
                'status' => Input::get('pStatus'),
                'consultation' => Input::get('consultation'),
                'treatment' => Input::get('treatment'),
                'medication' => Input::get('medication'),
                'discount' => Input::get('discount'),
                'totalAmount' => Input::get('totalAmount'),
                'receiptNo' => Input::get('receiptNo'),
            ));

            // deleting a billing ##Validated
            // $staff->deleteBilling('');

        } catch (Exception $th) {
            die($th->getMessage());
        }
    }
}
?>

<form id="billingCRUD" action="" method="POST" enctype="multipart/form-data">

    <label for="receiptNo">Reciept No</label>
    <select name="receiptNo" id="receiptNo" required>
        <option value="">--</option>
        <?php
        $staff = new Staff();
        $staff->getAllReceiptNo();
        ?>
    </select>
<br>
    <label for="patientID">Patient ID</label>
    <input type="text" name="patientID" id="patientID" value="<?php echo Input::get('patientID') ?>" disabled> <br>

    <label for="name">Patient Name</label>
    <input type="text" name="name" id="name" value="<?php echo Input::get('name') ?>" disabled> <br>

    <label for="iDate">Issue Date</label>
    <input type="date" name="iDate" id="iDate" value="<?php echo date('Y-m-d'); ?>"> <br>

    <label for="iTime">Issue Time</label>
    <input type="time" name="iTime" id="iTime" value="<?php echo date('h:i:s'); ?>"> <br>

    <label for="pStatus">Payment Status</label>
    <input type="text" name="pStatus" id="pStatus" value="<?php echo Input::get('pStatus') ?>" required> <br>
    <br><br><br>
    <label for="consultation">Consultation Price</label>
    <input type="number" name="consultation" id="consultation" min="0" step=".01" value="<?php echo Input::get('consultation') ?>" required> <br>

    <label for="treatment">Treatment Price</label>
    <input type="number" name="treatment" id="treatment" min="0" step=".01" value="<?php echo Input::get('treatment') ?>" required> <br>

    <label for="medication">Medication Price</label>
    <input type="number" name="medication" id="medication" min="0" step=".01" value="<?php echo Input::get('medication') ?>"> <br>

    <label for="discount">Discount</label>
    <input type="number" name="discount" id="discount" min="0" step=".01" value="<?php echo Input::get('discount') ?>" required> <br>

    <label for="totalAmount">Total Amount</label>
    <input type="number" name="totalAmount" id="totalAmount" min="0" step=".01" value="<?php echo Input::get('totalAmount') ?>"> <br>


    <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
    <input type="submit" class="registerbtn" name="submit" value="Submit">
    </div>
</form>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {

        $('#pStatus').val('Un-Paid');

        $('#receiptNo').change(function() {
            var value = $(this).val();
            if (value) {
                $.post('../api/createBillingScript.php', {
                    value
                }, function(data) {
                    if (data != null) {
                        var results = jQuery.parseJSON(data);
                        $('#patientID').val(results[0].patientID);
                        $('#medication').val(results[0].medicalCost);
                        $('#name').val(results[1]);
                    }
                });
            }
        });

        var totalAmmount = 0;
        // calcuating the values 
        $('#consultation,#treatment,#medication,#discount').change(function(){
            var consultation = parseFloat($('#consultation').val());
            var treatment = parseFloat($('#treatment').val());
            var medication = parseFloat($('#medication').val());
            var discountRate = parseFloat($('#discount').val());
            discountRate = (discountRate / 100);
            var discount = parseFloat((consultation + treatment + medication) * discountRate);
            totalAmmount = consultation + treatment + medication - discount;
            $('#totalAmount').val(totalAmmount.toFixed(2));
        });

    });
</script>