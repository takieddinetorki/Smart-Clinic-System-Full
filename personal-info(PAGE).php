<?php
require_once 'byCMkGnmDa3mXlyfgPh/core/init.php';
$staff = new Staff;
$user = new User;
$id = new ID;
$clinic = new ClinicDB;
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
    <link rel="stylesheet" href="styles/footer.css" />
    <link rel="stylesheet" href="styles/modals.css" />
    <link rel="stylesheet" href="styles/personal-info2.css" />
    <!-- Yash fix here -->
    <!-- <link rel="stylesheet" href="styles/medical-history.css" /> -->
    <script src="https://secure.exportkit.com/cdn/js/ek_googlefonts.js"></script>
    <script src="https://kit.fontawesome.com/d814c57d3c.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="styles/datepicker.min.css" rel="stylesheet" type="text/css">
    <script src="src/js/datepicker.min.js"></script>
    <!-- Include English language -->
    <script src="src/js/i18n/datepicker.en.js"></script>

</head>

<body onload="sidebarActivelink('patients(PAGE)')">

    <div class="container" id="container">
        <div class="header">
            <img class="logo" src="src/img/heading.png" alt="ClinicCareLogo" />

            <div class="date-time">
                <p id="date"></p>
                <p id="time"></p>
            </div>

            <div class="nav-images">
                <a href="#" class="nav-logos"><img src="src/img/settings.png" alt="" /></a>

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
                        <a href="#">My Profile</a>
                        <a href="#">Logout</a>
                    </div>
                </div>
            </div>
        </div>


        <?php include 'sidebar.php'; ?>

        <div class="main">
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
            <!-- delete modal here -->
            <div id="modal2" class="modal pdl">
                <div class="modal-wrap">
                    <div class="modalContent2">
                        <form style="margin-top: 7px;">
                            <div style="text-align: center;margin-top: 25px;">
                                <p class="label-modal2">Are you sure to delete?</label>
                                    <div class="form-div-modal2">
                                        <button class="modalBtn2" type="submit">Yes</button>
                                        <button class="modalBtn2" type="submit">No</button>
                                    </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- delete modal till here -->

            <form action="/smartClinicSystem/byCMkGnmDa3mXlyfgPh/patient_module/createPatient.php" enctype="multipart/form-data" method="POST">
                <div class="main-body pageOne">
                    <div class="head">
                        <h1>PERSONAL INFORMATION</h1>
                    </div>
                    <div class="cl-btn" onclick="show('modal3')">
                        <i class="fas fa-times-circle"></i>
                    </div>
                    <div class="scroll-class table-wrapper-scroll-y">
                        <div class="personal-form">
                            <div class="box1">
                                <div class="form-part1">
                                    <div class="form-row" style="margin-top:10px;">
                                        <label class="patient-id-label">Patient ID</label>
                                        <input type="text" class="patient-id" name="patientID" id="patientID" readonly>

                                        <label class="passport-no-label" style="width:80px;text-align:center;padding-top:0px;">NRIC/<br>Passport</label>
                                        <input type="text" class="passport-no" name="NRIC" id="NRIC">

                                        <label style="width:80px;text-align:center" class="dob-label">D.O.B</label>
                                        <input type="text" name="dob" placeholder="YYYY-MM-DD" style="text-align: center;padding: 0;" data-date-format="yyyy-mm-dd" onfocusout="calcAge('dob-input','age-input')" class="dob datepicker-here" data-language='en' id="dob-input">

                                        <label class="age-label" style="width:70px;text-align:center">Age</label>
                                        <input type="number" name="age" class="age" id="age-input">
                                    </div>
                                    <div class="form-row">
                                        <label class="patient-name-label">Name</label>
                                        <input type="text" class="patient-name" name="name" id="name">

                                    </div>
                                    <div class="form-row">
                                        <label class="address-label">Address</label>
                                        <input type="text" class="address" name="addressA" id="addressA">

                                    </div>
                                    <div class="form-row">
                                        <label class="address-label"></label>
                                        <input type="text" class="address" name="addressB" id="addressB">
                                    </div>
                                </div>
                                <div class="photo-part">
                                    <div class="photo-input">
                                        <img id="blah" style="width:100%;height:100%;" src="src/img/photo.png" alt="" />
                                        <input type="file" style="width:100%;height:100%;transform: translateY(-180px);background:rgba(0, 0, 255, 0.397);opacity:0" name="file" onchange="readURL(this);" id="file-inputs" />
                                    </div>
                                </div>
                            </div>
                            <div class="box2">
                                <div class="form-row" style="margin-bottom:12px;">
                                    <label class="gender-label">Gender</label>

                                    <input type="radio" id="gender" name="gender" value="male" style="margin-top:8px;color:black;" />
                                    <label for="male" style="width:60px;">Male</label>

                                    <input type="radio" name="gender" value="female" style="margin-top:8px;color:black;" />
                                    <label for="female" style="width:60px;">Female</label>

                                    <label for="race" style="width:60px;text-align:right;padding-right:5px;" c>Race</label>
                                    <select name="race" class="race" style="text-align:center;" id="race">
                                        <option value="c">C</option>
                                        <option value="m">M</option>
                                        <option value="t">T</option>
                                        <option value="i">I</option>
                                        <option value="o">O</option>
                                    </select>

                                    <label for="nationality" style="width:100px;text-align:right;padding-right:5px;">National</label>
                                    <select name="nationality" class="nationality" style="width: 100px;" id="nationality">
                                        <?php include 'countries.php'; ?>
                                    </select>

                                    <label for="maritalStatus" style="width:110px;text-align:right;padding-right:5px;">Marital
                                        Status</label>
                                    <input type="radio" name="maritalStatus" value="single" id="ms_single" oninput="hideSingle()" style="margin-top:8px;color:black;" />

                                    <label for="single" style="width:50px;">Single</label>
                                    <input type="radio" name="maritalStatus" value="married" oninput="hideSingle()" style="margin-top:8px;color:black;" />
                                    <label for="married" style="width:50px;">Married</label>
                                </div>

                                <div class="form-row">
                                    <label for="mobileNo">Mobile No</label>
                                    <input type="text" name="mobileNo" class="mobile-no" id="mobileNo" onchange="changedinput1()" />
                                    <label for="spouseName" style="width:80px;padding-left:25px;padding-top:0px;margin-right:15px;" id="spouse-label">Spouse Name</label>
                                    <input type="text" id="spouse-input" class="spouse-name" name="spouse-input">
                                </div>
                                <div class="form-row">
                                    <label for="emergencyContactName" style="padding-top:0px;transform: translateY(-1.5vh);">Emergency<br>Contact<br>Name</label>
                                    <input type="text" name="emergencyContactName" class="emergency-name" id="emergencyContactName" />
                                    <label for="emergency-no" style="width:80px;padding-left:25px;padding-top:0px;margin-right:15px;">Emergency
                                        Contact No</label>
                                    <div class="cell-bottom1">
                                        <input type="text" name="emergencyContact" class="emergency-no" id="emergencyContact" onchange="changedinput2()" />
                                        <label for="relationship" style="width:30%;text-align:center;">Relationship</label>
                                        <select name="relationship" id="relationship" class="relationship">
                                            <option value="father">Father</option>
                                            <option value="mother">Mother</option>
                                            <option value="Spouse">Spouse</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-bottom:5px;">
                                    <label for="doc-id">Doctor ID</label>
                                    <select style="width:180px" class="diag-form-inp" name="doctorID" id="doctorID">
                                        <option hidden>Select Doctor</option>
                                        <?php $staff->getAllDoctorID(); ?>
                                    </select>
                                    <label for="doctor" style="width:80px;padding-left:25px;padding-top:0px;margin-right:10px;margin-left:45px;">Doctor Name</label>
                                    <input type="text" class="doctor" name="doctorName" id="doctorName" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="footer" style="margin-top:0">
                        <div class="footer-div">
                            <div class="dots-div">
                                <span id="" class="dot firpage" style="background-color: black;" onclick="changeCSS('styles/personal-info2.css',3)"></span>
                                <span id="" class="dot secpage" onclick="changeCSS('styles/medical-history.css',3)"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Inserting page two here  -->

                <div class="main-body pageTwo">
                    <div class="head">
                        <h1>MEDICAL HISTORY</h1>
                    </div>
                    <div class="cl-btn" onclick="show('modal3')">
                        <i class="fas fa-times-circle"></i>
                    </div>
                    <div class="scroll-class  table-wrapper-scroll-y">
                        <div class="hist-form">
                            <div class="form-row">
                                <label class="issues-col">Illness</label>
                                <input type="checkbox" id="diabetes" name="Diabetes" value="Diabetes" class="disease-option" />
                                <label for="diabetes" class="diseases">Diabetes</label>
                                <input type="checkbox" id="heartPatient" name="heartPatient" value="Heart Patient" class="disease-option" />
                                <label for="Heart Patient" class="diseases" style="width:110px;">Heart Patient</label>
                                <input type="checkbox" id="migrane" name="Migraine" value="Migraine" class="disease-option" />
                                <label for="Migraine" class="diseases">Migraine</label>
                                <input type="checkbox" id="bloodPressure" name="bloodPressure" value="Blood Pressure" class="disease-option" />
                                <label for="Blood Pressure" class="diseases" style="width:120px;">Blood Pressure</label>
                            </div>
                            <div class="form-row">
                                <label class="issues-col"></label>
                                <input type="checkbox" id="lung" name="Lungs" value="Lungs" class="disease-option" />
                                <label for="Lungs" class="diseases">Lungs</label>
                                <input type="checkbox" id="tuber" name="Tubercolosis" value="Tubercolosis" class="disease-option" />
                                <label for="Tubercolosis" class="diseases" style="width:110px;">Tubercolosis</label>
                                <input type="checkbox" name="illnessOthers" id="illnessOthers" class="disease-option" />
                                <label for="Others" class="diseases" style="width:60px;">Others</label>
                                <input type="text" class="detail1" name="illnessText" id="illnessText" style="margin-left:5px;" disabled>
                            </div>
                            <div class="form-row">
                                <label class="issues-col">Smoking</label>
                                <input type="radio" name="smoking" value="Never" class="disease-option" />
                                <label for="diabetes" class="diseases">Never</label>
                                <input type="radio" name="smoking" value="Occational" class="disease-option" />
                                <label for="diabetes" class="diseases" style="width:110px;">Occational</label>
                                <input type="radio" name="smoking" value="Habitual" class="disease-option" />
                                <label for="diabetes" class="diseases">Habitual</label>
                            </div>
                            <div class="form-row">
                                <label class="issues-col">Drinking</label>
                                <input type="radio" name="drink" value="Never" class="disease-option" />
                                <label for="diabetes" class="diseases">Never</label>
                                <input type="radio" name="drink" value="Occational" class="disease-option" />
                                <label for="diabetes" class="diseases" style="width:110px;">Occational</label>
                                <input type="radio" name="drink" value="Habitual" class="disease-option" />
                                <label for="diabetes" class="diseases">Habitual</label>
                            </div>
                            <div class="form-row">
                                <label class="issues-col">Tobacco</label>
                                <input type="radio" name="tobacco" value="Never" class="disease-option" />
                                <label for="diabetes" class="diseases">Never</label>
                                <input type="radio" name="tobacco" value="Occational" class="disease-option" />
                                <label for="diabetes" class="diseases" style="width:110px;">Occational</label>
                                <input type="radio" name="tobacco" value="Habitual" class="disease-option" />
                                <label for="diabetes" class="diseases">Habitual</label>
                            </div>
                            <div class="form-row">
                                <label class="issues-col"></label>
                                <input type="checkbox" name="othersHabit" id="othersHabit" class="allergy-option" />
                                <label for="diabetes" class="allergies">Others</label>
                                <input type="text" name="othersHabitText" id="othersHabitText" class="detail1" disabled>
                            </div>
                            <div class="form-row">
                                <label class="issues-col">Allergies</label>
                                <input type="checkbox" name="foodAllergies" id="foodAllergies" class="allergy-option" />
                                <label for="diabetes" class="allergies">Food</label>
                                <input type="text" name="foodAllergiesText" id="foodAllergiesText" class="detail2" disabled>
                            </div>
                            <div class="form-row">
                                <label class="issues-col"></label>
                                <input type="checkbox" id="drugAllergies" name="drugAllergies" class="allergy-option" />
                                <label for="diabetes" class="allergies">Drug</label>
                                <input type="text" name="drugAllergiesText" id="drugAllergiesText" class="detail2" disabled>
                            </div>
                            <div class="form-row">
                                <label class="issues-col"></label>
                                <input type="checkbox" id="otherAllergies" name="otherAllergies" class="allergy-option" />
                                <label for="diabetes" class="allergies">Others</label>
                                <input type="text" name="otherAllergiesText" id="otherAllergiesText" class="detail2" disabled>
                            </div>
                        </div>

                    </div>
                    <div class="footer" style="margin-top:0">
                        <div class="footer-div">
                            <div class="dots-div">
                                <span id="" class="dot firpage"  onclick="changeCSS('styles/personal-info2.css',3)"></span>
                                <span id="" class="dot secpage" style="background-color: black;" onclick="changeCSS('styles/medical-history.css',3)"></span>
                            </div>
                            <div class="icons-div">
                                <div class="icons">
                                    <input type="image" src="src/img/save-file-option.png" alt="save" style="margin-top: 12px;">
                                    <!-- <img src="src/img/save-file-option.png" alt="save"> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Page two ends here  -->
                <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
            </form>
        </div>
    </div>

    <!-- Backend Integration -->
    <!-- Mohammad Yeasin Al Fahad -->
    <!-- 26/09/2020 -->
    <script>
        $(document).ready(function() {
            // toggling view 
            $('.pageTwo').hide();
            $('.secpage').click(function() {
                $('.pageOne').hide();
                $('.pageTwo').show();
            });
            $('.firpage').click(function() {
                $('.pageOne').show();
                $('.pageTwo').hide();
            });


            // generartintg patient ID
            let id = <?php echo json_encode($id->generateID('patient')); ?>;
            $('#patientID').val(id);

            // getting the doctor name from doctor ID
            $('#doctorID').change(function() {
                var value = $(this).val();
                if (value) {
                    $.post('byCMkGnmDa3mXlyfgPh/api/createAppointment.php', {
                        value
                    }, function(data) {
                        if (data != null) {
                            var results = jQuery.parseJSON(data);
                            $('#doctorName').val(results);
                        }
                    });
                }
            });

            $('#illnessOthers').change(function() {
                if ($('#illnessOthers').is(':checked')) $('#illnessText').prop('disabled', false);
                else $('#illnessText').prop('disabled', true);
            });

            $('#othersHabit').change(function() {
                if ($('#othersHabit').is(':checked')) $('#othersHabitText').prop('disabled', false);
                else $('#othersHabitText').prop('disabled', true);
            });

            $('#foodAllergies').change(function() {
                if ($('#foodAllergies').is(':checked')) $('#foodAllergiesText').prop('disabled', false);
                else $('#foodAllergiesText').prop('disabled', true);
            });

            $('#drugAllergies').change(function() {
                if ($('#drugAllergies').is(':checked')) $('#drugAllergiesText').prop('disabled', false);
                else $('#drugAllergiesText').prop('disabled', true);
            });

            $('#otherAllergies').change(function() {
                if ($('#otherAllergies').is(':checked')) $('#otherAllergiesText').prop('disabled', false);
                else $('#otherAllergiesText').prop('disabled', true);
            });
        });
    </script>


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
            var ele = document.getElementsByClassName('modal');
            for (i = 0; i < ele.length; i++) {
                ele[i].classList.toggle("pdl");
                ele[i].classList.toggle("pdl-hide");
            }
        }
    </script>
    <script>
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
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {

                // image validation 
                let name = input.files[0].name;
                console.log(name);
                let ext = name.split('.').pop().toLowerCase();
                if (jQuery.inArray(ext, ['png', 'jpg', 'jpeg']) == -1) {
                    return alert("Invalid Image File");
                } else {
                    var fsize = input.files[0].size || input.files[0].fileSize;
                    if (fsize > 2000000) return alert("Image File Size is very big");
                    else {
                        var reader = new FileReader();

                        reader.onload = function(e) {
                            $('#blah')
                                .attr('src', e.target.result);
                        };

                        reader.readAsDataURL(input.files[0]);
                    }
                }
            }
        }

        function changeCSS(cssFile, cssLinkIndex) {
            console.log("CSS NEW : "+cssFile);
            var oldlink = document.getElementsByTagName("link").item(cssLinkIndex);

            var newlink = document.createElement("link");
            newlink.setAttribute("rel", "stylesheet");
            newlink.setAttribute("type", "text/css");
            newlink.setAttribute("href", cssFile);
            document.getElementsByTagName("head").item(0).replaceChild(newlink, oldlink);
        }
    </script>

    <script src="src/js/layout.js"></script>
    <script src="src/js/personal-info.js"></script>
</body>

</html>