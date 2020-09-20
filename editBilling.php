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
    <link rel="stylesheet" href="styles/billing-form.css">

    <script src="https://kit.fontawesome.com/d814c57d3c.js" crossorigin="anonymous"></script>
    <script src="https://secure.exportkit.com/cdn/js/ek_googlefonts.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="styles/datepicker.min.css" rel="stylesheet" type="text/css">
    <script src="src/js/datepicker.min.js"></script>
    <!-- Include English language -->
    <script src="src/js/i18n/datepicker.en.js"></script>
    <!-- <script type="text/javascript" src="timepicker/jquery-1.11.3.min.js"></script> -->
    <link rel="stylesheet" href="src/timepicker/stylesheets/wickedpicker.css">
    <script type="text/javascript" src="src/timepicker/src/wickedpicker.js"></script>

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
                <h1>BILLING</h1>
            </div>
            <!--<a href="#" onclick="show('modal3')">
                <i class="cl-icon fas fa-times-circle" aria-hidden="true"></i>
            </a>-->

            <div class="all-content ">
                <div class="cl-btn" onclick="show('modal3')">
                    <i class="fas fa-times-circle"></i>
                </div>

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
                <!-- save modal here -->
                <div id="modal3" class="modal pdl">
                    <div class="modal-wrap">
                        <div class="modalContent3">
                            <form style="margin-top: 7px;">
                                <div style="text-align: center;margin-top: 25px;">
                                    <p class="label-modal3">Want to save the changes made?</label>
                                        <div class="form-div-modal3">
                                            <button class="modalBtn3" type="button" id="makeBilling">Yes</button>
                                            <button class="modalBtn3" type="button">No</button>
                                        </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- save modal till here -->
                <div class="scroll-form table-wrapper-scroll-y">
                    <div class="bill-forms">
                        <form class="form1">
                            <div class="top-rows">
                                <label for="receipt-no">Receipt No</label>
                                <select type="text" name="receiptNo" id="receiptNo" disabled>
                                    <?php $staff->getAllReceiptNo() ?>
                                </select>
                            </div>
                            <div class="top-rows">
                                <label for="patientID">Patient ID</label>
                                <input type="text" name="patientID" id="patientID" disabled>
                            </div>
                            <div class="top-rows">
                                <label for="name">Name</label>
                                <input disabled style="background:rgba(255, 255, 255, 0.233);border:solid 1px rgba(255, 255, 255, 0);" type="text" name="name" id="name" placeholder="xxxxx">
                            </div>

                            <div class="top-rows">
                                <label for="mydate">Issue Date</label>
                                <input disabled type="text" name="mydate" id="mydate" class="datepicker-here" data-language='en'>
                                <i style="color:#707070;position:relative;right:24px;top:13px;font-size:18px" class="far fa-calendar-alt" aria-hidden="true"></i>
                            </div>
                            <div class="top-rows">
                                <label for="mytime">Issue Time</label>
                                <input disabled type="text" name="mytime" id="mytime" class="timepicker" id="timepicker">
                                <i style="color:#707070;position:relative;right:24px;top:13px;font-size:18px;" class="fa fa-clock-o" aria-hidden="true"></i>
                            </div>
                            <div class="form1-rowlast">
                                <label for="Pstatus">Payment <br> Status</label>
                                <select type="text" name="Pstatus" id="Pstatus">
                                    <option value="Un-Paid">Unpaid</option>
                                    <option value="Paid">Paid</option>
                                </select>
                            </div>
                        </form>
                        <form class="form2">
                            <div class="form2-heading">
                                <div class="head-col1"><span>Description</span></div>
                                <div class="head-col2"><span>Amount (RM)</span></div>
                            </div>
                            <hr>
                            <div class="form2-rows">
                                <label>Consultation</label>
                                <input type="number" name="consultation" id="consultation" min="0" step=".01" required>
                            </div>
                            <div class="form2-rows">
                                <label>Treatment</label>
                                <input type="number" name="treatment" id="treatment" min="0" step=".01" required>
                            </div>
                            <div class="form2-rows">
                                <label>Medication</label>
                                <input type="number" name="medication" id="medication" min="0" step=".01" required>
                            </div>
                            <div class="form2-rows">
                                <label>Discount</label>
                                <input type="number" name="discount" id="discount" min="0" step=".01" placeholder="percentage" required>
                            </div>
                            <div class="form2-rows">
                                <label class="total-label">Total</label>
                                <input type="number" name="totalAmount" id="totalAmount" min="0" step=".01">
                            </div>
                            <div class="button-display" onclick="show('modal7')">
                                <input type="button" class="btn-pay" value="PAY NOW">
                            </div>

                        </form>



                    </div>
                </div>

                <div class="footer">
                    <div class="footer-div">
                        <div class="icons-div">
                            <div class="icons" onclick="show('modal3')">
                                <img src="src/img/save-file-option.png" alt="save">
                            </div>
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

    <!-- Backend Integration -->
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

            // setting all the values 
            var value = getUrlVars()["id"];
            if (value) {
                $.post('byCMkGnmDa3mXlyfgPh/api/editBillingScript.php', {
                    value
                }, function(data) {
                    if (data != null) {
                        var results = jQuery.parseJSON(data);
                        console.log(results);
                        $('#receiptNo').val(results[0].receiptNo);
                        $('#mydate').val(results[0].date);
                        $('#mytime').val(results[0].time);
                        $('#Pstatus').val(results[0].status);
                        $('#consultation').val(results[0].consultation);
                        $('#treatment').val(results[0].treatment);
                        $('#medication').val(results[0].medication);
                        $('#discount').val(results[0].discount);
                        $('#totalAmount').val(results[0].totalAmount);
                        $('#patientID').val(results[1]);
                        $('#name').val(results[2]);
                    }
                });
            }


            let totalAmmount = 0;
            // calcuating the values 
            $('#consultation,#treatment,#medication,#discount').change(function() {
                var consultation = parseFloat($('#consultation').val());
                var treatment = parseFloat($('#treatment').val());
                var medication = parseFloat($('#medication').val());
                var discountRate = parseFloat($('#discount').val());
                discountRate = (discountRate / 100);
                var discount = parseFloat((consultation + treatment + medication) * discountRate);
                totalAmmount = consultation + treatment + medication - discount;
                $('#totalAmount').val(totalAmmount.toFixed(2));
            });


            // submitting the form 
            $('#makeBilling').click(function() {
                let recNo = $('#receiptNo').val();
                let total = $('#totalAmount').val();
                if (recNo && total) {
                    $.post('byCMkGnmDa3mXlyfgPh/billing_module/editBilling.php', {
                        id : value,
                        status: $('#Pstatus').val(),
                        consultation: $('#consultation').val(),
                        treatment: $('#treatment').val(),
                        medication: $('#medication').val(),
                        discount: $('#discount').val(),
                        totalAmount: $('#totalAmount').val()
                    }, function(data) {
                        if (data != null) {
                            var results = jQuery.parseJSON(data);
                            if (results.status == 'success') {
                                window.location.replace("./billing(PAGE).php");
                            } else if (results.status == 'failed') {
                                alert("Failed to add the billing. Please try again later or if the problem is persistent contact the company");
                                window.location.replace("./billing(PAGE).php");
                            } else {
                                alert("No Data Found");
                                window.location.replace("./billing(PAGE).php");
                            }
                        }
                    });
                } else {
                    alert('Please Fill in all the Related Field');
                }
            });

        });
    </script>


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
    <script src="src/js/billing-form.js"></script>
    <script type="text/javascript">
        $('.timepicker').wickedpicker();
    </script>

    <script src="src/js/layout.js"></script>

    <!-- billing modal here  0/1 -->
    <div id="modal7" class="modal pdl">
        <div class="modal-wrap">
            <div class="modalContent7">
                <form style="margin-top: 7px;">
                    <div class="form-div-modal7">
                        <input type="radio" name="payMode" id="cash" class="inp-radio7">
                        <label for="cash" class="label-modal7">Cash</label>
                    </div>
                    <div class="form-div-modal7">
                        <input type="radio" name="payMode" id="fpx" class="inp-radio7">
                        <label for="fpx" class="label-modal7">FPX</label>
                    </div>
                    <div class="form-div-modal7">
                        <input type="radio" name="payMode" id="card" class="inp-radio7">
                        <label for="card" class="label-modal7">Credit / Debit Card</label>
                    </div>
                </form>
                <div class="text-center">
                    <button class="modalBtn7" type="submit">Submit</button>
                </div>
            </div>
        </div>
    </div>
    <!-- billing modal till here 1/1 -->
</body>


</html>