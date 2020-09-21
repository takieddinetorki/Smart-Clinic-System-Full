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
    <link rel="stylesheet" href="styles/medical-cert.css">
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
                <h1 style="text-transform: uppercase;">MEDICAL CERTIFICATE</h1>
            </div>

            <div style="width: 100%; max-width: 1050px;">
                <div class="tabl">
                    <div class="table-nav">
                        <div class="flex" style="margin-top: 20px;width: 100%;">
                            <div class="status" id="dpdwn1">
                                <label for="status" style="margin-left: 5px;">Status</label>
                                <select name="status" class="status_dpdwn" id="status">
                                    <option value="Today">Today</option>
                                    <option value="This week">This week</option>
                                    <option value="This month">This month</option>
                                </select>
                            </div>
                            <div style="margin-right:10px;display: flex;flex-grow: 1;" id="from-todiv">
                                <div>
                                    <label for="datefrom">From</label>
                                    <span>
                                        <input style="width: 140px" type="date" id="datefrom" data-date-format="yyyy-mm-dd" data-language='en'>
                                        <i class="far fa-calendar-alt"></i> </span>
                                </div>
                                <div>
                                    <label for="dateto">To</label>
                                    <span>
                                        <input style="width: 140px" type="date" id="dateto" data-date-format="yyyy-mm-dd" data-language='en'>
                                        <i class="far fa-calendar-alt"></i> </span>
                                </div>
                            </div>
                            <div style="display: flex;" id="big-div-tnav">
                                <div style="margin-right:10px">
                                    <label for="startID">Starting Patient ID</label>
                                    <select style="width: 140px" name="startID" id="startID">
                                        <?php $staff->getAllPatientID(); ?>
                                    </select>
                                </div>
                                <div id="bdt-div">
                                    <label for="endID">Ending Patient ID</label>
                                    <select style="width: 140px" name="endID" id="endID">
                                        <?php $staff->getAllPatientID(); ?>
                                    </select>
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="table-wrapper-scroll-y" style="overflow-y: hidden;">
                        <table class="table" style="max-width: 1050; min-width: 1050px;">
                            <thead>
                                <tr>
                                    <th style="width:70px;border-left: none;">No</th>
                                    <th style="width:110px">Date <i class="fas fa-sort"></i></th>
                                    <th style="width:200px">Patient ID <i class="fas fa-sort"></i></th>
                                    <th style="width:520px">Name <i class="fas fa-sort"></i></th>
                                    <th style="width: 110px; padding-left: 20px; border-right: none;">Reciept No.</th>

                                </tr>
                            </thead>
                            <tbody id="certTableList" style="max-height: calc(100vh - 325px);min-height: 200px;" class="table-wrapper-scroll-y">
                                <!-- Populate Data -->
                            </tbody>
                        </table>

                    </div>
                    <br>
                </div>
                <div class="footer">
                    <div class="footer-div">
                        <div class="icons-div">
                            <a href="medical-form(PAGE).php" style="text-decoration: none;">
                                <div class="icons">
                                    <i class="fas fa-plus" style="color: #444242;"></i>
                                </div>
                            </a>

                            <div class="icons" onclick="show('modal13')">
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

    <!-- backend Integration -->
    <!-- Mohammad Yeasin Al Fahad -->
    <!-- 21/09/2020 -->

    <script>
        // Populatng table data
        function populateMedicalCertsInTable(rawData) {
            let html = ``;

            if (rawData) {
                let index = 1;
                rawData.forEach((e) => {
                    html += `
                    <tr>
                        <td style="width:70px;border-left: none;">${index}</td>
                        <td style="width:110px">${e.startingDate}</td>
                        <td style="width:200px">${e.patientID}</td>
                        <td style="width:520px">${e.name}</td>
                        <td style=" width:124px;border-right:none">${e.receiptNo}</td>

                    </tr>
                `;
                    index++;
                });
                $('#certTableList').html(html);
            }
        }


        // fors status changing this method will be used
        function getRawData(day) {
            if (day == 'Today') return <?php $staff->listTodaysMedicalCerts(); ?>;
            else if (day == 'This week') return <?php $staff->listThisWeeksMedicalCerts(); ?>;
            else if (day == 'This month') return <?php $staff->listThisMonthsMedicalCerts(); ?>;
        }

        $(document).ready(function() {

            // getting the certs from the DB 
            let rawData = <?php $staff->listAllMedCert(); ?>;
            console.log(rawData);
            console.log('rawData');
            if (rawData.status != 'failed') {
                populateMedicalCertsInTable(rawData);
            } else {
                $('#certTableList').html(`
                    <div class="main">
                        <div style="margin-top: 150px;">
                            <img src="src/img/group4.png" alt="" style="margin:auto">
                            <p style="text-transform:uppercase;text-align:center">No Medical Certificates Found</p>
                            <p style="text-align: center;">Try Adding Some First</p>
                            <p style="text-align: center;">If the Problem is Persistent, Contact to Support</p>
                        </div>
                    </div>
                `);
            }


            // on change days
            $('#status').change(function() {
                let day = ($('#status').val());
                rawData = getRawData(day);

                if (rawData.status != 'failed') {
                    populateMedicalCertsInTable(rawData);
                } else {
                    $('#certTableList').html(`
                    <div class="main">
                        <div style="margin-top: 150px;">
                            <img src="src/img/group4.png" alt="" style="margin:auto">
                            <p style="text-transform:uppercase;text-align:center">No Medical Certificates Found</p>
                            <p style="text-align: center;">Try Adding Some First</p>
                            <p style="text-align: center;">If the Problem is Persistent, Contact to Support</p>
                        </div>
                    </div>
                `);
                }
            });

            // Date based
            $('#datefrom, #dateto').change(function() {
                let from = ($('#datefrom').val());
                let to = ($('#dateto').val());

                if (from === "" || to === "") {} else {
                    $.post('byCMkGnmDa3mXlyfgPh/api/getCustomMedicalCertificate.php', {
                        from: from,
                        condition: 'date',
                        to: to
                    }, function(data) {
                        if (data != null) {
                            rawData = jQuery.parseJSON(data);
                            if (rawData.status != 'failed') {
                                populateMedicalCertsInTable(rawData);
                            } else {
                                $('#certTableList').html(`
                                    <div class="main">
                                        <div style="margin-top: 150px;">
                                            <img src="src/img/group4.png" alt="" style="margin:auto">
                                            <p style="text-transform:uppercase;text-align:center">No Medical Certificates Found</p>
                                            <p style="text-align: center;">Try Changing The Search Keywords (From and To) First</p>
                                            <p style="text-align: center;">If the Problem is Persistent, Contact to Support</p>
                                        </div>
                                    </div>
                                `);
                            }
                        }
                    });
                }
            });


            // ID base 
            $('#startID, #endID').change(function() {
                let startID = ($('#startID').val());
                let endID = ($('#endID').val());


                if (startID === "" || endID === "") {} else {
                    $.post('byCMkGnmDa3mXlyfgPh/api/getCustomMedicalCertificate.php', {
                        startID: startID,
                        endID: endID,
                        condition: 'multiID'
                    }, function(data) {
                        if (data != null) {
                            rawData = jQuery.parseJSON(data);
                            if (rawData.status != 'failed') {
                                populateMedicalCertsInTable(rawData);
                            } else {
                                $('#certTableList').html(`
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
                        $.post('byCMkGnmDa3mXlyfgPh/api/getCustomMedicalCertificate.php', {
                            condition: choice,
                            value: value
                        }, function(data) {
                            if (data != null) {
                                rawData = jQuery.parseJSON(data);
                                if (rawData.status != 'failed') {
                                    populateMedicalCertsInTable(rawData);
                                } else {
                                    $('#certTableList').html(`
                                    <div class="main">
                                        <div style="margin-top: 150px;">
                                            <img src="src/img/group4.png" alt="" style="margin:auto">
                                            <p style="text-transform:uppercase;text-align:center">No Medical Certificates Found</p>
                                            <p style="text-align: center;">Try Changing The Search Keywords (Name or ID) First</p>
                                            <p style="text-align: center;">If the Problem is Persistent, Contact to Support</p>
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


            // when table row is clicked, get doctor id and name, saved in variable for backend use
            $('.table tbody tr').click(function() {
                $(".table tbody tr").each(function() {
                    $(this).css('background-color', '')
                });
                $(this).css('background-color', 'rgba(148, 148, 255, 0.5)')

                let id = $(this).children().toArray()[4].innerHTML;
                $('#deleteExpense').click(function() {
                    // getting the account name based on the account code 
                    if (id) {
                        $.post('byCMkGnmDa3mXlyfgPh/api/expenseScript.php', {
                            value: id,
                            status: "delete"
                        }, function(data) {
                            if (data != null) {
                                var results = jQuery.parseJSON(data);
                                console.log(results);
                                // if (results.status != "failed") window.localtion.replace = "/smartClinicSystem/expenses(PAGE).php";
                            }
                        });
                    }
                });
                // console.log(table_row[4].innerHTML);
            });

            // when table row is double clicked, open edit gui
            $('.table tbody tr').dblclick(function() {
                let recipetNo = $(this).children().toArray()[4].innerHTML;
                window.location.href = `/smartClinicSystem/editMedicalCert.php?id=${recipetNo}`;
            });
        });
    </script>


    <!-- ______________________________________________________________________________________________________________________ -->
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
    <!-- print modal 9 here  0/1 -->
    <div id="modal13" class="modal pdl">
        <div class="modal-wrap">
            <div class="modalContent13">
                <form style="margin-top: 7px;">
                    <div class="form-div-modal13">
                        <label for="sid" class="label-modal13">Starting Patient ID</label>
                        <select name="sid" id="sid" class="inp-modal13">
                            <option value="">JA000906000</option>
                        </select>
                    </div>
                    <div class="form-div-modal13">
                        <label for="eid" class="label-modal13">Ending Patient ID</label>
                        <select name="eid" id="eid" class="inp-modal13">
                            <option value="">JA000906000</option>
                        </select>
                    </div>
                    <div class="form-div-modal13">
                        <label for="from" class="label-modal13">Starting Date</label>
                        <span>
                            <input type="text" id="from_print_modal" class="inp-modal13 datepicker-here" data-language='en'><i class="far fa-calendar-alt"></i>
                        </span>
                    </div>
                    <div class="form-div-modal13">
                        <label for="to" class="label-modal13">Ending Date</label>
                        <span>
                            <input type="text" id="to_print_modal" class="inp-modal13 datepicker-here" data-language='en'><i class="far fa-calendar-alt"></i>
                        </span>
                    </div>
                </form>
                <div class="text-center">
                    <button class="modalBtn13" type="submit">PRINT</button>
                </div>
            </div>
        </div>
    </div>
    <!-- print modal 9 till here 1/1 -->

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

<script src="src/js/layout.js"></script>