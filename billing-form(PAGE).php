<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Clinic Name</title>
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
                    <a href="#" class="searching-button"><img class="nav-icon" src="src/img/magnify-glass.svg"
                            alt="" /></a>

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
                                    <button class="modalBtn3" type="submit">Yes</button>
                                    <button class="modalBtn3" type="submit">No</button>
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
                                <select type="text" name="receipt-no">
                                    <option value="1">0001</option>
                                    <option value="1">0001</option>
                                    <option value="1">0001</option>
                                    <option value="1">0001</option>
                                </select>
                            </div>
                            <div class="top-rows">
                                <label for="patient-id">Patient ID</label>
                                <input type="text" name="patient-id">
                            </div>
                            <div class="top-rows">
                                <label for="bill-name">Name</label>
                                <input
                                    style="background:rgba(255, 255, 255, 0.233);border:solid 1px rgba(255, 255, 255, 0);"
                                    type="text" name="bill-name" placeholder="xxxxx">
                            </div>

                            <div class="top-rows">
                                <label for="issue-date">Issue Date</label>
                                <input type="text" name="issue-date" class="datepicker-here" data-language='en'>
                                <i style="color:#707070;position:relative;right:24px;top:13px;font-size:18px"
                                    class="far fa-calendar-alt" aria-hidden="true"></i>
                            </div>
                            <div class="top-rows">
                                <label for="issue-time">Issue Time</label>
                                <input type="text" name="issue-time" class="timepicker" id="timepicker">
                                <i style="color:#707070;position:relative;right:24px;top:13px;font-size:18px;"
                                    class="fa fa-clock-o" aria-hidden="true"></i>
                            </div>
                            <div class="form1-rowlast">
                                <label for="payment-status">Payment <br> Status</label>
                                <select type="text" name="payment-status">
                                    <option value="Unpaid">Unpaid</option>
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
                                <input type="text" id="blank1" onchange="changedinput1()">
                            </div>
                            <div class="form2-rows">
                                <label>Treatment</label>
                                <input type="text" id="blank2" onchange="changedinput2()">
                            </div>
                            <div class="form2-rows">
                                <label>Medication</label>
                                <input type="text" id="blank3" onchange="changedinput3()">
                            </div>
                            <div class="form2-rows">
                                <label>Discount</label>
                                <input type="text" id="blank4" onchange="changedinput4()">
                            </div>
                            <div class="form2-rows">
                                <label class="total-label">Total</label>
                                <input style="border: solid 1px red;" class="total-input" type="text" id="blank5"
                                    readonly>
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
        window.onclick = function (event) {
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