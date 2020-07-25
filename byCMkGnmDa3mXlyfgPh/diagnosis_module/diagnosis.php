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
                // PID2099547
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

    <label for="patientID">Patient ID</label>
    <select name="patientID" id="patientID" required>
    <option value="">---</option>
        <?php
        $staff = new Staff();
        $staff->getAllPatientID();
        ?>
    </select><br>
    <label for="doctorID">Doctor ID</label>
    <input type="text" name="doctorID" id="doctorID" value="<?php echo Input::get('doctorID') ?>" disabled> <br>
    <br><br>
    <label>Medical Notes</label><br>
    <label for="weight">Weight</label>
    <input type="number" name="weight" id="weight" value="<?php echo Input::get('weight') ?>" required> <br>
    <label for="height">Height</label>
    <input type="number" name="height" id="height" value="<?php echo Input::get('height') ?>" required> <br>
    <label>BMI : </label>
    <p id="bmi"></p>

    <label for="symptoms">Symptoms</label>
    <select name="symptoms" id="symptoms" required>
    <option value="">---</option>
        <?php
        $staff = new Doctor();
        $staff->getAllSymptoms();
        ?>
    </select>

    <p id="list-symptoms">none</p>

    <label>Diagnosis</label>
    <br><br>
    <label for="findings">Findings</label>
    <input type="text" name="findings" id="findings" value="<?php echo Input::get('findings') ?>"> <br>
    <label for="advice">Advice</label>
    <input type="text" name="advice" id="advice" value="<?php echo Input::get('advice') ?>"> <br>

    <label for="diagnosis">Diagnosis</label>
    <select name="diagnosis" id="diagnosis" required>
    <option value="">---</option>
        <?php
        $staff = new Doctor();
        $staff->getAllDiagnosis();
        ?>
    </select>

    <p id="list-diagnosis">none</p>


    <label>Treatment</label>
    <br><br>
    <label for="allergy">Allergy</label>
    <select name="allergy" id="allergy" required>
    <option value="">---</option>
        <?php
        $staff = new Doctor();
        $staff->getAllAlergies();
        ?>
    </select>

    <p id="list-allergy">none</p>
    <br>
    <label for="advice-treatment">Advice</label>
    <input type="text" name="advice-treatment" id="advice-treatment" value="<?php echo Input::get('advice-treatment') ?>"> <br>
    <label for="treatment">Treatment</label>
    <select name="treatment" id="treatment" required>
    <option value="">---</option>
        <?php
        $staff = new Doctor();
        $staff->getAllTreatments();
        ?>
    </select>

    <p id="list-treatment">none</p>

    <br><br>
    <label for="prescription">Prescription</label>
    <select name="prescription" id="prescription" required>
    <option value="">---</option>
        <?php
        $staff = new Doctor();
        $staff->getAllMedicines();
        ?>
    </select>

    <label for="dosage">Dosage</label>
    <input type="text" name="dosage" id="dosage" value="<?php echo Input::get('dosage') ?>"> <br>

    <label for="frequency">Frequency</label>
    <input type="text" name="frequency" id="frequency" value="<?php echo Input::get('frequency') ?>"> <br>

    <label for="days">Days</label>
    <input type="text" name="days" id="days" value="<?php echo Input::get('days') ?>"> <br>

    <label for="instructions">Instructions</label>
    <input type="text" name="instructions" id="instructions" value="<?php echo Input::get('instructions') ?>"> <br>

    <p id="addmore">Add more</p>

    <p id="list-prescription">none</p>

    <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">

    <button>submit</button>

</form>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
    $(document).ready(() => {
        //these arraays will hold the multimple values of each sections, refer to the gui for further clarification
        var symptomsArray = [];
        var diagnosisArray = [];
        var allergyArray = [];
        var treatmentArray = [];
        var medicinesList = [];

        //Medical Note Section
        $('#symptoms').change(function() {
            var value = $(this).val();
            //it will add all the selected symptoms from the dropdown menu
            symptomsArray.push(value);
            $('#list-symptoms').text(symptomsArray);
        });
        //helper data -> helps to build the actual data

        // console.log(JSON.stringify(medicalNote));

        //  Diagnosis section
        $('#diagnosis').change(function() {
            var value = $(this).val();
            //it will add all the selected diagnosis from the dropdown menu
            diagnosisArray.push(value);
            $('#list-diagnosis').text(diagnosisArray);
        });
        //helper data -> helps to build the actual data



        //  Treatment Section
        $('#allergy').change(function() {
            var value = $(this).val();
            //it will add all the selected allergies from the dropdown menu
            allergyArray.push(value);
            $('#list-allergy').text(allergyArray);
        });
        $('#treatment').change(function() {
            var value = $(this).val();
            //it will add all the selected treatments from the dropdown menu
            treatmentArray.push(value);
            $('#list-treatment').text(treatmentArray);
        });

        //  helper data -> helps to build the actual data



        //  Medicine Section
        $('#addmore').click(function() {
            let medicine = {
                name: $('#prescription').val(),
                dosage: $('#dosage').val(),
                frequency: $('#frequency').val(),
                days: $('#days').val(),
                instructions: $('#instructions').val()
            };
            medicinesList.push(medicine);
            $('#list-prescription').text(JSON.stringify(medicinesList));
            $('#dosage').val('');
            $('#frequency').val('');
            $('#days').val('');
            $('#instructions').val('');
        });

        // Actual Data 


        //calculating bmi 
        let resultBMI;
        function calculateBMI(weight, height) {
            weight = parseFloat(weight);
            height = parseFloat(height);
            resultBMI = weight / Math.pow(height, 2);
            resultBMI = Math.round(resultBMI * 100) / 100;
            if (resultBMI < 18.5) return 'Underweight';
            else if (resultBMI >= 18.5 && resultBMI < 25) return 'Normal';
            else if (resultBMI >= 25 && resultBMI < 30) return 'Overweight';
            else if (resultBMI >= 30) return 'Obese';
        }

        //if any of the value changes either weight or height the bmi will recalculate
        $('#weight').change(function() {
            if ($('#height').val() != null)
                $('#bmi').text(calculateBMI($('#weight').val(), $('#height').val()));
        });
        $('#height').change(function() {
            if ($('#weight').val() != null)
                $('#bmi').text(calculateBMI($('#weight').val(), $('#height').val()));
        });

        //getting the doctor ID of any particular patients
        $('#patientID').change(function() {
            var value = $(this).val();
            if (value != null) {
                $.post(
                    '../api/getDoctorInfo.php', {
                        value
                    },
                    function(data) {
                        if (data != null) $('#doctorID').val(jQuery.parseJSON(data));
                    }
                );
            }
        });

        $('#myform').submit(function(event) {
            let medicalNote = {
                result: resultBMI,
                bmi: calculateBMI($('#weight').val(), $('#height').val()),
                symptoms: symptomsArray
            };
            let diagnosis = {
                finding: $('#findings').val(),
                advice: $('#advice').val(),
                diaglist: diagnosisArray
            };
            let treatment = {
                allergy: allergyArray,
                advice: $('#advice-treatment').val(),
                treatment: treatmentArray
            };
            let actualData = {
                id: $('#patientID').val(),
                doctorID: $('#doctorID').val(),
                medicalNotes: medicalNote,
                diagnosis: diagnosis,
                treatments: treatment,
                medicines: medicinesList
            };
            event.preventDefault();
            if (actualData != null) {
                actualData = JSON.stringify(actualData);
                console.log(actualData);
                $.post('../api/diagnosisScript.php', {
                    actualData
                }, function(data,status) {
                    alert(data);
                });
            }
        });
    });
</script>
