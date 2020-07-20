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
            $id = new ID('AID');
            $aid = $id->generate();
            try {
                $staff->makeAppointment(array(
                    'appointmentID' => $aid,
                    'date' => Input::get('date'),
                    'time' => Input::get('time'),
                    'status' => (Input::get('status')),
                    'patientID' => Input::get('patientID'),
                    'doctorID' => Input::get('doctorID')
                ));
                echo "Appointment Created Successfully";

                //    $staff->deleteAppointment(Input::get('appointmentID'));
                //    echo "deleted Successfully";
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




<form action="" method="POST">
    <label for="patientID">Patient ID</label>
    <select name="patientID" id="patientID" required>
        <?php
        $staff = new Staff();
        $staff->getAllPatientID();
        ?>
    </select>
    <br>
    <label for="patientName">Patient Name</label>
    <input type="text" name="patientName" id="patientName" value="<?php echo deescape(Input::get('patientName')) ?>"> <br>

    <label for="date">Date</label>
    <input type="date" name="date" id="" value="<?php echo deescape(Input::get('date')) ?>"> <br>

    <label for="time">Time</label>
    <input type="time" name="time" id="" value="<?php echo deescape(Input::get('time')) ?>"> <br>

    <label for="doctorID">Doctor ID</label>
    <select name="doctorID" id="doctorID" required>
        <?php
        $staff = new Staff();
        $staff->getAllDoctorID();
        ?>
    </select>
    <br>
    <label for="doctorName">Doctor Name</label>
    <input type="text" name="doctorName" id="doctorName" value="<?php ?>"> <br>

    <label for="status">Status</label>
    <select name="status" id="">
        <option value="Awaiting">Awaiting</option>
        <option value="Completed">Completed</option>
    </select>
    <br>
    <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
    <input type="submit" class="registerbtn" value="Submit">
</form>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {

        // getting the doctor name from doctor ID
        $('#doctorID').change(function() {
            var value = $(this).val();
            if (value){
                $.post('../api/createAppointment.php', {
                    value
                }, function(data) {
                    if (data != null) {
                        var results = jQuery.parseJSON(data);
                        $('#doctorName').val(results);
                    }
                });
            }
        });

        // getting the patients name from patient ID
        $('#patientID').change(function() {
            var value = $(this).val();
            if (value){
                $.post('../api/getPateintInfo.php', {
                    value
                }, function(data) {
                    if (data != null) {
                        var results = jQuery.parseJSON(data);
                        $('#patientName').val(results.name);
                    }
                });
            }
        });

    });
</script>