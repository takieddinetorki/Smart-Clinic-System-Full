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
    <link rel="stylesheet" href="styles/appointment.css">
    <link rel="stylesheet" href="styles/footer.css">
    <link rel="stylesheet" href="styles/modals.css">



    <script src="https://kit.fontawesome.com/d814c57d3c.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- for fonts -->
    <script src="https://secure.exportkit.com/cdn/js/ek_googlefonts.js"></script>
    <link href="styles/datepicker.min.css" rel="stylesheet" type="text/css">
    <script src="src/js/datepicker.min.js"></script>
    <!-- Include English language -->
    <script src="src/js/i18n/datepicker.en.js"></script>
</head>



<body>
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

        <div class="sidebar" id="sidebar">
            <div class="toggle-btn" id="toggler" onclick="toggleSidebar()">
                <a href="" onclick=" return false">
                    <img src="src/img/resize.svg" alt="">
                </a>
            </div>
            <a href="dashboard(PAGE).php"><img src="src/img/home.png" />
                <div class="small_sidebar">Dashboard</div>
            </a>
            <a href="patients(PAGE).php"><img src="src/img/patient.svg" />
                <div class="small_sidebar">Patients</div>
            </a>
            <a href="appointment.php" class="nav-active"><img src="src/img/appointment-icon.svg" alt="" />
                <div class="small_sidebar">Appointments</div>
            </a>
            <a href="diagnostic(PAGE).php"><img src="src/img/diagnostic.svg" alt="" />
                <div class="small_sidebar"> Diagnostic Report</div>
            </a>
            <a href="billing(PAGE).php"><img src="src/img/finance.svg" alt="" />
                <div class="small_sidebar">Billing</div>
            </a>
            <a href="expenses(PAGE).php"><img src="src/img/prescription.svg" alt="" />
                <div class="small_sidebar">Expenses</div>
            </a>
            <a href="inventory (PAGE).php"><img src="src/img/inventory.svg" alt="" />
                <div class="small_sidebar">Inventory</div>
            </a>
            <a href="medical-cert(PAGE).php"><img src="src/img/mc.svg" alt="" />
                <div class="small_sidebar">Medical Certificate</div>
            </a>
            <a href="financial-report(PAGE).php"><img src="src/img/cash.svg" alt="" />
                <div class="small_sidebar">Finance Reports</div>
            </a>
            <a href="backup.php"><img src="src/img/settings-tools.svg" alt="" />
                <div class="small_sidebar">Backup & Table Setup</div>
            </a>
        </div>

        <div class="main">
            <div class="head">
                <h1 style="text-transform: uppercase;">Appointments</h1>
            </div>

            <div style="width:100%; max-width:824px;" id="widthAdjust" class="table-wrapper-scroll-y">
                <div style="display:flex; max-width: 600px;">
                    <div class="card calender-wrapper d-grid">
                        <div class="form-inline chead">
                            <button id="previous" onclick="previous()">&#60;</button>
                            <h2 style="white-space: nowrap;" class="card-header" id="monthAndYear" data-language='en' data-min-view="months" data-view="months" data-date-format="MM yyyy"></h2>
                            <button id="next" onclick="next()">&#62;</button>
                        </div>
                        <table class=" table table-bordered ">
                            <thead>
                                <tr>
                                    <th>Sun</th>
                                    <th>Mon</th>
                                    <th>Tue</th>
                                    <th>Wed</th>
                                    <th>Thu</th>
                                    <th>Fri</th>
                                    <th>Sat</th>
                                </tr>
                            </thead>
                            <tbody id="calendar-body">
                            </tbody>
                        </table>
                    </div>

                    <div class="tabl">
                        <div class="table-nav">
                            <div class="flex">
                                <div class="flex">
                                    <div class="status" id="dpdwn1">
                                        <label for="status">Show</label>
                                        <select name="status" class="status_dpdwn" id="status">
                                            <option value="Today">Today</option>
                                            <option value="This week">This week</option>
                                            <option value="This month">This month</option>
                                        </select>
                                    </div>
                                    <div class="status">
                                        <label for="show">Status</label>
                                        <select name="show" class="status_dpdwn status_dpdwn2" id="show">
                                            <option value="Awaiting">Awaiting</option>
                                            <option value="Completed">Completed</option>
                                            <option value="Cancelled">Cancelled</option>
                                        </select>
                                    </div>
                                </div>
                                <div>
                                    <div>
                                        <label for="from">From</label>
                                        <span>
                                            <input style="width: 130px;" type="date" id="datefrom">
                                            <i class="far fa-calendar-alt"></i> </span>
                                    </div>
                                    <div style="margin-top: 10px;">
                                        <label for="to">To</label>
                                        <span style="margin-left: 17px;">
                                            <input style="width: 130px;" type="date" id="dateto">
                                            <i class="far fa-calendar-alt"></i> </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-wrapper-scroll-y" id="listAllAppointment" style="overflow-y: hidden;"></div>
                    </div>

                </div>

            </div>
            <div style="width: auto; align-self: flex-end;" class="footer">
                <div class="footer-div">
                    <div class="icons-div">
                        <div class="icons">
                        <a style="color: rgb(68,66,66);" href="./appointment_form.php"><i class="fas fa-plus"></i></a>
                        </div>
                        <div class="icons">
                            <i class="fas fa-file-alt"></i>
                        </div>
                        <div class="icons" onclick="show('modal5')">
                            <img src="src/img/printer.png" alt="printer">
                        </div>

                    </div>
                </div>
            </div>


            <!-- Backend Scripts goes here by Yeasin -->

            <script>
                // this function will populate the screen with appointments and the rawData simply means the json data from backend
                function populateAppointemnts(rawData) {
                    let days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
                    let appointments = `<div class="table" style="min-width: 390px;">
                                <div style="height: 350px;" class="table-wrapper-scroll-y">`;

                    function tConv24(time24) {
                        var ts = time24;
                        var H = +ts.substr(0, 2);
                        var h = (H % 12) || 12;
                        h = (h < 10) ? ("0" + h) : h; // leading 0 at the left for 1 digit hours
                        var ampm = H < 12 ? " AM" : " PM";
                        ts = h + ts.substr(2, 3) + ampm;
                        return ts;
                    };

                    rawData.forEach((e) => {
                        appointments += `
                        <div class="appointment-card" style="margin-top: 50px;">
                                <div class="appointment-time">
                                    <span>${tConv24(e.time)}</span>
                                </div>
                                <div>
                                    <span style="margin-right: 40px;">Patient ID</span>
                                    <span>${e.patientID}</span>
                                </div>
                                <div>
                                    <span style="margin-right: 10px;">Patient Name</span>
                                    <span>${e.patientName}</span>
                                </div>
                                <div>
                                    <span style="margin-right: 40px;">Doctor ID</span>
                                    <span>${e.doctorID}</span>
                                </div>
                                <div>
                                    <span style="margin-right: 10px;">Doctor Name</span>
                                    <span>${e.doctorName}</span>
                                </div>
                                <div style="display: flex;">
                                    <span style="margin-right: 50px;">Status</span>
                                    <div class="appointment-status">
                                        <span>${e.status}</span>
                                    </div>
                                </div>
                                <div style="display: flex;">
                                    <span style="margin-right: 50px;">Action</span>
                                    <div style="width: 150px; display:inline;">
                                <a style="color: rgb(85,26,139);" href="./editAppointment.php?id=${e.appointmentID}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                &nbsp;&nbsp;&nbsp;
                                <a style="color: rgb(85,26,139);" href="./deleteAppointment.php?id=${e.appointmentID}&status=Cancelled"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                </div>
                                </div>
                                
                            </div>
                    `;
                    });
                    appointments += `</div></div>`;

                    $('#listAllAppointment').html(appointments);
                }

                function getRawData(status, day) {
                    if (status == 'Awaiting' && day == 'Today') return <?php $staff->listTodaysAppointment('Awaiting'); ?>;
                    else if (status == 'Awaiting' && day == 'This week') return <?php $staff->listThisWeekAppointments('Awaiting'); ?>;
                    else if (status == 'Awaiting' && day == 'This month') return <?php $staff->listThisMonthAppointments('Awaiting'); ?>;
                    else if (status == 'Completed' && day == 'Today') return <?php $staff->listTodaysAppointment('Completed'); ?>;
                    else if (status == 'Completed' && day == 'This week') return <?php $staff->listThisWeekAppointments('Completed'); ?>;
                    else if (status == 'Completed' && day == 'This month') return <?php $staff->listThisMonthAppointments('Completed'); ?>;
                    else if (status == 'Cancelled' && day == 'Today') return <?php $staff->listTodaysAppointment('Cancelled'); ?>;
                    else if (status == 'Cancelled' && day == 'This week') return <?php $staff->listThisWeekAppointments('Cancelled'); ?>;
                    else if (status == 'Cancelled' && day == 'This month') return <?php $staff->listThisMonthAppointments('Cancelled'); ?>;
                }

                $(document).ready(function() {
                    let rawData;
                    rawData = <?php $staff->listTodaysAppointment('Awaiting') ?>;
                    if (rawData.status != 'error') {
                        populateAppointemnts(rawData);
                    } else {
                        // front end team will add the page segment here 
                    }

                    // status based
                    $('#show, #status').change(function() {
                        let status = ($('#show').val());
                        let day = ($('#status').val());

                        rawData = getRawData(status, day);
                        // console.log(rawData);

                        if (rawData.status != 'error') {
                            // console.log(rawData);
                            populateAppointemnts(rawData);
                        } else {
                            $('#appointmentListID').html('');
                            alert('No Record Found');
                            // front end please add the page segment no record found here 
                        }

                    });

                    // Date based
                    $('#datefrom, #dateto').change(function() {
                        let from = ($('#datefrom').val());
                        let to = ($('#dateto').val());

                        if (from === "" || to === "") {} else {
                            $.post('byCMkGnmDa3mXlyfgPh/api/getCustomAppointment.php', {
                                from: from,
                                to: to
                            }, function(data) {
                                if (data != null) {
                                    rawData = jQuery.parseJSON(data);
                                    populateAppointemnts(rawData);
                                }
                            });
                        }
                    });

                });
            </script>

            <!-- print modal 3 here  0/1 -->
            <div id="modal5" class="modal">
                <div class="modalContent5">
                    <form style="margin-top: 7px;">
                        <div class="form-div-modal5">
                            <label for="sid" class="label-modal5">Starting Patient ID</label>
                            <select name="sid" id="sid" class="inp-modal5">
                                <option value="">JA000906000</option>
                            </select>
                        </div>
                        <div class="form-div-modal5">
                            <label for="eid" class="label-modal5">Ending Patient ID</label>
                            <select name="eid" id="eid" class="inp-modal5">
                                <option value="">JA000906000</option>
                            </select>
                        </div>
                        <div class="form-div-modal5">
                            <label for="from" class="label-modal5">Starting Date</label>
                            <span>
                                <input type="text" id="from" class="inp-modal5 datepicker-here"><i class="far fa-calendar-alt"></i>
                            </span>
                        </div>
                        <div class="form-div-modal5">
                            <label for="to" class="label-modal5">Ending Date</label>
                            <span>
                                <input type="text" id="to" class="inp-modal5 datepicker-here"><i class="far fa-calendar-alt"></i>
                            </span>
                        </div>
                        <div class="form-div-modal5">
                            <label for="sid" class="label-modal5">Status</label>
                            <select name="sid" id="sid" class="inp-modal5">
                                <option value="">Completed</option>
                                <option value="">Awaiting</option>
                                <option value="">Cancelled</option>
                            </select>
                        </div>
                    </form>
                    <div class="text-center">
                        <button class="modalBtn5" type="submit">PRINT</button>
                    </div>
                </div>
            </div>
            <!-- print modal 3 till here 1/1 -->

        </div>
    </div>



    <script src="src/js/appointment.js">
    </script>

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


</body>




</html>