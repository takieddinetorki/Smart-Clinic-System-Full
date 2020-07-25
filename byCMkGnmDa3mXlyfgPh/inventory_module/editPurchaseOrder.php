<?php

require_once '../core/init.php';

/**
 * Code Written by: Mohammad Yeasin
 * File Name: editPuchaseOrder.php
 * Class Name: null
 * Purpose of the file: This file will ensure the edit operations on purchase order
 * Functions included: null
 **/

if (Input::exists()) {
    if (Token::check(Session::get('token'))) {
        try {
        // the table creation is handled by a json request as this module require dynamic order creation
        }catch (Exception $th) {
            die($th->getMessage());
        }
    }
}
?>

<form id="orderCRUD" action="" method="POST" enctype="multipart/form-data">

    <label for="poNo">PO NO</label>
    <input type="text" name="poNo" id="poNo" value="<?php echo Input::get('poNo') ?>" required> <br>

    <br><br>
    <b>Vendor</b> <br>
    <label for="vendorCode">Vendor Code</label>
    <select name="vendorCode" id="vendorCode" required>
    <option value="">--</option>
            <?php
            $staff = new Staff();
            $staff->getAllVendorCodes();
            ?>
        </select><br>

    <label for="vendorName">Name</label>
    <input type="text" name="vendorName" id="vendorName" value="<?php echo Input::get('vendorName') ?>" required> <br>

    <label for="address">Address</label>
    <input type="text" name="address" id="address" value="<?php echo Input::get('address') ?>" required> <br>

    <label for="contactedPerson">contacted Person</label>
    <input type="text" name="contactedPerson" id="contactedPerson" value="<?php echo Input::get('contactedPerson') ?>" required> <br>

    <label for="contactNo">contact No</label>
    <input type="text" name="contactNo" id="contactNo" value="<?php echo Input::get('contactNo') ?>" required> <br>

    <br><br><br>

    <b>Delivery</b> <br>
    <label for="deliveryDate">Delivery Date</label>
    <input type="date" name="deliveryDate" id="deliveryDate" value="<?php echo Input::get('deliveryDate') ?>" required> <br>
    <label for="deliveryAddress">Delivery Address</label>
    <input type="text" name="deliveryAddress" id="deliveryAddress" value="<?php echo Input::get('deliveryAddress') ?>" required> <br>
    <label for="qutotionNo">Qutotion No</label>
    <input type="text" name="qutotionNo" id="qutotionNo" value="<?php echo Input::get('qutotionNo') ?>" required> <br>
    <label for="paymentTerm">Payment Term</label>
    <input type="text" name="paymentTerm" id="paymentTerm" value="<?php echo Input::get('paymentTerm') ?>" required> <br>
    <label for="contactPerson">Contact Person</label>
    <input type="text" name="contactPerson" id="contactPerson" value="<?php echo Input::get('contactPerson') ?>" required> <br>
    <label for="contactNo">Contact No</label>
    <input type="text" name="contactNo" id="contactNo" value="<?php echo Input::get('contactNo') ?>" required> <br>
    <label for="deliveryCharge">Delivery Charge</label>
    <input type="number" name="deliveryCharge" min="0" step=".01" id="deliveryCharge" value="<?php echo Input::get('deliveryCharge') ?>" required> <br>
    <br><br><br>

    <b>Items</b> <br>
    <label for="itemCode">Item Code</label>
    <select name="itemCode" id="itemCode">
    <option value="">--</option>
    <?php
        $staff = new Staff();
        $staff->getAllMedicineCodes();
    ?>
    </select><br>

    <label for="itemName">Name</label>
    <input type="text" name="itemName" id="itemName" value="<?php echo Input::get('itemName') ?>"> <br>
    <label for="description">Description</label>
    <input type="text" name="description" id="description" value="<?php echo Input::get('description') ?>">
    <input type="text" name="descriptionl2" id="descriptionl2" value="<?php echo Input::get('descriptionl2') ?>" > <br>
    <label for="price">Unit Price</label>
    <input type="number" name="price" id="price" min="0" step=".01" value="<?php echo Input::get('price') ?>"> <br>
    <label for="quantity">Quantity</label>
    <input type="number" name="quantity" min="0" id="quantity" value="<?php echo Input::get('quantity') ?>"> <br>
    <p id="addmore">Add More</p>
    <br>
    <b>Listings</> <br>
    <p id="listing"></p>

    <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
    <input type="submit" class="registerbtn" name="submit" value="Submit">
    </div>
</form>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>

    $(document).ready(function() {
        var pon = "<?php $id = new ID(''); echo $id->generateID('purchase'); ?>";
        $('#poNo').val(pon);

        // getting the vendor information
        $('#vendorCode').change(function() {
            var value = $(this).val();
            if (value){
                $.post('../api/vendorCRUD_backupScript.php', {
                    value
                }, function(data) {
                    if (data != null) {
                        var results = jQuery.parseJSON(data);
                        $('#vendorName').val(results.name);
                        $('#address').val(results.address);
                        $('#contactedPerson').val(results.contactedPerson);
                        $('#contactNo').val(results.contactNo);
                    }
                });
            }
        });

        // gettin the medicines name
        $('#itemCode').change(function() {
            var value = $(this).val();
            if (value){
                $.post('../api/medicineCRUD_backupScript.php', {
                    value
                }, function(data) {
                    if (data != null) {
                        var results = jQuery.parseJSON(data);
                        $('#itemName').val(results.name);
                    }
                });
            }
        });

        // adding ordered item to an js object then send it to a script to add the items into the table
        var itemList = [];
        // to calculate the total cost for a purchase 
        let deliveryCost = 0;
        $('#deliveryCharge').change(function(){
        deliveryCost = parseFloat($('#deliveryCharge').val());
        console.log(deliveryCost);
        });
        // to calculate per item cost
        function calculateMedicineCost(price,quantity){ return parseFloat(price) * parseFloat(quantity);}
        let totalMedicineCost = 0;
        $('#addmore').click(function() {
            let item = {
                description: $('#description').val() + $('#descriptionl2').val(),
                price: $('#price').val(),
                quantity: $('#quantity').val(),
                itemCode: $('#itemCode').val(),
                poNo: $('#poNo').val(),
            };
            itemList.push(item);
            totalMedicineCost += calculateMedicineCost($('#price').val(),$('#quantity').val());
            console.log(totalMedicineCost);

            // showing the result 
            $('#listing').text(JSON.stringify(itemList));

            // resetting the fields 
            $('#price').val('');
            $('#quantity').val('');
            $('#description').val('');
            $('#descriptionl2').val('');
            $('#itemCode').val('');
            $('#itemName').val('');
        });


        // upon clicking on the submit button 
        var totalCost = 0;
        $('#orderCRUD').submit(function(event) {

            // adding delivery information to a object 
            var deliveryInfo ={
                date: $('#deliveryDate').val(),
                address: $('#deliveryAddress').val(),
                quotion: $('#qutotionNo').val(),
                paymentTerm: $('#paymentTerm').val(),
                contactPerson: $('#contactPerson').val(),
                contactNo: $('#contactNo').val(),
                deliveryCharge: $('#deliveryCharge').val()
            };
            totalCost = totalMedicineCost + deliveryCost;
            console.log(totalCost);
            let tableData = {
                poNo: $('#poNo').val(),
                vendorCode: $('#vendorCode').val(),
                deliveryInfo: deliveryInfo,
                items: itemList,
                totalCost: totalCost
            };
            event.preventDefault();
            if (tableData != null) {
                tableData = JSON.stringify(tableData);
                console.log(tableData);
                $.post('../api/addPurchaseOrderScript.php', {
                    tableData
                }, function(data,status) {
                    alert('Add Purchase Order' + status);
                    console.log(data);
                });
            }
        });
    });
</script>