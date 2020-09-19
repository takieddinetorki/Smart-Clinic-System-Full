<?php
require_once 'byCMkGnmDa3mXlyfgPh/core/init.php';
$staff = new Staff;
$user = new User;
$clinic = new ClinicDB;
$doc = new Doctor;
$id = new ID;
if (!$user->loggedIn()) {
    Redirect::to('index.php');
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Smart Clinic <?php if ($user->loggedIn()) echo deescape($clinic->getClinicInfo('clinicName', 'clinicID', $user->data()->clinicID));
                        else echo " Log in to show clinic" ?></title>
    <link rel="stylesheet" href="styles/layout.css" />
    <link rel="stylesheet" href="styles/diagonistic-template.css">
    <link rel="stylesheet" href="styles/footer.css">
    <link rel="stylesheet" href="styles/modals.css">
    <link rel="stylesheet" href="styles/diagnostic-report.css">
    <link rel="stylesheet" href="styles/diagonstic-form.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- for fonts -->
    <script src="https://secure.exportkit.com/cdn/js/ek_googlefonts.js"></script>
    <script src="https://kit.fontawesome.com/d814c57d3c.js" crossorigin="anonymous"></script>

</head>

<body onresize="resizeDiv()" onload="resizeDiv()" class="table-wrapper-scroll-y">
    <div class="container" id="container">
        <div class="header">
            <img class="logo" src="src/img/heading.png" alt="ClinicCareLogo" />

            <div class="date-time">
                <p id="date"></p>
                <p id="time"></p>
            </div>

            <div class="search-bar">
                <div class="dropdown-box">
                    <input type="text" name="search" autocomplete="off" />
                    <a href="#" class="searching-button"><img class="nav-icon" src="src/img/magnify-glass.svg" alt="" /></a>

                    <div class="searchbar-dropdown">
                        <input type="radio" id="search-by-id" name="src" />
                        <label for="search-by-id">Search by ID</label>
                        <br />
                        <br />
                        <input type="radio" id="search-by-name" name="src" />
                        <label for="search-by-name">Search by Name</label>
                    </div>
                </div>
            </div>

            <div class="nav-images">
                <div class="dropdown-user1">
                    <a href="#" class="nav-logos"><img src="src/img/settings.png" alt="" /></a>
                    <div class="dropdown-content3">
                        <a href="settings(PAGE).php">Settings</a>
                        <a href="report_bug.php">Report Bug</a>
                    </div>
                </div>

                <div class="dropdown-notification">
                    <a href="#" class="nav-logos"><img src="src/img/notification.png" alt="" /></a>
                    <div class="dropdown-content">
                        <a href="#">You have missed an appointment</a>
                        <a href="#">Clear all notification</a>
                    </div>
                </div>

                <div class="dropdown-user">
                    <a href="# " class="nav-logos"><img src="src/img/user.png " alt=" " /></a>
                    <div class="dropdown-content2">
                        <a href="my-profile(PAGE).php">My Profile</a>
                        <a href="#">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <?php include 'sidebar.php'; ?>
        <div class="main">
            <div class="head">
                <h1>DIAGNOSTIC REPORT</h1>
            </div>

            <div class="main-body" id="ad-width">
                <div id="code">
                </div>
                <div class="cl-btn" onclick="show('modal3')">
                    <i class="fas fa-times-circle"></i>
                </div>
                <div id="sliderdiv" class="table-wrapper-scroll-y">
                    <div style="display: flex;min-width: 1035px;max-width: 1035px;">
                        <div class="inDiv">
                            <div>
                                <div class="flex">
                                    <label for="patients" class="label_col" style="min-width: 66px;">Patient ID</label>
                                    <select class="input_diag" type="text" name="patientID" id="patientID" required>
                                        <?php $staff->getAllPatientID(); ?>
                                    </select>
                                    <p id="patientName" class="p_col">---</p>
                                    <i class="fas fa-eye eyeclass"></i>
                                </div>
                                <div class="flex">
                                    <label for="docId" class="label_col">Doctor ID</label>
                                    <input type="text" id="docId" name="docId" class="input_diag" style="margin-left: 23px;">
                                    <p id="doctorName" class="p_col">Dr. Jane Doe</p>
                                </div>
                            </div>
                            <div class="box pageOne" style="height: 396px;    padding: 2px 10px 5px 10px;">
                                <div class="box-title">
                                    Medical Notes
                                </div>
                                <div class="box-content">
                                    <div class="box-div">
                                        <div class="box-div-head">
                                            Body Mass Index
                                        </div>
                                        <div>
                                            <div style="text-align: center; margin-top: 10px;">
                                                Weight
                                                <input type="number" step='0.01' placeholder="50.50" class="diag-form-inp2 calcl" id="wtinp">
                                                <span style="margin-left: 10px;">Kg</span>
                                            </div>
                                            <div style="text-align: center; margin-top: 10px;">
                                                Height
                                                <input type="number" step='0.01' placeholder="23.12" class="diag-form-inp2 calcl" style="margin-left: 27px;" id="htinp">
                                                <span style="margin-left: 10px;">cm</span>
                                            </div>
                                            <div style="text-align: center; margin-top: 10px;">
                                                BMI : <span id="result"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-div">
                                        <div id="lllo" class="box-div-head">
                                            Symptoms
                                        </div>
                                        <div>
                                            <div id="symptomLists" style="height: 90px;padding-top: 6px; padding-bottom: 6px;overflow-y: auto;">
                                            </div>
                                            <div>
                                                <select style="width: 310px;" class="diag-form-inp" type="text" name="symptoms" id="symptoms">
                                                    <option hidden>Select Symptoms</option>
                                                    <?php $doc->getAllSymptoms() ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>


                            <!-- page two view  -->

                            <div class="box pageTwo" style="height: 396px;padding:2px 10px 5px 10px">
                                <div class="box-title">
                                    Prescription
                                </div>
                                <div class="box-content">
                                    <div class="box-div" style="height: 325px;">
                                        <div class="box-div-head">
                                            Drugs
                                        </div>
                                        <div>
                                            <div style="margin-top: 8px;">
                                                <div>
                                                    <input type="text" placeholder="select drug" class="diag-form-inp">
                                                </div>
                                                <div style="height: 40px;margin-top: 5px;overflow-y: auto;">
                                                    <span class="inp-select">
                                                        xxxx<i class="far fa-times-circle"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div style="max-height: 240px;margin-left: 10px; margin-right: 55px;">
                                                <div class="drug-div">
                                                    <div class="drug-label">
                                                        Dosage
                                                    </div>
                                                    <div>
                                                        <input type="text" class="input_diag" style="width: 70px;">
                                                    </div>
                                                </div>
                                                <div class="drug-div">
                                                    <div class="drug-label">
                                                        Frequency
                                                    </div>
                                                    <div>
                                                        <select type="text" class="input_diag" style="width: 170px;">
                                                            <option value="">1 times a day</option>
                                                            <option value="">2 times a day</option>
                                                            <option value="">3 times a day</option>
                                                            <option value="">4 times a day</option>
                                                            <option value="">5 times a day</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="drug-div">
                                                    <div class="drug-label">
                                                        No of days
                                                    </div>
                                                    <div>
                                                        <input type="text" class="input_diag" style="width: 70px;">
                                                    </div>
                                                </div>
                                                <div class="drug-div">
                                                    <div class="drug-label">
                                                        Instruction
                                                    </div>
                                                    <div>
                                                        <select type="text" class="input_diag" style="width: 170px;">
                                                            <option value="">Before Meal</option>
                                                            <option value="">After Meal</option>
                                                            <option value="">When Necessary</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div style="margin-top: 15px;">
                                            <div class="plus-icon">
                                                <i class="fas fa-plus"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <!-- page one view  -->
                        <div class="box inDiv pageOne">
                            <div class="box-title">
                                Diagnosis
                            </div>
                            <div class="box-content">
                                <div class="box-div" style="height: 115px;">
                                    <div class="box-div-head">
                                        Findings
                                    </div>
                                    <div>
                                        <div>
                                            <input type="text" placeholder="text input" class="diag-form-inp">
                                        </div>
                                    </div>
                                </div>
                                <div class="box-div" style="height: 115px;">
                                    <div class="box-div-head">
                                        Advice/Consultions
                                    </div>
                                    <div>
                                        <div>
                                            <input type="text" placeholder="text input" class="diag-form-inp">
                                        </div>
                                    </div>
                                </div>
                                <div class="box-div" style="height: 156px;">
                                    <div id="diag" class="box-div-head">
                                        Diagonisis
                                    </div>
                                    <div>
                                        <div id="diagnosisLists" style="height: 95px;padding-top: 6px; padding-bottom: 6px;overflow-y: auto;">
                                        </div>
                                        <div>
                                            <select style="width: 310px;" class="diag-form-inp" type="text" name="diagnosis" id="diagnosis">
                                                <option hidden>Select Diagnosis</option>
                                                <?php $doc->getAllDiagnosis() ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- page two view  -->
                        <div class="box inDiv pageTwo">
                            <div class="box-title">
                                Listing
                            </div>
                            <div class="box-content table-wrapper-scroll-y" style="overflow-y: scroll;max-height: 430px;">
                                <div class="box-div list-box">
                                    <i class="far fa-times-circle"></i>
                                    <div> Paracetamol</div>
                                    <div> 500 mg</div>
                                    <div> 3 times a day</div>
                                    <div> When necessary</div>
                                    <div> After Meal</div>
                                </div>
                                <div class="box-div list-box">
                                    <i class="far fa-times-circle"></i>
                                    <div> Paracetamol</div>
                                    <div> 500 mg</div>
                                    <div> 3 times a day</div>
                                    <div> When necessary</div>
                                    <div> After Meal</div>
                                </div>
                                <div class="box-div list-box">
                                    <i class="far fa-times-circle"></i>
                                    <div> Paracetamol</div>
                                    <div> 500 mg</div>
                                    <div> 3 times a day</div>
                                    <div> When necessary</div>
                                    <div> After Meal</div>
                                </div>
                                <div class="box-div list-box">
                                    <i class="far fa-times-circle"></i>
                                    <div> Paracetamol</div>
                                    <div> 500 mg</div>
                                    <div> 3 times a day</div>
                                    <div> When necessary</div>
                                    <div> After Meal</div>
                                </div>
                            </div>
                        </div>

                        <!-- page one view  -->
                        <div class="box inDiv pageOne">
                            <div class="box-title">
                                Treatment
                            </div>
                            <div class="box-content">
                                <div class="box-div" style="height: 115px;">
                                    <div id="alr" class="box-div-head">
                                        Allergy
                                    </div>
                                    <div>
                                        <div id="allergyList" style="height: 52px;padding-top: 6px; padding-bottom: 6px;overflow-y: auto;">
                                        </div>
                                        <div>
                                            <select style="width: 310px;" class="diag-form-inp" type="text" name="allergy" id="allergy">
                                                <option hidden>Select Allergies</option>
                                                <?php $doc->getAllAlergies() ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-div" style="height: 115px;">
                                    <div class="box-div-head">
                                        Advice
                                    </div>
                                    <div>
                                        <div>
                                            <input type="text" placeholder="text-input" class="diag-form-inp">
                                        </div>
                                    </div>
                                </div>
                                <div class="box-div" style="height: 156px;">
                                    <div id="treat" class="box-div-head">
                                        Treatment
                                    </div>
                                    <div>
                                        <div id="treatmentList" style="height: 90px;padding-top: 6px; padding-bottom: 6px;overflow-y: auto;">
                                        </div>
                                        <div>
                                            <select style="width: 310px;" class="diag-form-inp" name="treatment" id="treatment">
                                                <option hidden>Select Treatments</option>
                                                <?php $doc->getAllTreatments() ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- page two view  -->
                        <div class="box inDiv pageTwo">
                            <div class="box-title">
                                Attachments
                            </div>
                            <div class="box-content">
                                <div class="box-div" style="height: 411px;">
                                    <div class="box-div-head">
                                        Images/Documents
                                    </div>
                                    <div>
                                        <div class="table-wrapper-scroll-y" style="height: 320px;padding-top: 16px; padding-bottom: 6px;overflow-y: auto;">
                                            <span class="inp-select">
                                                xxxxxxxxxxxxxxxxxxxxxxx<i class="far fa-times-circle"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="plus-icon">
                                            <i class="fas fa-plus"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Backend Integration -->

                <script>
                    $(document).ready(function() {


                        // toggling view 
                        $('.pageTwo').hide();
                        $('#secpage').click(function() {
                            $('.pageOne').hide();
                            $('.pageTwo').show();
                            $(this).css("background-color", "black");
                            $('#firpage').css("background-color", "");
                        });
                        $('#firpage').click(function() {
                            $('.pageOne').show();
                            $('.pageTwo').hide();
                            $(this).css("background-color", "black");
                            $('#secpage').css("background-color", "");
                        });

                        // generating auto id
                        let id = <?php echo json_encode($id->generateID('diagnosis')); ?>;
                        $('#code').append(id);

                        // getting the patients name from patient ID
                        $('#patientID').change(function() {
                            var value = $(this).val();
                            if (value) {
                                $.post('byCMkGnmDa3mXlyfgPh/api/getPateintInfo.php', {
                                    value
                                }, function(data) {
                                    if (data != null) {
                                        var results = jQuery.parseJSON(data);
                                        $('#patientName').text(results.name);
                                    }
                                });

                                $.post('byCMkGnmDa3mXlyfgPh/api/getDoctorInfo.php', {
                                    value
                                }, function(data) {
                                    if (data != null) {
                                        var value = jQuery.parseJSON(data);
                                        $('#docId').val(value);
                                        $.post('byCMkGnmDa3mXlyfgPh/api/createAppointment.php', {
                                            value
                                        }, function(data) {
                                            if (data != null) {
                                                var results = jQuery.parseJSON(data);
                                                $('#doctorName').text(results);
                                            }
                                        });
                                    }
                                });
                            }
                        });
                        // claculating BMI 

                        $('.calcl').change(function() {
                            let weight = $('#wtinp').val();
                            let height = $('#htinp').val();

                            if (weight && height) {
                                $('#result').text(calculateBMI(weight, height));
                            }
                        });

                        function calculateBMI(weight, height) {
                            let bmi = weight / ((height / 100) * (height / 100));

                            if (bmi < 18.5) {
                                return "Underweight";
                            } else if (bmi >= 18.5 && bmi < 25) {
                                return "Normal";
                            } else if (bmi >= 25 && bmi < 30) {
                                return "Overweight";
                            } else {
                                return "Obese";
                            }
                        }


                        // symptomps 
                        let symptomps = [];
                        let notsymptomps = [];
                        $('#symptoms').change(function() {
                            let val = $(this).val();
                            if (!symptomps.includes(val)) {
                                symptomps.push(val);
                                $('#symptomLists').append(
                                    `
                                <span class="inp-select">${val}<i class="far fa-times-circle closeSymptoms"></i></span>
                                `
                                );
                                // closing the symtomps
                                var closebtns = document.getElementsByClassName("closeSymptoms");
                                for (var i = 0; i < closebtns.length; i++) {
                                    closebtns[i].addEventListener("click", function() {
                                        let vv = $(this).parent().text();
                                        notsymptomps.push(vv);
                                        this.parentElement.style.display = 'none';
                                    });
                                }
                            }
                        });

                        // testing purpose
                        $('#lllo').click(function() {
                            // Final Symptoms 
                            let finalSymptoms = symptomps.filter(n => !notsymptomps.includes(n));
                            console.log(finalSymptoms);
                        });


                        // Diagnosis 
                        let diagnosis = [];
                        let notDiagnosis = [];

                        $('#diagnosis').change(function() {
                            let val = $(this).val();
                            if (!diagnosis.includes(val)) {
                                diagnosis.push(val);
                                $('#diagnosisLists').append(
                                    `
                                <span class="inp-select">${val}<i class="far fa-times-circle closeSymptoms"></i></span>
                                `
                                );
                                // closing the symtomps
                                var closebtns = document.getElementsByClassName("closeSymptoms");
                                for (var i = 0; i < closebtns.length; i++) {
                                    closebtns[i].addEventListener("click", function() {
                                        let vv = $(this).parent().text();
                                        notDiagnosis.push(vv);
                                        this.parentElement.style.display = 'none';
                                    });
                                }
                            }
                        });


                        // testing Diagnosis
                        $('#diag').click(function() {
                            // Final Diagnosis 
                            let finalDiagnosis = diagnosis.filter(n => !notDiagnosis.includes(n));
                            console.log(finalDiagnosis);
                        });


                        // Allergy 

                        let allergy = [];
                        let notAllergy = [];

                        $('#allergy').change(function() {
                            let val = $(this).val();
                            if (!allergy.includes(val)) {
                                allergy.push(val);
                                $('#allergyList').append(
                                    `
                                <span class="inp-select">${val}<i class="far fa-times-circle closeSymptoms"></i></span>
                                `
                                );
                                // closing the allergies
                                var closebtns = document.getElementsByClassName("closeSymptoms");
                                for (var i = 0; i < closebtns.length; i++) {
                                    closebtns[i].addEventListener("click", function() {
                                        let vv = $(this).parent().text();
                                        notAllergy.push(vv);
                                        this.parentElement.style.display = 'none';
                                    });
                                }
                            }
                        });

                        // testing Allergies
                        $('#alr').click(function() {
                            // Final Allergies 
                            let finalAllergy = allergy.filter(n => !notAllergy.includes(n));
                            console.log(finalAllergy);
                        });



                        // Treatment 

                        let treatment = [];
                        let notTreatment = [];

                        $('#treatment').change(function() {
                            let val = $(this).val();
                            if (!treatment.includes(val)) {
                                treatment.push(val);
                                $('#treatmentList').append(
                                    `
                                <span class="inp-select">${val}<i class="far fa-times-circle closeSymptoms"></i></span>
                                `
                                );
                                // closing the allergies
                                var closebtns = document.getElementsByClassName("closeSymptoms");
                                for (var i = 0; i < closebtns.length; i++) {
                                    closebtns[i].addEventListener("click", function() {
                                        let vv = $(this).parent().text();
                                        notTreatment.push(vv);
                                        this.parentElement.style.display = 'none';
                                    });
                                }
                            }
                        });

                        // testing Allergies
                        $('#treat').click(function() {
                            // Final Allergies 
                            let finalTreatment = treatment.filter(n => !notTreatment.includes(n));
                            console.log(finalTreatment);
                        });


                    });
                </script>


                <div class="footer">
                    <div class="footer-div">
                        <div class="dots-div">
                            <span id="firpage" class="dot" style="background-color: black;"></span>
                            <span id="secpage" class="dot"></span>

                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <script type="text/javascript">
        function toggleSidebar() {
            document
                .getElementById("container")
                .classList.toggle("container-no-sidebar");
            document.getElementById("toggler").classList.toggle("toggle-icon-placement");
            document.getElementById("sidebar").classList.toggle("small_width");
            var hiddiv = document.getElementsByClassName("small_sidebar");
            for (var i = 0; i < hiddiv.length; i++) {
                hiddiv[i].classList.toggle("hidden_sidebar");
            }
            document.getElementById("ad-width").classList.toggle("widthAdjust");
            var ele = document.getElementsByClassName('modal');
            for (i = 0; i < ele.length; i++) {
                ele[i].classList.toggle("pdl");
                ele[i].classList.toggle("pdl-hide");
            }
        }
    </script>
    <script>
        function resizeDiv() {
            sidebarActivelink('diagnostic(PAGE)');
            var divtemp = document.getElementById("sliderdiv");
            if (divtemp.offsetWidth < 1035) {
                divtemp.style.overflowX = "scroll";

            } else {
                divtemp.style.overflowX = "hidden";
            }
        }

        function wt_htValidator(id, inp) {
            var input = document.getElementById(id);
            input.value = input.value.split(inp).join('');
            if (isNaN(input.value)) {
                alert("Enter number only, in Weight (unit kg) and height field (unit cm)");
                input.value = "";
            } else {
                if (input.value == "") {
                    input.value += "0.0 "
                }
                input.value += inp;
            }
        }
    </script>
    <script>
        // script for modals
        function show(x) {
            document.getElementById(x).style.display = "flex";
        }
        window.onclick = function(event) {
            var ele = document.getElementsByClassName("modal");
            for (var i = 0; i < ele.length; i++) {
                if (event.target == ele[i]) {
                    ele[i].style.display = "none";
                }
            }
        }
    </script>
    <!-- ______________________________________________________________________________________________________________________ -->
    <!-- save modal here -->
    <div id="modal3" class="modal pdl">
        <div class="modal-wrap">
            <div class="modalContent3">
                <form style="margin-top: 7px;">
                    <div style="text-align: center;margin-top: 25px;">
                        <p class="label-modal3">Want to save the changes made?</label>
                            <div class="form-div-modal3">
                                <button class="modalBtn3" type="submit">Yes</button>
                                <button class="modalBtn3" type="submit">No</button>
                            </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- save modal till here -->
</body>

<script src="src/js/layout.js"></script>

</html>