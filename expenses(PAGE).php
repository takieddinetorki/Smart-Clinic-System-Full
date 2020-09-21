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
    <link rel="stylesheet" href="styles/expenses.css">
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

<body onload="sidebarActivelink('expenses(PAGE)')">
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
                        <input type="radio" value="accountCode" id="search-by-id" name="searchOptions">
                        <label for="search-by-id">Search by Account Code</label>
                        <br />

                        <input type="radio" value="particulation" id="search-by-name" name="searchOptions">
                        <label for="search-by-name">Search by Particulars</label>
                        <br />
                        <input type="radio" value="voucherNo" id="search-by-name" name="searchOptions">
                        <label for="search-by-name">Voucher No</label>
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
                <h1>EXPENSES</h1>
            </div>

            <div style="width: 100%; max-width: 1050px;">
                <div class="tabl">


                    <div class="table-nav">
                        <div style="display: flex;">
                            <div class="tablenav-indiv">
                                <label for="sid">Starting Account</label>
                                <select name="sid" id="sid">
                                    <option value="">Test</option>
                                    <option value="">Test</option>
                                    <option value="">Test</option>
                                    <option value="">Test</option>
                                </select>
                            </div>
                            <div>
                                <label style="margin-left:20px;" class="ml-0" for="eid">Ending Account</label>
                                <select name="eid" id="esid">
                                    <option value="">Test</option>
                                    <option value="">Test</option>
                                    <option value="">Test</option>
                                    <option value="">Test</option>
                                </select>
                            </div>
                        </div>

                        <div style="display: flex;" id="tn-div2">
                            <div class="tablenav-indiv">
                                <label style="margin-left:20px;" class="ml-0" for="from">From</label>
                                <span>
                                    <input type="date" id="datefrom" style="width: 150px;" data-language='en'>
                                    <i class="far fa-calendar-alt" style="font-size: 12;"></i>
                                </span>

                            </div>
                            <div>
                                <label for="to">To</label>
                                <span id="to-span">
                                    <input type="date" id="dateto" style="width: 150px;" data-language='en'>
                                    <i class="far fa-calendar-alt" style="font-size: 12;"></i>
                                </span>

                            </div>
                        </div>

                    </div>
                    <div class="table-wrapper-scroll-y" style="overflow-y: hidden;">
                        <table class="table" style="max-width: 1050; min-width: 1050px;">
                            <thead>
                                <tr>
                                    <th style="width:70px;border-left: none;">No</th>
                                    <th style="width:110px">Date <i class="fas fa-sort"></i></th>
                                    <th style="width:200px">Account Code <i class="fas fa-sort"></i></th>
                                    <th style="width:370px">Account Name <i class="fas fa-sort"></i></th>
                                    <th style="width: 150px;">Voucher No.</th>
                                    <th style="width: 110px; padding-left: 20px; border-right: none;">Amount</th>

                                </tr>
                            </thead>
                            <tbody style="max-height: calc(100vh - 385px);min-height: 200px;" class="table-wrapper-scroll-y" id="expenseTableList">
                                <!-- The data from DB -->
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
                                RM <strong id="totalAmmount" style="padding-left:10px">00.00</strong>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer">
                    <div class="footer-div">
                        <div class="icons-div">
                            <div class="icons">
                                <a href="expenses_form(PAGE).php" style="text-decoration: none;"> <i style="color: #444242;" class="fas fa-plus"></i></a>

                            </div>
                            <div class="icons" onclick="show('modal1')">
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

    <!-- Backend Integration  -->
    <!-- Mohammad Yeasin Al Fahad -->
    <!-- 19/09/2020 -->
    <script>
        // this function will fill all the data in the table
        function populateDataInTable(rawData) {
            let html = ``;

            if (rawData) {
                let index = 1;
                let totalAmmount = 0.0;
                rawData.forEach((e) => {
                    html += `
                <tr>
                    <td style="width:70px;border-left: none;">${index}</td>
                    <td style="width:110px">${e.date}</td>
                    <td style="width:200px">${e.accountCode}</td>
                    <td style="width:370px">${e.name}</td>
                    <td style="width:150px;">${e.voucherNo}</td>
                    <td style="width:121px;border-right:none">${e.ammount}</td>
                </tr>
                `;
                    index++;
                    totalAmmount += parseFloat(e.ammount);
                });
                $('#expenseTableList').html(html);
                return totalAmmount;
            }
        }

        $(document).ready(function() {
            // getting the expenses from the DB 
            let rawData = <?php $staff->showAllExpenses(); ?>;
            if (rawData.status != 'failed') {
                let totalAmmont = populateDataInTable(rawData);
                $('#totalAmmount').html(totalAmmont);
            }


            // date base 
            $('#datefrom, #dateto').change(function() {
                let from = ($('#datefrom').val());
                let to = ($('#dateto').val());

                if (from === "" || to === "") {} else {
                    $.post('byCMkGnmDa3mXlyfgPh/api/getCustomExpense.php', {
                        from: from,
                        to: to
                    }, function(data) {
                        if (data != null) {
                            rawData = jQuery.parseJSON(data);
                            if (rawData.status != 'failed') {
                                let totalAmmont = populateDataInTable(rawData);
                                $('#totalAmmount').html(totalAmmont);
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
                        $.post('byCMkGnmDa3mXlyfgPh/api/getSearchedExpense.php', {
                            choice: choice,
                            value: value
                        }, function(data) {
                            if (data != null) {
                                rawData = jQuery.parseJSON(data);
                                if (rawData.status != 'failed') {
                                    let totalAmmont = populateDataInTable(rawData);
                                    $('#totalAmmount').html(totalAmmont);
                                } else {
                                    // show no record found 
                                    let html = `
                                    <div style="margin-top: 150px;">
                                        <img src="src/img/group4.png" alt="" style="margin:auto">
                                        <p style="text-transform:uppercase;text-align:center">No Results Found</p>
                                        <p style="text-align: center;">Try modifying your keywords</p>
                                    </div>`;
                                    $('#expenseTableList').html(html);
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
                let voucherID = $(this).children().toArray()[4].innerHTML;
                window.location.href = `/smartClinicSystem/editExpense.php?id=${voucherID}`;
            });
        });
    </script>
    <!-- delete modal here -->
    <div id="modal2" class="modal pdl">
        <div class="modal-wrap">
            <div class="modalContent2">
                <form style="margin-top: 7px;">
                    <div style="text-align: center;margin-top: 25px;">
                        <p class="label-modal2">Are you sure to delete?</label>
                            <div class="form-div-modal2">
                                <button class="modalBtn2" id="deleteExpense">Yes</button>
                                <button class="modalBtn2">No</button>
                            </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- delete modal till here -->
    <!-- print modal 1 here  0/1 -->
    <div id="modal1" class="modal pdl">
        <div class="modal-wrap">
            <div class="modalContent1">
                <form style="margin-top: 7px;">
                    <div class="form-div-modal">
                        <label for="sid" class="label-modal">Starting Account</label>
                        <select name="sid" id="sid" class="inp-modal">
                            <option value="">JA000906000</option>
                        </select>
                    </div>
                    <div class="form-div-modal">
                        <label for="eid" class="label-modal">Ending Account</label>
                        <select name="eid" id="eid" class="inp-modal">
                            <option value="">JA000906000</option>
                        </select>
                    </div>
                    <div class="form-div-modal">
                        <label for="from" class="label-modal">Starting Date</label>
                        <span>
                            <input type="text" id="from" class="inp-modal datepicker-here" data-language="en"><i class="far fa-calendar-alt" style="font-size: 12;"></i>
                        </span>
                    </div>
                    <div class="form-div-modal">
                        <label for="to" class="label-modal">Ending Date</label>
                        <span>
                            <input type="text" id="to" class="inp-modal datepicker-here" data-language="en"><i class="far fa-calendar-alt" style="font-size: 12;"></i>
                        </span>
                    </div>
                </form>
                <div class="text-center">
                    <button class="modalBtn" type="submit">PRINT</button>
                </div>
            </div>
        </div>
    </div>
    <!-- print modal 1 till here 1/1 -->
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