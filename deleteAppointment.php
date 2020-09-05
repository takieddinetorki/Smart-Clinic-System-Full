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

        <?php include 'sidebar.php';?>

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
                                            <input type="text" id="tacky" class="datepicker-here" data-language='en'>
                                            <i class="far fa-calendar-alt"></i> </span>
                                    </div>
                                    <div style="margin-top: 10px;">
                                        <label for="to">To</label>
                                        <span>
                                            <input type="text" id="tacky" class="datepicker-here ml-inp" data-language='en'>
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
                    <div class="table" style="min-width: fit-content" id="appointmentListID">

                    </div>
                </div>


            </div>



        </div>

        <!-- Backend Scripts goes here by Yeasin -->
        <script>
            $(document).ready(function() {
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
                
                $.post('byCMkGnmDa3mXlyfgPh/appointment_module/deleteAppointment.php', {
                    id: getUrlVars()["id"]
                }, function(data) {
                    if (data != null) {
                        var results = jQuery.parseJSON(data);
                        if (results.status == 'passed') window.location.href = 'http://localhost/smartClinicSystem/appointment.php';
                        else alert('A Problem Occur while deleting the status');
                    }
                });
            });
        </script>

        <!-- save modal here -->
        <div id="modal3" class="modal pdl">
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