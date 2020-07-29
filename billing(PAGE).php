<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Clinic Name</title>
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
                    <a href="#" class="searching-button"><img class="nav-icon" src="src/img/magnify-glass.svg"
                            alt="" /></a>

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
            <a href="appointment.php"><img src="src/img/appointment-icon.svg" alt="" />
                <div class="small_sidebar">Appointments</div>
            </a>
            <a href="diagnostic(PAGE).php"><img src="src/img/diagnostic.svg" alt="" />
                <div class="small_sidebar"> Diagnostic Report</div>
            </a>
            <a href="billing(PAGE).php" class="nav-active"><img src="src/img/finance.svg" alt="" />
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
                <h1 style="text-transform: uppercase;">Billing</h1>
            </div>

            <div style="width: 100%; max-width: 1050px;">
                <div class="tabl">
                    <div class="table-nav">
                        <div class="flex" style="margin-top: 5px;width: 100%;">
                            <div class="flex" style="max-width: 190px;" id="div_1">
                                <div class="status" id="dpdwn1">
                                    <label for="status" style="margin-left: 3px;">Status</label>
                                    <select name="status" class="status_dpdwn" id="status">
                                        <option value="Today">Today</option>
                                        <option value="This week">This week</option>
                                        <option value="This month">This month</option>
                                    </select>
                                </div>
                                <div class="status">
                                    <label for="show" style="margin-left: 3px;">Show</label>
                                    <select name="show" class="status_dpdwn status_dpdwn2" id="show">
                                        <option value="All">All</option>
                                        <option value="Paid">Paid</option>
                                        <option value="Unpaid">Unpaid</option>
                                    </select>
                                </div>
                            </div>

                            <div style="margin-right:10px;display: flex;flex-grow: 1;" id="from-todiv">
                                <div>
                                    <label for="from">From</label>
                                    <span>
                                        <input type="text" id="tacky" class="datepicker-here" data-language='en'>
                                        <i class="far fa-calendar-alt" style="font-size: 13px;"></i> </span>
                                </div>
                                <div>
                                    <label for="to">To</label>
                                    <span>
                                        <input type="text" id="tacky" class="datepicker-here ml-inp" data-language='en'>
                                        <i class="far fa-calendar-alt" style="font-size: 13px;"></i> </span>
                                </div>
                            </div>
                            <div style="display: flex;" id="big-div-tnav">
                                <div style="margin-right:10px">
                                    <label for="sid">Starting Vendor Code</label>
                                    <select name="sid" id="sid">
                                        <option value="">Test</option>
                                    </select>
                                </div>
                                <div id="bdt-div">
                                    <label for="eid">Ending Vendor Code</label>
                                    <select name="eid" id="esid">
                                        <option value="">Test</option>
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
                            <tbody style="max-height: calc(100vh - 380px);min-height: 200px;"
                                class="table-wrapper-scroll-y">
                                <tr>
                                    <td style="width:50px;border-left: none;">1</td>
                                    <td style="width:100px">1/3/2020</td>
                                    <td style="width:160px">Cell</td>
                                    <td style="width:370px">John Doe</td>
                                    <td style="width:120px">Cell</td>
                                    <td style="width:110px">100.00</td>
                                    <td style=" width:108px;border-right:none">Cell</td>

                                </tr>
                                <tr>
                                    <td style="border-left: none;">1</td>
                                    <td>1/3/2020</td>
                                    <td>Cell</td>
                                    <td>John Doe</td>
                                    <td>Cell</td>
                                    <td>100.00</td>
                                    <td style="border-right:none">Cell</td>
                                </tr>
                                <tr>
                                    <td style="border-left: none;">1</td>
                                    <td>1/3/2020</td>
                                    <td>Cell</td>
                                    <td>John Doe</td>
                                    <td>Cell</td>
                                    <td>100.00</td>
                                    <td style="border-right:none">Cell</td>
                                </tr>
                                <tr>
                                    <td style="border-left: none;">1</td>
                                    <td>1/3/2020</td>
                                    <td>Cell</td>
                                    <td>John Doe</td>
                                    <td>Cell</td>
                                    <td>100.00</td>
                                    <td style="border-right:none">Cell</td>
                                </tr>
                                <tr>
                                    <td style="border-left: none;">1</td>
                                    <td>1/3/2020</td>
                                    <td>Cell</td>
                                    <td>John Doe</td>
                                    <td>Cell</td>
                                    <td>100.00</td>
                                    <td style="border-right:none">Cell</td>
                                </tr>
                                <tr>
                                    <td style="border-left: none;">1</td>
                                    <td>1/3/2020</td>
                                    <td>Cell</td>
                                    <td>John Doe</td>
                                    <td>Cell</td>
                                    <td>100.00</td>
                                    <td style="border-right:none">Cell</td>
                                </tr>
                                <tr>
                                    <td style="border-left: none;">1</td>
                                    <td>1/3/2020</td>
                                    <td>Cell</td>
                                    <td>John Doe</td>
                                    <td>Cell</td>
                                    <td>100.00</td>
                                    <td style="border-right:none">Cell</td>
                                </tr>
                                <tr>
                                    <td style="border-left: none;">1</td>
                                    <td>1/3/2020</td>
                                    <td>Cell</td>
                                    <td>John Doe</td>
                                    <td>Cell</td>
                                    <td>100.00</td>
                                    <td style="border-right:none">Cell</td>
                                </tr>
                                <tr>
                                    <td style="border-left: none;">1</td>
                                    <td>1/3/2020</td>
                                    <td>Cell</td>
                                    <td>John Doe</td>
                                    <td>Cell</td>
                                    <td>100.00</td>
                                    <td style="border-right:none">Cell</td>
                                </tr>
                                <tr>
                                    <td style="border-left: none;">1</td>
                                    <td>1/3/2020</td>
                                    <td>Cell</td>
                                    <td>John Doe</td>
                                    <td>Cell</td>
                                    <td>100.00</td>
                                    <td style="border-right:none">Cell</td>
                                </tr>
                                <tr>
                                    <td style="border-left: none;">1</td>
                                    <td>1/3/2020</td>
                                    <td>Cell</td>
                                    <td>John Doe</td>
                                    <td>Cell</td>
                                    <td>100.00</td>
                                    <td style="border-right:none">Cell</td>
                                </tr>
                                <tr>
                                    <td style="border-left: none;">1</td>
                                    <td>1/3/2020</td>
                                    <td>Cell</td>
                                    <td>John Doe</td>
                                    <td>Cell</td>
                                    <td>100.00</td>
                                    <td style="border-right:none">Cell</td>
                                </tr>
                                <tr>
                                    <td style="border-left: none;">1</td>
                                    <td>1/3/2020</td>
                                    <td>Cell</td>
                                    <td>John Doe</td>
                                    <td>Cell</td>
                                    <td>100.00</td>
                                    <td style="border-right:none">Cell</td>
                                </tr>


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
                                RM <strong style="padding-left:10px">100.00</strong>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer">
                    <div class="footer-div">
                        <div class="icons-div">
                            <div class="icons">
                                <a href="billing-form(PAGE).php"> <i class="fas fa-plus"></i></a>
                               
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


    <!-- ______________________________________________________________________________________________________________________ -->
    <!-- delete modal here -->
    <div id="modal2" class="modal pdl">
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
    <!-- delete modal till here -->

    <!-- print modal 4 here  0/1 -->
    <div id="modal6" class="modal pdl">
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
                        <input type="radio" name="date" id="date" class="inp-radio"
                            oninput="toggleDiv('category_1','category_2')">
                        <label for="date" style="width: fit-content;">Date</label>
                    </div>
                    <div class="form-div-div-modal6">
                        <input type="radio" name="date" id="date" class="inp-radio"
                            oninput="toggleDiv('category_2','category_1')">
                        <label for="date">Patient</label>
                    </div>
                </div>
            </form>
            <div class="text-center">
                <button class="modalBtn6" type="submit">PRINT</button>
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
    window.onclick = function (event) {
        var ele = document.getElementsByClassName("modal");
        for (var i = 0; i < ele.length; i++) {
            if (event.target == ele[i]) {
                ele[i].style.display = "none";
            }
        }
    }

</script>

<script src="src/js/layout.js"></script>