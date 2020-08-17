<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Clinic Name</title>
    <link rel="stylesheet" href="styles/layout.css" />
    <link rel="stylesheet" href="styles/footer.css">
    <link rel="stylesheet" href="styles/inventory_m.css">
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
            <a href="billing(PAGE).php"><img src="src/img/finance.svg" alt="" />
                <div class="small_sidebar">Billing</div>
            </a>
            <a href="expenses(PAGE).php"><img src="src/img/prescription.svg" alt="" />
                <div class="small_sidebar">Expenses</div>
            </a>
            <a href="inventory (PAGE).php"  class="nav-active"><img src="src/img/inventory.svg" alt="" />
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
                <h1>INVENTORY</h1>
            </div>

            <div style="width: 100%; max-width: 1020px;">
                <div class="tabl">


                    <div class="table-nav">
                        <div style="display: flex;">
                            <div class="tablenav-indiv">
                                <label for="sid">Starting Item Code</label>
                                <select name="sid" id="sid">
                                    <option value="">Test</option>
                                </select>
                            </div>
                            <div>
                                <label style="margin-left:20px;" class="ml-0" for="eid">Ending Item
                                    Code</label>
                                <select name="eid" id="esid">
                                    <option value="">Test</option>
                                </select>
                            </div>
                        </div>
                        <div>
                            <a href="purchase_order_table (PAGE).php" style="text-decoration: none;"> <div class="purchase-button" style="color: #444242;">
                                PURCHASE ORDER
                            </div></a>
                           
                        </div>
                    </div>



                    <div class="table-wrapper-scroll-y" style="overflow-y: hidden;">




                        <table class="table" style="max-width: 1020px; min-width: 1020px;">
                            <thead>
                                <tr>
                                    <th style="width:50px;border-left: none;">No</th>
                                    <th style="width:130px">ITEM CODE <i class="fas fa-sort"></i></th>
                                    <th style="width:470px">ITEM NAME <i class="fas fa-sort"></i></th>
                                    <th style="width:180px">EXPIRY DATE <i class="fas fa-sort"></i></th>
                                    <th style="width: 150px; padding-left: 20px; border-right: none;">STOCK (UNIT)<i
                                            class="fas fa-sort"></i></th>

                                </tr>
                            </thead>
                            <tbody style="max-height: calc(100vh - 310px);min-height: 200px;"
                                class="table-wrapper-scroll-y">
                                <tr>
                                    <td style="width:50px;border-left: none;">1</td>
                                    <td style="width:130px">Cell</td>
                                    <td style="width:470px">Cell</td>
                                    <td style="width:180px">1/3/2020</td>
                                    <td style=" width:164px;border-right:none">Cell</td>
                                </tr>
                                <tr>
                                    <td style="border-left: none;">1</td>
                                    <td>Cell</td>
                                    <td>Cell</td>
                                    <td>1/3/2020</td>
                                    <td style="border-right:none">Cell</td>
                                </tr>
                                <tr>
                                    <td style="border-left: none;">1</td>
                                    <td>Cell</td>
                                    <td>Cell</td>
                                    <td>1/3/2020</td>
                                    <td style="border-right:none">Cell</td>
                                </tr>
                                <tr>
                                    <td style="border-left: none;">1</td>
                                    <td>Cell</td>
                                    <td>Cell</td>
                                    <td>1/3/2020</td>
                                    <td style="border-right:none">Cell</td>
                                </tr>
                                <tr>
                                    <td style="border-left: none;">1</td>
                                    <td>Cell</td>
                                    <td>Cell</td>
                                    <td>1/3/2020</td>
                                    <td style="border-right:none">Cell</td>
                                </tr>
                                <tr>
                                    <td style="border-left: none;">1</td>
                                    <td>Cell</td>
                                    <td>Cell</td>
                                    <td>1/3/2020</td>
                                    <td style="border-right:none">Cell</td>
                                </tr>
                                <tr>
                                    <td style="border-left: none;">1</td>
                                    <td>Cell</td>
                                    <td>Cell</td>
                                    <td>1/3/2020</td>
                                    <td style="border-right:none">Cell</td>
                                </tr>
                                <tr>
                                    <td style="border-left: none;">1</td>
                                    <td>Cell</td>
                                    <td>Cell</td>
                                    <td>1/3/2020</td>
                                    <td style="border-right:none">Cell</td>
                                </tr>
                                <tr>
                                    <td style="border-left: none;">1</td>
                                    <td>Cell</td>
                                    <td>Cell</td>
                                    <td>1/3/2020</td>
                                    <td style="border-right:none">Cell</td>
                                </tr>
                                <tr>
                                    <td style="border-left: none;">1</td>
                                    <td>Cell</td>
                                    <td>Cell</td>
                                    <td>1/3/2020</td>
                                    <td style="border-right:none">Cell</td>
                                </tr>
                                <tr>
                                    <td style="border-left: none;">1</td>
                                    <td>Cell</td>
                                    <td>Cell</td>
                                    <td>1/3/2020</td>
                                    <td style="border-right:none">Cell</td>
                                </tr>
                                <tr>
                                    <td style="border-left: none;">1</td>
                                    <td>Cell</td>
                                    <td>Cell</td>
                                    <td>1/3/2020</td>
                                    <td style="border-right:none">Cell</td>
                                </tr>
                                <tr>
                                    <td style="border-left: none;">1</td>
                                    <td>Cell</td>
                                    <td>Cell</td>
                                    <td>1/3/2020</td>
                                    <td style="border-right:none">Cell</td>
                                </tr>
                                <tr>
                                    <td style="border-left: none;">1</td>
                                    <td>Cell</td>
                                    <td>Cell</td>
                                    <td>1/3/2020</td>
                                    <td style="border-right:none">Cell</td>
                                </tr>
                                <tr>
                                    <td style="border-left: none;">1</td>
                                    <td>Cell</td>
                                    <td>Cell</td>
                                    <td>1/3/2020</td>
                                    <td style="border-right:none">Cell</td>
                                </tr>

                            </tbody>
                        </table>

                    </div>

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
                <!-- print modal 6 here  0/1 -->
                <div id="modal9" class="modal pdl">
                <div class="modal-wrap">
                    <div class="modalContent9">
                        <form style="margin-top: 7px;">
                            <div class="form-div-modal9">
                                <label for="sid" class="label-modal9">Starting Item Code</label>
                                <select name="sid" id="sid" class="inp-modal9">
                                    <option value="">00906000</option>
                                </select>
                            </div>
                            <div class="form-div-modal9">
                                <label for="eid" class="label-modal9">Ending Item Code</label>
                                <select name="eid" id="eid" class="inp-modal9">
                                    <option value="">00906000</option>
                                </select>
                            </div>
                        </form>
                        <div class="text-center">
                            <button class="modalBtn9" type="submit">PRINT</button>
                        </div>
                    </div>
                </div>
                </div>
                <!-- print modal 6 till here 1/1 -->
                <!-- barcode modal here -->
                <div id="modal10" class="modal pdl">
                <div class="modal-wrap">
                    <div class="modalContent10">
                        <form style="margin-top: 7px;">
                            <div style="text-align: center;margin-top: 25px;">
                                <p class="label-modal10">Scan Bar Code</label>
                                <div class="form-div-modal10">
                                    <input type="text" class="inp-modal10">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                </div>
                <!-- barcode modal till here -->


                <div class="footer">
                    <a href="inventory-patients(PAGE).php" style="text-decoration: none;"><div class="icons" style="background-color: #a3a3a3;">
                        <i class="fa fa-smile-o" style="color: #444242;" aria-hidden="true"></i>
                    </div></a>
                    
                    <div class="footer-scan" onclick="show('modal10')">
                        SCAN BARCODE
                    </div>
                    <div class="footer-div">
                        <div class="icons-div">
                            <div class="icons">
                                <a href="inventory_form (PAGE).php" style="text-decoration: none;">  <i class="fas fa-plus" style="color: #444242;"></i></a>
                            </div>
                            <div class="icons" onclick="show('modal9')">
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
    window.onclick = function (event) {
        var ele = document.getElementsByClassName("modal");
        for (var i = 0; i < ele.length; i++) {
            if (event.target == ele[i]) {
                ele[i].style.display = "none";
            }
        }
    }
</script>