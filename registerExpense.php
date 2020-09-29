<?php
require_once 'byCMkGnmDa3mXlyfgPh/core/init.php';
$staff = new Staff;
$user = new User;
$clinic = new ClinicDB;
$id = new ID;
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
            <div class="foot-wrap">
                <div class="head">
                    <h1>REGISTER EXPENSES</h1>
                </div>
                <div>
                    <div class="form-container-wrapper" id="main-wrap">

                        <div class="form-container">
                            <a>
                                <i class="cl-icon fas fa-times-circle" aria-hidden="true" onclick="show('modal3')"></i>
                            </a>
                            <form class="expenses-form" method="POST" action="/smartClinicSystem/byCMkGnmDa3mXlyfgPh/expense_module/editExpense.php">
                                <div>
                                    <label for="voucher">Voucher No</label>
                                    <input style="width: 150px;" type="text" name="voucherNo" id="voucherNo">
                                </div>
                                <div>
                                    <label for="account">Account Code</label>
                                    <select style="width: 150px;" type="text" name="accountCode" id="accountCode">
                                        <?php $staff->getAllAccountCode(); ?>
                                    </select>
                                </div>
                                <div>
                                    <label for="accountName">Account Name</label>
                                    <input style="width: 380px;" class="inp-wid" type="text" name="accountName" id="accountName">
                                </div>

                                <div class="date">
                                    <label for="Date">Date</label>
                                    <span>
                                        <input style="width: 160px;" type="date" id="mydate" name="date" data-language="en" required>
                                        <i style="position: relative; right: 32px;" class="far fa-calendar-alt" aria-hidden="true"></i>
                                    </span>
                                </div>

                                <div>
                                    <label for="amount">Amount (RM)</label>
                                    <input style="width: 150px;" step="0.01" type="text" name="ammount" id="ammount" onchange="amountPricing('ammount')" placeholder="0.00">
                                </div>
                                <div>
                                    <label for="particulationA">Particulars</label>
                                    <input style="width: 380px;" class="inp-wid" type="text" name="particulationA" id="particulationA">
                                </div>


                                <input id="inreg-submit" name="register" type="submit" value="EDIT" />
                                <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
                            </form>
                        </div>

                    </div>


                </div>
                <div class="footer">
                    <div class="footer-div">
                        <div class="icons-div">
                            <div class="icons">
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

    <!-- Backend Intergation -->
    <!-- Mohammad Yeasin Al Fahad -->
    <!-- 20/09/2020 -->
    <script>
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

            // getting the expense values
            let value = getUrlVars()["id"];
            if (value) {
                $('#voucherNo').val(value);
                $.post('byCMkGnmDa3mXlyfgPh/api/expenseScript.php', {
                    value: value,
                    status: "edit"
                }, function(data) {
                    if (data != null) {
                        var results = jQuery.parseJSON(data);
                        $('#accountCode').val(results.accountCode);
                        $('#accountName').val(results.names);
                        $('#mydate').val(results.date);
                        $('#ammount').val(results.ammount);
                        $('#particulationA').val(results.particulation);
                    }
                });
            }

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
        document.getElementById("main-wrap").classList.toggle("widthChange");
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

    function amountPricing(id) {
        var num = document.getElementById(id);
        if (isNaN(num.value)) {
            num.value = "";
            alert("Only numbers")
        } else {
            var n = Number(num.value).toFixed(2);
            document.getElementById(id).value = n;
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