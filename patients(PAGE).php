<?php
require_once 'byCMkGnmDa3mXlyfgPh/core/init.php';
$patient = new Patient;
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
    <link rel="stylesheet" href="styles/footer.css">
    <link rel="stylesheet" href="styles/modals.css">
    <link rel="stylesheet" href="styles/patients.css">

    <script src="https://kit.fontawesome.com/d814c57d3c.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- for fonts -->
    <script src="https://secure.exportkit.com/cdn/js/ek_googlefonts.js"></script>

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

            <div class="search-bar">
                <div class="dropdown-box">
                    <input type="text" id="search" name="search" autocomplete="off" />
                    <a class="searching-button"><img id="searchButton" class="nav-icon" src="src/img/magnify-glass.svg" alt="" /></a>

                    <div class="searchbar-dropdown">
                        <input type="radio" value="id" id="search-by-id" name="searchOptions">
                        <label for="search-by-id">Search by Patient ID</label>
                        <br> <br>
                        <input type="radio" value="name" id="search-by-name" name="searchOptions">
                        <label for="search-by-name">Search by Patient Name</label>
                    </div>
                </div>
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
            <div class="head">
                <h1>PATIENTS</h1>
            </div>

            <div style="width: 100%; max-width: 1050px;">
                <div class="tabl">


                    <div class="table-nav">
                        <div style="display: flex;">
                            <div class="tablenav-indiv">
                                <label for="sid">Starting Patient ID</label>
                                <select style="width: 140px" name="startID" id="startID">
                                    <option disabled selected>Select ID</option>
                                    <?php $patient->getAllPatientID(); ?>
                                </select>
                            </div>
                            <div>
                                <label style="margin-left:20px;" class="ml-0" for="eid">Ending Patient ID</label>
                                <select style="width: 140px" name="endID" id="endID">
                                    <option disabled selected>Select ID</option>
                                    <?php $patient->getAllPatientID(); ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="table-wrapper-scroll-y" style="overflow-y: hidden;">




                        <table class="table" style="max-width: 1050; min-width: 1050px;">
                            <thead>
                                <tr>
                                    <th style="width:70px;border-left: none;">No</th>
                                    <th style="width:250px">Patient ID <i class="fas fa-sort"></i></th>
                                    <th style="width:500px">Name <i class="fas fa-sort"></i></th>
                                    <th style="width:200px;border-right:none;">Gender</th>
                                </tr>
                            </thead>
                            <tbody id="p_table" style="max-height: calc(100vh - 330px);min-height: 200px;" class="table-wrapper-scroll-y">
                            </tbody>
                        </table>

                    </div>
                </div>
                <div class="footer">
                    <div class="footer-div">
                        <div class="icons-div">
                            <a href="personal-info(PAGE).php">
                                <div class="icons">
                                    <i class="fas fa-plus" style="color:#444242"></i>
                                </div>
                            </a>

                            <div class="icons" onclick="show('modal4')">
                                <img src="src/img/printer.png" alt="printer">
                            </div>
                            <div class="icons" onclick="show('modal2')">
                                <img src="src/img/rubbish-bin.png" alt="delete">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Mohammad Yeasin Al Fahad -->
    <!-- Backend Integration -->
    <!-- 27/09/20 -->

    <script>
        function populatePatinetsInTable(rawData) {
            let html = ``;

            if (rawData) {
                let index = 1;
                rawData.forEach((e) => {
                    html += `
                    <tr>
                        <td style="width:70px;border-left: none;">${index}</td>
                        <td style="width:250px">${e.patientID}</td>
                        <td style="width:500px" class="patient-name-col">${e.name}</td>
                        <td style="width:207px;border-right:none;">${e.gender}</td>
                    </tr>
                `;
                    index++;
                });
                $('#p_table').html(html);
                // when table row is clicked, get doctor id and name, saved in variable for backend use
                $('.table tbody tr').click(function() {
                    $(".table tbody tr").each(function() {
                        $(this).css('background-color', '')
                    });
                    $(this).css('background-color', 'rgba(148, 148, 255, 0.5)')

                    let id = $(this).children().toArray()[1].innerHTML;
                    $('#deletePatient').click(function() {
                        console.log("delete called");
                        // getting the account name based on the account code 
                        if (id) {
                            $.post('byCMkGnmDa3mXlyfgPh/api/getPateintInfo.php', {
                                patientID: id,
                                condition: "delete"
                            }, function(data) {
                                if (data != null) {
                                    var results = jQuery.parseJSON(data);
                                    if (results.status != "failed") window.localtion.replace("/smartClinicSystem/patients(PAGE).php");
                                    else {
                                        alert('Delete Unseccessfull, Please try again later. If the problem is persistent contact support team');
                                        window.localtion.replace("/smartClinicSystem/patients(PAGE).php");
                                    }
                                }
                            });
                        }
                    });
                    // console.log(table_row[4].innerHTML);
                });

                // when table row is double clicked, open edit gui
                $('.table tbody tr').dblclick(function() {
                    let patientID = $(this).children().toArray()[1].innerHTML;
                    window.location.href = `/smartClinicSystem/editPatient.php?id=${patientID}`;
                });
            }
        }

        function gettingReady(state) {
            // getting all the data from backedn 
            let rawData = <?php $patient->getAllPateints(); ?>;
            console.log(rawData);
            if (state == 1) {
                if (rawData.status != 'error') {
                    populatePatinetsInTable(rawData);
                } else {
                    $('#certTableList').html(`
                        <div class="main">
                            <div style="margin-top: 150px;">
                                <img src="src/img/group4.png" alt="" style="margin:auto">
                                <p style="text-transform:uppercase;text-align:center">No Patinets Found</p>
                                <p style="text-align: center;">Try Adding Some First</p>
                                <p style="text-align: center;">If the Problem is Persistent, Contact to Support Team</p>
                            </div>
                        </div>
                    `);
                }
            }


            // searching pateints based on ID 
            // ID base 
            $('#startID, #endID').change(function() {
                let startID = ($('#startID').val());
                let endID = ($('#endID').val());


                if (startID && endID) {
                    $.post('byCMkGnmDa3mXlyfgPh/api/getPateintInfo.php', {
                        startID: startID,
                        endID: endID,
                        condition: 'multiID'
                    }, function(data) {
                        if (data != null) {
                            rawData = jQuery.parseJSON(data);
                            if (rawData.status != 'error') {
                                populatePatinetsInTable(rawData);

                            } else {
                                $('#p_table').html(`
                                    <div class="main">
                                        <div style="margin-top: 150px;">
                                            <img src="src/img/group4.png" alt="" style="margin:auto">
                                            <p style="text-transform:uppercase;text-align:center">No Medical Certificates Found</p>
                                            <p style="text-align: center;">Try Changing The Search Keywords (Start ID and End ID) First</p>
                                            <p style="text-align: center;">If the Problem is Persistent, Contact to Support</p>
                                        </div>
                                    </div>
                                `);
                            }
                        }
                    });
                }
            });

            // searching an expense 
            $('#searchButton').click(function() {
                let choice = $("input:radio[name=searchOptions]:checked").val();
                let value = $('#search').val();
                if (value) {
                    if (choice) {
                        $.post('byCMkGnmDa3mXlyfgPh/api/getPateintInfo.php', {
                            condition: choice,
                            value: value
                        }, function(data) {
                            if (data != null) {
                                rawData = jQuery.parseJSON(data);
                                if (rawData.status != 'error') {
                                    populatePatinetsInTable(rawData);
                                } else {
                                    $('#p_table').html(`
                                    <div class="main">
                                        <div style="margin-top: 150px;">
                                            <img src="src/img/group4.png" alt="" style="margin:auto">
                                            <p style="text-transform:uppercase;text-align:center">No Patinets Found</p>
                                            <p style="text-align: center;">Try Adding Some First</p>
                                            <p style="text-align: center;">If the Problem is Persistent, Contact to Support Team</p>
                                        </div>
                                    </div>
                                `);
                                }
                            }
                        });
                    } else {
                        alert("Please choose one of the searching options");
                    }
                } else {
                    alert("Please insert some value in the search bar");
                }
            });
        }

        $(document).ready(gettingReady(1));
    </script>


    <!-- delete modal here -->
    <div id="modal2" class="modal pdl">
        <div class="modal-wrap">
            <div class="modalContent2">
                <form style="margin-top: 7px;">
                    <div style="text-align: center;margin-top: 25px;">
                        <p class="label-modal2">Are you sure to delete?</label>
                            <div class="form-div-modal2">
                                <button class="modalBtn2" id="deletePatient" type="button">Yes</button>
                                <button class="modalBtn2" type="button">No</button>
                            </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- delete modal till here -->
    <!-- print modal 2 here  0/1 -->
    <div id="modal4" class="modal pdl">
        <div class="modal-wrap">
            <div class="modalContent4">
                <form style="margin-top: 7px;" action="/smartClinicSystem/byCMkGnmDa3mXlyfgPh/patient_module/ReportPatient.php" enctype="multipart/form-data" method="POST">
                    <div class="form-div-modal4">
                        <label for="sid" class="label-modal4">Starting Patient ID</label>
                        <select name="sid-r" id="sid-r" class="inp-modal4">
                            <option disabled selected>Select ID</option>
                            <?php $patient->getAllPatientID(); ?>
                        </select>
                    </div>
                    <div class="form-div-modal4">
                        <label for="eid" class="label-modal4">Ending Patient ID</label>
                        <select name="eid-r" id="eid-r" class="inp-modal4">
                            <option disabled selected>Select ID</option>
                            <?php $patient->getAllPatientID(); ?>
                        </select>
                    </div>
                    <div class="text-center">
                        <button class="modalBtn4" type="submit">PRINT</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <!-- print modal 2 till here 1/1 -->
</body>

</html>

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
<script src="src/js/layout.js"></script>
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