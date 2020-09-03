<?php
require_once 'byCMkGnmDa3mXlyfgPh/core/init.php';
$staff = new Staff;
$user = new User;
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
    <link rel="stylesheet" href="styles/expenses_form.css">
    <link rel="stylesheet" href="styles/modals.css">
    <link rel="stylesheet" href="styles/footer.css">

    <script src="https://kit.fontawesome.com/d814c57d3c.js" crossorigin="anonymous"></script>
    <!-- for fonts -->
    <script src="https://secure.exportkit.com/cdn/js/ek_googlefonts.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="styles/datepicker.min.css" rel="stylesheet" type="text/css">
    <script src="src/js/datepicker.min.js"></script>
    <!-- Include English language -->
    <script src="src/js/i18n/datepicker.en.js"></script>
</head>

<body onload="sidebarActivelink('appointment')">
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

        <?php include 'sidebar.php';?>

        <div class="main">
            <div class="head">
                <h1 style="text-transform: uppercase;">Appointments</h1>
            </div>
            <div>
                <div class="form-container-wrapper">

                    <div class="form-container">
                        <a>
                            <i class="cl-icon fas fa-times-circle" aria-hidden="true" onclick="show('modal3')"></i>
                        </a>
                        <form class="expenses-form" action="/smartClinicSystem/byCMkGnmDa3mXlyfgPh/appointment_module/appointment_create.php" method="POST">
                            <div>
                                <label for="account">Patient ID</label>
                                <select style="width: 150px;" type="text" name="patientID" id="patientID" required>
                                    <?php $staff->getAllPatientID(); ?>
                                </select>
                            </div>

                            <div>
                                <label for="accountName">Patient Name</label>
                                <input style="width: 380px;" class="inp-wid" type="text" name="patientName" id="patientName" required>
                            </div>

                            <div class="date">
                                <label for="Date">Date</label>
                                <span>
                                    <input style="width: 160px;" type="text" id="mydate" name="date" class="datepicker-here" data-language="en" required>
                                    <i style="position: relative; right: 32px;" class="far fa-calendar-alt" aria-hidden="true"></i>
                                </span>
                            </div>

                            <div>
                                <label for="amount">Time</label>
                                <input style="width: 160px;" id="mytime" type="time" name="time" required>
                            </div>

                            <div>
                                <label for="status">Status</label>
                                <select style="width: 160px;" type="text" name="status" id="" required>
                                    <option value="Awaiting">Awaiting</option>
                                    <option value="Awaiting">Cancelled</option>
                                    <option value="Completed">Completed</option>
                                </select>
                            </div>

                            <div>
                                <label for="account">Doctor ID</label>
                                <select style="width: 160px;" type="text" name="doctorID" id="doctorID" required>
                                    <?php $staff->getAllDoctorID(); ?>
                                </select>
                            </div>

                            <div>
                                <label for="accountName">Doctor Name</label>
                                <input style="width: 380px;" class="inp-wid" type="text" id="doctorName" name="doctorName">
                            </div>

                            <input style="margin-top: 20px;" id="inreg-submit" name="register" type="submit" value="SUBMIT" />
                            <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">

                        </form>
                    </div>

                </div>


            </div>
        </div>

    </div>


    <!-- Backend Scripts goes here by Yeasin -->

    <script>
        $(document).ready(function() {

            let date = new Date();

            $('#mydate').val(date.toLocaleDateString('en-CA'));
            $('#mytime').val((date.getHours() < 10 ? '0' : '') + date.getHours() + ':' + (date.getMinutes() < 10 ? '0' : '') + date.getMinutes());

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

            // getting the patients name from patient ID
            $('#patientID').change(function() {
                var value = $(this).val();
                if (value) {
                    $.post('byCMkGnmDa3mXlyfgPh/api/getPateintInfo.php', {
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

</html>



<script type="text/javascript" src="src/js/layout.js"></script>
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