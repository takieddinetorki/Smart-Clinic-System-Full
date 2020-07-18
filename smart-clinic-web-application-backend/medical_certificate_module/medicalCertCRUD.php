<?php
require_once '../core/init.php';

/**
 * Code Written by: Leong
 * File Name: medicalCertCRUD.php
 * Class Name: -
 * Purpose of the file: CRUD operations for Medical Certificate module
 * Functions included: -
 **/

if (Input::exists()) {
    if (Token::check(Session::get('token'))) {
        $validate = new Validate();
        $validation = $validate->check($_POST, array(
            //no more backend validation
        ));
        if ($validation->passed()) {
            $staff = new Staff();

            try {
                // check URL parameters to see if it's an edit operation
                if (!empty($_GET['action']) && $_GET['action'] == "edit") {
                    // edit operation
                    // url sample: http://localhost/smart_clinic/login/medicalCertCRUD.php?action=edit&id=1002
                    $operation = $staff->editMedCert(Input::get('originalReceiptNo'), array(
                        'receiptNo' => Input::get('receiptNo'),
                        'endingDate' => Input::get('endingDate'),
                        'reason' => Input::get('reason')
                    ));
                    echo $operation;
                } else {
                    // Not an edit operation, therefore it must be a create operation
                    // url sample: http://localhost/smart_clinic/login/medicalCertCRUD.php
                    $operation = $staff->createMedCert(array(
                        'receiptNo' => Input::get('receiptNo'),
                        'startingDate' => Input::get('startingDate'),
                        'endingDate' => Input::get('endingDate'),
                        'reason' => Input::get('reason')
                    ));
                    echo $operation;
                }
            } catch (Exception $th) {
                die($th->getMessage());
            }
        } else {
            foreach ($validation->errors() as $error) {
                echo "{$error} <br>";
            }
        }

        // delete medical certificate
        // $staff->deleteMedCert(Input::get('receiptNo'));
    }
}
?>

<form id="myform" action="" method="POST">
    <input type="text" name="originalReceiptNo" id="originalReceiptNo" hidden>

    <div>
        <label for="receiptNo"><b>Receipt No</b></label>
        <select name="receiptNo" id="receiptNo" required>
            <?php
            $staff = new Staff();
            if (!empty($_GET['action']) && $_GET['action'] == "edit") {
                $data = $staff->getAllReceiptNo();
            } else
                $data = $staff->getAvailableReceiptNo();
            ?>
        </select>
    </div>

    <label for="patientID">Patient ID</label>
    <input type="text" name="patientID" id="patientID" value="<?php echo Input::get('patientID') ?>" readonly required> <br>

    <label for="patientName">Patient Name</label>
    <input type="text" name="patientName" id="patientName" value="<?php echo Input::get('patientName') ?>" readonly required> <br>

    <label for="startingDate">Starting date</label>
    <input type="date" name="startingDate" id="startingDate" value="<?php echo date('Y-m-d'); ?>" required>

    <label for="endingDate">Ending date</label>
    <input type="date" name="endingDate" id="endingDate" value="" required> <br>

    <label for="reason">Reason</label>
    <input type="text" name="reason" id="reason" required> <br>

    <label for="doctorID">Doctor ID</label>
    <input type="text" id="doctorID" value="<?php echo Input::get('doctorID') ?>" readonly required> <label id="doctorName"></label> <br>

    <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
    <input type="submit" class="registerbtn" name="submit" value="Submit">
    </div>
</form>
</body>

<!--To include JQuery library-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }

    // when doc has done loading
    $(document).ready(function() {

        // extract parameters from current URL
        $.urlParam = function(name) {
            var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
            if (results)
                return results[1] || 0;
        }

        // http://localhost/smart_clinic/login/medicalCertCRUD.php?action=edit&id=1002
        var action = $.urlParam('action');
        var id = $.urlParam('id');
        if (action === "edit" && id) {
            $('#startingDate').prop('readonly', true);
            $('#receiptNo').val(id);
            $('#originalReceiptNo').val(id);

            // making an AJAX call to medicalCertSript.php file by passing ID and action type
            $.post('../api/medicalCertScript.php', {
                value: id,
                action
            }, function(data) {

                // return from AJAX call, check if there is any data returned from backend
                if (data != null) {
                    var results = jQuery.parseJSON(data);
                    $('#patientID').val(results.patientID);
                    $('#patientName').val(results.PatientName);
                    $('#startingDate').val(results.startingDate);
                    $('#endingDate').val(results.endingDate);
                    $('#reason').val(results.reason);
                    $('#doctorID').val(results.doctorID);
                    $('#doctorName').text(results.DoctorName);
                }
            });
        }
        // triggered when the value of receipt no in the dropdown list has been changed
        $('#receiptNo').change(function() {
            var value = $(this).val();
            if (!value) {
                // reset form but it is not required now
                // $("#myform")[0].reset();
            } else {

                // if value was changed, make an AJAX call to medicalCertScript.php file by passing "value" as parameter
                $.post('../api/medicalCertScript.php', {
                    value
                }, function(data) {

                    // return from AJAX call 
                    if (data != null) {
                        var results = jQuery.parseJSON(data);
                        $('#patientID').val(results.patientID);
                        $('#patientName').val(results.PatientName);
                        // $('#reason').val("");
                        $('#doctorID').val(results.doctorID);
                        $('#doctorName').text(results.DoctorName);
                    }
                });
            }
        });
    });
</script>