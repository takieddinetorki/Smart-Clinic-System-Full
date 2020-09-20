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
    <link rel="stylesheet" href="styles/modals.css">
    <link rel="stylesheet" href="styles/appointment_list.css">


    <script src="https://kit.fontawesome.com/d814c57d3c.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- for fonts -->
    <script src="https://secure.exportkit.com/cdn/js/ek_googlefonts.js"></script>
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

        <?php include 'sidebar.php'; ?>

        <div class="main">
            <div class="head">
                <h1 style="text-transform: uppercase;">Appointments</h1>
            </div>
            <div class="cl-btn" onclick="show('modal3')">
                <i class="fas fa-times-circle"></i>
            </div>


            <div style="width:100%; display: flex; justify-content: center;">

                <div class="tabl table-wrapper-scroll-y">
                    <div class="table-nav">
                        <div class="flex">
                            <div style="width: 370px; display: flex">

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

                            <div class="appointment-icons">
                                <div><img src="src/img/calendar-interface-symbol-tool.png" alt=""></div>
                                <div><img src="src/img/clock.png" alt=""></div>
                                <div><img src="src/img/stethoscope-medical-tool.png" alt=""></div>
                                <div><img src="src/img/status-bar.png" alt=""></div>

                            </div>
                        </div>
                    </div>
                    <div class="table" style="min-width: fit-content" id="appointmentListID"></div>
                </div>
            </div>
        </div>

        <!-- Backend Scripts goes here by Yeasin -->

        <script>
            // this function will populate the screen with appointments and the rawData simply means the json data from backend
            function populateAppointemnts(rawData) {
                let appointments = `<div  style="max-height: calc(100vh - 300px);min-height: 300px; padding-right: 10px;" class="table-wrapper-scroll-y">`;
                let days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

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
                            <div class="appointment-row">
                                <div style="display: flex; width: 370px; margin-left:10px; ">
                                    <a href=""><i class="fas fa-eye"></i></a>
                                    <span style="margin-right:20px; font-weight: 600;" id="ID">${e.patientID}</span>
                                    <span id="name">${e.patientName}</span>
                                </div>

                                <div style="width: 150px;" id="date">
                                    <span id="date1">${e.date}</span>
                                    <br>
                                    <span id="dayName">${days[new Date(e.date).getDay()]}</span>
                                </div>
                                <div style="width: 150px;" id="time">${tConv24(e.time)}</div>
                                <div style="width: 150px;" id="docName">${e.doctorName}</div>
                                <div style="width: 150px; display:inline;">
                                <a style="color: rgb(85,26,139);" href="./changeAppointmentStatus.php?id=${e.appointmentID}&status=Completed"><i class="fa fa-check-square" aria-hidden="true"></i></a>
                                &nbsp;&nbsp;&nbsp;
                                <a style="color: rgb(85,26,139);" href="./changeAppointmentStatus.php?id=${e.appointmentID}&status=Cancelled"><i class="fa fa-window-close" aria-hidden="true"></i></a>
                                </div>
                            </div>
                    `;
                });
                appointments += `</div>`;

                $('#appointmentListID').html(appointments);
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
                rawData = <?php $staff->listTodaysAppointment('Awaiting'); ?>;
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

                    if (rawData) {
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

    </div>




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


</body>




</html>