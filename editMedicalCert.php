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
    <link rel="stylesheet" href="styles/footer.css">
    <link rel="stylesheet" href="styles/modals.css">
    <link rel="stylesheet" href="styles/medical_form.css" />

    <script src="https://secure.exportkit.com/cdn/js/ek_googlefonts.js"></script>
    <script src="https://kit.fontawesome.com/d814c57d3c.js" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="styles/datepicker.min.css" rel="stylesheet" type="text/css">
    <script src="src/js/datepicker.min.js"></script>
    <!-- Include English language -->
    <script src="src/js/i18n/datepicker.en.js"></script>
</head>

<body onload="sidebarActivelink('medical-cert(PAGE)')">

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

            <div class="head-div">
                <h1>Medical Certificate</h1>
            </div>
            <div class="wrapper table-wrapper-scroll-y wrapper-scr" id="wrap">
                <div class="main-container">
                    <div class="cl-btn" onclick="show('modal3')">
                        <i class="fas fa-times-circle"></i>
                    </div>
                    <div>
                        <form action="/smartClinicSystem/byCMkGnmDa3mXlyfgPh/medical_certificate_module/editMedicalCert.php" method="POST" class="form">
                            <div class="form-div">
                                <label class="form-label" for="receiptNo">Reciept No.</label>
                                <input class="form-inp" type="text" name="receiptNo" id="receiptNo" readonly>
                            </div>
                            <div class="form-div">
                                <label class="form-label" for="patientID">Patient ID</label>
                                <input class="form-inp" type="text" name="patientID" id="patientID" disabled>
                                <i class="fas fa-eye eyeclass"></i>
                            </div>
                            <div class="form-div">
                                <label class="form-label" for="patientName">Patient Name</label>
                                <input class="form-inp  w-BIG" type="text" name="patientName" id="patientName" disabled>
                            </div>
                            <div style="display: flex;">
                                <div class="form-div">
                                    <label class="form-label" for="from">Starting Date</label>
                                    <span>
                                        <input disabled type="text" name="from" id="from" data-date-format="yyyy-mm-dd" class="datepicker-here form-inp" data-language='en'><i class="far fa-calendar-alt"></i>
                                    </span>
                                </div>
                                <div class="form-div" style="padding-right: 20px;padding-left: 10px;">
                                    <label class="form-label" for="to" style="width: 100px;margin-left: 20px;">Ending
                                        Date</label>
                                    <span>
                                        <input type="text" name="to" data-date-format="yyyy-mm-dd" id="to" class="datepicker-here form-inp" data-language='en'><i class="far fa-calendar-alt"></i>
                                    </span>
                                </div>
                            </div>

                            <div class="form-div">
                                <label class="form-label" for="reason">Reason</label>
                                <input class="form-inp w-BIG" type="text" name="reason" id="reason">
                            </div>
                            <div class="form-div">
                                <label class="form-label" for="doctorID">Doctor ID</label>
                                <input class="form-inp" type="text" name="doctorID" id="doctorID" disabled>
                            </div>
                            <div style="text-align: center;">
                                <button class="sub-btn" type="submit">Save</button>
                            </div>
                            <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
                        </form>
                    </div>
                </div>

                <!-- Backend Integration  -->
                <!-- Mohammad Yeasin Al Fahad -->
                <!-- 21/09/2020 -->

                <script>
                    // getting url variabes 
                    function getUrlVars() {
                        var vars = [],
                            hash;
                        var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
                        for (var i = 0; i < hashes.length; i++) {
                            hash = hashes[i].split('=');
                            vars.push(hash[0]);
                            vars[hash[0]] = hash[1];
                        }
                        return vars;
                    }

                    $(document).ready(function() {

                        // getting the reciptNo value
                        let value = getUrlVars()["id"];

                        if (value) {
                            $.post('byCMkGnmDa3mXlyfgPh/api/medicalCertScript.php', {
                                value: value,
                                condition: 'edit'
                            }, function(data) {
                                if (data != null) {
                                    var results = jQuery.parseJSON(data);
                                    if (results.status != 'failed') {
                                        $('#receiptNo').val(results.receiptNo);
                                        $('#patientID').val(results.patientID);
                                        $('#patientName').val(results.name);
                                        $('#from').val(results.startingDate);
                                        $('#to').val(results.endingDate);
                                        $('#reason').val(results.reason);
                                        $('#doctorID').val(results.doctorID);
                                    }
                                }
                            });
                        }


                    });
                </script>

            </div>
            <div class="footer">
                <div class="footer-div">
                    <div class="icons-div">
                        <div class="icons">
                            <img src="src/img/printer.png" alt="printer">
                        </div>
                        <div class="icons">
                            <img src="src/img/rubbish-bin.png" alt="delete" onclick="show('modal2')">
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
            document.getElementById("wrap").classList.toggle("wrapper-scr");
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