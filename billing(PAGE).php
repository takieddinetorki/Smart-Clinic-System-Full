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
    <link rel="stylesheet" href="styles/billing.css">

    <script src="https://kit.fontawesome.com/d814c57d3c.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- for fonts -->
    <script src="https://secure.exportkit.com/cdn/js/ek_googlefonts.js"></script>
    <link href="styles/datepicker.min.css" rel="stylesheet" type="text/css">
    <script src="src/js/datepicker.min.js"></script>
    <!-- Include English language -->
    <script src="src/js/i18n/datepicker.en.js"></script>
</head>

<body onload="sidebarActivelink('billing(PAGE)')">
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
                        <input type="radio" id="search-by-name" name="src" />
                        <label for="search-by-name">Search by Name</label>
                        <br>
                        <input type="radio" id="search-by-name" name="src" />
                        <label for="search-by-name">Search by NRIC/Passport</label>
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
                <h1 style="text-transform: uppercase;">Billing</h1>
            </div>

            <div style="width: 100%; max-width: 1050px;">
                <div class="tabl">
                    <div class="table-nav">
                        <div class="flex" style="margin-top: 5px;width: 100%;">
                            <div class="flex" style="max-width: 190px;" id="div_1">
                                <div class="status" id="dpdwn1">
                                    <label for="show" style="margin-left: 3px;">Show</label>
                                    <select name="show" class="status_dpdwn" id="show">
                                        <option value="Today">Today</option>
                                        <option value="This week">This week</option>
                                        <option value="This month">This month</option>
                                    </select>
                                </div>
                                <div class="status">
                                    <label for="status" style="margin-left: 3px;">status</label>
                                    <select name="status" class="status_dpdwn status_dpdwn2" id="status">
                                        <option value="all">All</option>
                                        <option value="Paid">Paid</option>
                                        <option value="Un-Paid">Unpaid</option>
                                    </select>
                                </div>
                            </div>

                            <div style="margin-right:10px;display: flex;flex-grow: 1;" id="from-todiv">
                                <div>
                                    <label for="from">From</label>
                                    <span>
                                        <input type="date" id="datefrom" data-language='en'>
                                        <i class="far fa-calendar-alt" style="font-size: 13px;"></i> </span>
                                </div>
                                <div>
                                    <label for="to">To</label>
                                    <span>
                                        <input type="date" id="dateto" data-language='en'>
                                        <i class="far fa-calendar-alt" style="font-size: 13px;"></i> </span>
                                </div>
                            </div>
                            <div style="display: flex;" id="big-div-tnav">
                                <div style="margin-right:10px">
                                    <label for="sid">Starting Patient ID</label>
                                    <select name="sid" id="startID">
                                        <?php $staff->getAllPatientID() ?>
                                    </select>
                                </div>
                                <div id="bdt-div">
                                    <label for="eid">Ending Patient ID</label>
                                    <select name="eid" id="endID">
                                        <?php $staff->getAllPatientID() ?>
                                    </select>
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="table-wrapper-scroll-y" style="overflow-y: hidden;">
                        <table class="table" style="max-width: 1050; min-width: 1050px;">
                            <thead>
                                <tr>
                                    <th style="width:50px;border-left: none;">No</th>
                                    <th style="width:100px">Date <i class="fas fa-sort"></i></th>
                                    <th style="width:160px">Patient ID <i class="fas fa-sort"></i></th>
                                    <th style="width:370px">Name <i class="fas fa-sort"></i></th>
                                    <th style="width:120px">Reciept No. <i class="fas fa-sort"></i></th>
                                    <th style="width:110px">Amount <i class="fas fa-sort"></i></th>
                                    <th style="width: 100px; border-right: none;">Status</th>

                                </tr>
                            </thead>
                            <tbody id="billTableList" style="max-height: calc(100vh - 380px);min-height: 200px;" class="table-wrapper-scroll-y">
                            </tbody>
                        </table>

                    </div>
                    <br>
                    <div style="max-width: 1040px;">
                        <div id="total">
                            <div style="border-right: 1px solid black;padding-right: 18px;">
                                Total
                            </div>
                            <div style="padding-left:20px">
                                RM <strong style="padding-left:10px" id="totalAmmount">00.00</strong>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer">
                    <div class="footer-div">
                        <div class="icons-div">
                            <div class="icons">
                                <a href="billing-form(PAGE).php" style="text-decoration: none;"> <i style="color:#444242" class="fas fa-plus"></i></a>

                            </div>
                            <div class="icons" onclick="show('modal6')">
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


    <!-- Backend Integration -->
    <!-- Mohammad Yeasin Al Fahad -->
    <!-- 20/09/2020 -->
    <script>
        // function for populating table 
        function populateBillisInTable(rawData) {
            let html = ``;

            if (rawData) {
                let index = 1;
                let totalAmmount = 0.0;
                rawData.forEach((e) => {
                    html += `
                    <tr>
                        <td style="width:50px;border-left: none;">${index}</td>
                        <td style="width:100px">${e.date}</td>
                        <td style="width:160px">${e.patientID}</td>
                        <td style="width:370px">${e.name}</td>
                        <td style="width:120px">${e.receiptNo}</td>
                        <td style="width:110px">${e.totalAmount}</td>
                        <td style=" width:108px;border-right:none">${e.status}</td>

                    </tr>
                `;
                    index++;
                    totalAmmount += parseFloat(e.totalAmount);
                });
                totalAmmount.toFixed(2);
                $('#billTableList').html(html);
                return totalAmmount;
            }
        }

        // this function will give status based data 
        function getRawDatabyStatus(status, day) {
            if (status == 'Paid' && day == 'Today') return <?php $staff->listTodaysBillings('Paid'); ?>;
            else if (status == 'Paid' && day == 'This week') return <?php $staff->listThisWeekBillings('Paid'); ?>;
            else if (status == 'Paid' && day == 'This month') return <?php $staff->listThisMonthBillings('Paid'); ?>;
            else if (status == 'Un-Paid' && day == 'Today') return <?php $staff->listTodaysBillings('Un-Paid'); ?>;
            else if (status == 'Un-Paid' && day == 'This week') return <?php $staff->listThisWeekBillings('Un-Paid'); ?>;
            else if (status == 'Un-Paid' && day == 'This month') return <?php $staff->listThisMonthBillings('Un-Paid'); ?>;
            else if (status == 'all' && day == 'Today') return <?php $staff->listTodaysBillings(''); ?>;
            else if (status == 'all' && day == 'This week') return <?php $staff->listThisWeekBillings(''); ?>;
            else if (status == 'all' && day == 'This month') return <?php $staff->listThisMonthBillings(''); ?>;
        }

        $(document).ready(function() {
            // getting the bills from the DB 
            let rawData = <?php $staff->getBillingByCondition(); ?>;
            console.log(rawData);
            if (rawData.status != 'failed') {
                let totalAmmont = populateBillisInTable(rawData);
                $('#totalAmmount').html(totalAmmont.toFixed(2));
            }else if(rawData.status == 'failed'){
                $('#billTableList').html(`
                <div class="main">
                    <div style="margin-top: 150px;">
                        <img src="src/img/group4.png" alt="" style="margin:auto">
                        <p style="text-transform:uppercase;text-align:center">No Record Exist</p>
                        <p style="text-align: center;">Try Adding some first</p>
                    </div>
                </div>
                `);
            } 


            // date base 
            $('#datefrom, #dateto').change(function() {
                let from = ($('#datefrom').val());
                let to = ($('#dateto').val());

                if (from === "" || to === "") {} else {
                    $.post('byCMkGnmDa3mXlyfgPh/api/getCustomBilling.php', {
                        from: from,
                        to: to,
                        condition: 'date'
                    }, function(data) {
                        if (data != null) {
                            rawData = jQuery.parseJSON(data);
                            if (rawData.status != 'failed') {
                                let totalAmmont = populateBillisInTable(rawData);
                                $('#totalAmmount').html(totalAmmont.toFixed(2));
                            }
                        }
                    });
                }
            });


            // ID base 
            $('#startID, #endID').change(function() {
                let startID = ($('#startID').val());
                let endID = ($('#endID').val());

                console.log(startID)
                console.log(endID)

                if (startID === "" || endID === "") {} else {
                    $.post('byCMkGnmDa3mXlyfgPh/api/getCustomBilling.php', {
                        startID: startID,
                        endID: endID,
                        condition: 'id'
                    }, function(data) {
                        if (data != null) {
                            rawData = jQuery.parseJSON(data);
                            if (rawData.status != 'failed') {
                                let totalAmmont = populateBillisInTable(rawData);
                                $('#totalAmmount').html(totalAmmont);
                            }
                        }
                    });
                }
            });

            // combination of day and status 
            $('#show, #status').change(function() {
                let status = ($('#status').val());
                let day = ($('#show').val());

                rawData = getRawDatabyStatus(status, day);
                // console.log(rawData);

                if (rawData.status != 'error') {
                    // console.log(rawData);
                    populateAppointemnts(rawData);
                } else {
                    $('#billTableList').html(`
                    <div class="main">
                        <div style="margin-top: 150px;">
                            <img src="src/img/group4.png" alt="" style="margin:auto">
                            <p style="text-transform:uppercase;text-align:center">No Results Found</p>
                            <p style="text-align: center;">Try modifying your keywords</p>
                        </div>
                    </div>
                    `);
                    // front end please add the page segment no record found here 
                }

            });

            // when table row is clicked, get the value for backend use
            $('.table tbody tr').click(function() {
                $(".table tbody tr").each(function() {
                    $(this).css('background-color', '')
                });
                $(this).css('background-color', 'rgba(148, 148, 255, 0.5)')

                let id = $(this).children().toArray()[4].innerHTML;
                $('#deleteBilling').click(function() {
                    // getting the account name based on the account code 
                    if (id) {
                        $.post('byCMkGnmDa3mXlyfgPh/api/editBillingScript.php', {
                            id: id,
                            condition: "delete"
                        }, function(data) {
                            if (data != null) {
                                var results = jQuery.parseJSON(data);
                                alert(results.status);
                                window.location.reload();
                            }
                        });
                    }
                });
            });

            // when table row is double clicked, open edit gui
            $('.table tbody tr').dblclick(function() {
                let recieptNo = $(this).children().toArray()[4].innerHTML;
                window.location.href = `/smartClinicSystem/editBilling.php?id=${recieptNo}`;
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
                                <button class="modalBtn2" id="deleteBilling" type="button">Yes</button>
                                <button class="modalBtn2" type="button">No</button>
                            </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <!-- delete modal till here -->

    <!-- print modal 4 here  0/1 -->
    <div id="modal6" class="modal pdl">
        <div class="modal-wrap">
            <div class="modalContent6">
                <form style="margin-top: 15px;">
                    <div class="form-div-modal6 category_1">
                        <label for="from" class="label-modal6">Starting Date</label>
                        <span>
                            <input type="text" id="from" class="inp-modal6 datepicker-here" data-language='en'><i class="far fa-calendar-alt"></i>
                        </span>
                    </div>
                    <div class="form-div-modal6 category_1">
                        <label for="to" class="label-modal6">Ending Date</label>
                        <span>
                            <input type="text" id="to" class="inp-modal6  datepicker-here" data-language='en'><i class="far fa-calendar-alt"></i>
                        </span>
                    </div>


                    <div class="form-div-modal6 category_2">
                        <label for="from" class="label-modal6">Starting Patient ID</label>
                        <select type="text" id="from" class="inp-modal6"></select>
                    </div>
                    <div class="form-div-modal6 category_2">
                        <label for="from" class="label-modal6">Ending Patient ID</label>
                        <select type="text" id="from" class="inp-modal6"></select>
                    </div>


                    <div class="form-div-modal6" style="margin-left: -26px;">
                        <div class="form-div-div-modal6" style="justify-content: flex-end;margin-right: 10px;">
                            <input type="radio" name="date" id="date" class="inp-radio" oninput="toggleDiv('category_1','category_2')">
                            <label for="date" style="width: fit-content;">Date</label>
                        </div>
                        <div class="form-div-div-modal6">
                            <input type="radio" name="date" id="date" class="inp-radio" oninput="toggleDiv('category_2','category_1')">
                            <label for="date">Patient</label>
                        </div>
                    </div>
                </form>
                <div class="text-center">
                    <button class="modalBtn6" type="submit">PRINT</button>
                </div>
            </div>
        </div>
    </div>

    <!-- print modal 4 till here 1/1 -->

</body>

</html>

<script type="text/javascript">
    function toggleDiv(x, y) {
        var ele = document.getElementsByClassName(x);
        for (i = 0; i < ele.length; i++) {
            ele[i].style.display = "flex";
        }
        var ele2 = document.getElementsByClassName(y);
        for (i = 0; i < ele2.length; i++) {
            ele2[i].style.display = "none";
        }
    }

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