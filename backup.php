<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Clinic Name</title>
    <link rel="stylesheet" href="styles/layout.css" />
    <link rel="stylesheet" href="styles/backup.css">
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
                        <br />
                        <input type="radio" id="search-by-name" name="src" />
                        <label for="search-by-name">Search by NRIC/Passport</label>
                    </div>
                </div>
            </div>

            <div class="nav-images">
                <div class="dropdown-user1">
                    <a href="#" class="nav-logos"><img src="src/img/settings.png" alt="" /></a>
                    <div class="dropdown-content3">
                        <a href="settings(PAGE).html">Settings</a>
                        <a href="report_bug.html">Report Bug</a>
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
                        <a href="my-profile(PAGE).html">My Profile</a>
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
            <a href="dashboard(PAGE).html"><img src="src/img/home.png" />
                <div class="small_sidebar">Dashboard</div>
            </a>
            <a href="patients(PAGE).html"><img src="src/img/patient.svg" />
                <div class="small_sidebar">Patients</div>
            </a>
            <a href="appointment.html"><img src="src/img/appointment-icon.svg" alt="" />
                <div class="small_sidebar">Appointments</div>
            </a>
            <a href="diagnostic(PAGE).html" ><img src="src/img/diagnostic.svg" alt="" />
                <div class="small_sidebar"> Diagnostic Report</div>
            </a>
            <a href="billing(PAGE).html"><img src="src/img/finance.svg" alt="" />
                <div class="small_sidebar">Billing</div>
            </a>
            <a href="expenses(PAGE).html"><img src="src/img/prescription.svg" alt="" />
                <div class="small_sidebar">Expenses</div>
            </a>
            <a href="inventory (PAGE).html"><img src="src/img/inventory.svg" alt="" />
                <div class="small_sidebar">Inventory</div>
            </a>
            <a href="medical-cert(PAGE).html"><img src="src/img/mc.svg" alt="" />
                <div class="small_sidebar">Medical Certificate</div>
            </a>
            <a href="financial-report(PAGE).html"><img src="src/img/cash.svg" alt="" />
                <div class="small_sidebar">Finance Reports</div>
            </a>
            <a href="backup.html" class="nav-active"><img src="src/img/settings-tools.svg" alt="" />
                <div class="small_sidebar">Backup & Table Setup</div>
            </a>
        </div>
        <!-- structure changed a bit by yash-->
        <div class="main">
            <div class="head">
                <h1>backup & table setup</h1>
            </div>
            <div class="buttons">
                <div style="display: flex;">
                    <div class="backup">
                        <button id="backupBtn" class="button backupbutton">Backup</button>
                        <div id="backupMenu" class="dropdown-contentbackup displaynone"
                            style="width:178px; margin-right:15px;">
                            <a href="#">Data Recovery</a>
                            <a id="lockItem">Lock Period</a>
                            <a id="backupItem">Backup Data</a>
                            <a id="restoreItem">Restore Data</a>
                        </div>
                    </div>
    
                    <!-- lock box start -->
                    <div id="lockModal" class="modal">
    
    
                        <div class="doctor-content1">
                            <form>
                                <p style="margin-left: 7vw; font-weight: bold;">LOCK PERIOD</p>
                                <ul class="modal-outer">
                                    <li id="lockMonth">
                                        <label class="col-4 text-left first" for="month">Month</label>
                                        <select id="month">
                                            <option value="1" selected>January</option>
                                            <option value="2">February</option>
                                            <option value="3">March</option>
                                            <option value="4">April</option>
                                            <option value="5">May</option>
                                            <option value="6">June</option>
                                            <option value="7">July</option>
                                            <option value="8">August</option>
                                            <option value="9">September</option>
                                            <option value="10">October</option>
                                            <option value="11">November</option>
                                            <option value="12">December</option>
                                        </select>
                                    </li>
                                    <li id="lockQuarterly">
                                        <label class="col-4 text-left first" for="quarterl">Quarterly</label>
                                        <select id="quarterl">
                                            <option value="1" selected>January-March</option>
                                            <option value="4">April-June</option>
                                            <option value="7">July-September</option>
                                            <option value="10">October-December</option>
                                        </select>
                                    </li>
                                    <li id="lockYear">
                                        <label class="col-4 text-left first" for="year">Year</label>
                                        <select id="year">
                                            <option value="2020">2020</option>
                                        </select>
                                    </li>
                                </ul>
                                <div class="d-flex justify-content-center">
                                    <input type="radio" name="twoChoose" id="lockMBtn" checked>
                                    <label for="month" class="mr-1">Monthly</label>
                                    <input type="radio" name="twoChoose" id="lockQBtn">
                                    <label for="quarterly" class="mr-1">Quarterly</label>
                                    <input type="radio" name="twoChoose" id="lockYBtn">
                                    <label for="yearly" class="mr-1">Yearly</label>
    
                                </div>
    
                            </form>
                            <button class="unlockBtn">Lock / UNLock</button>
    
                        </div>
    
                    </div>
    
                    <!-- lock box end -->
    
    
                    <!-- backup data box start -->
    
                    <div id="backupModal" class="modal">
    
    
                        <div class="doctor-content1">
                            <form>
                                <p style="margin-left: 7vw; font-weight: bold;">BACKUP DATA</p>
                                <div class="justify-content-center text-center">
                                    <img src="src/img/warning.png" alt="">
                                    <p>All users must exit from station before proceeding!</p>
                                </div>
                                <ul class="modal-outer">
                                    <li>
                                        <label class="col-4 text-left first" for="filename">File Name</label>
                                        <input type="text">
                                    </li>
                                    <li>
                                        <label class="col-4 text-left first" for="folder">Folder</label>
                                        <select id="folder">
                                            <option value="1"></option>
    
                                        </select>
                                    </li>
    
                                </ul>
    
    
                            </form>
                            <button>BACKUP</button>
    
                        </div>
    
                    </div>
    
                    <!-- backup data box end -->
    
                    <!-- restore data box start -->
    
                    <div id="restoreModal" class="modal">
    
    
                        <div class="doctor-content1">
                            <form>
                                <p style="margin-left: 7vw; font-weight: bold;">RESTORE DATA</p>
                                <div class="justify-content-center text-center">
                                    <img src="src/img/warning.png" alt="">
                                    <p>All users must exit from station before proceeding!</p>
                                </div>
                                <ul class="modal-outer">
                                    <li>
                                        <label class="col-4 text-left first" for="filename">File Name</label>
                                        <select id="folder">
                                            <option value="1"></option>
    
                                        </select>
                                    </li>
    
                                </ul>
    
    
                            </form>
                            <button>Restore</button>
    
                        </div>
    
                    </div>
    
                    <!-- restore data box end -->
    
    
    
    
                    <div class="doctor">
                        <button id="doctorsBtn" class="button doctorbutton">Doctors</button>
                        <div id="doctorsMenu" class="dropdown-contentdoctor displaynone">
                            <div class="heading-table">
                                <table class="tabledoctor">
                                    <tr>
    
                                        <th style="width: 12vw;">Doctor ID <span class="updown" style="margin-top:5px;">
                                                &#9650;</span>
                                            <span class="updown" style="margin-bottom:7px;">&#9660;</span></th>
                                        <th style="width:45vw;">Name <span class="updown" style="margin-top:5px;">
                                                &#9650;</span> <span class="updown"
                                                style="margin-bottom:7px;">&#9660;</span>
                                        </th>
    
                                    </tr>
                                </table>
    
                            </div>
    
    
                            <div class=" table-responsive table-wrapper-scroll-y table-fix ">
                                <table class=" table ">
    
    
                                    <tbody>
                                        <tr>
    
                                            <td id="col-id" style="width:12.2vw;">Cell</td>
                                            <td id="col-name" style="width:45vw;">John Doe</td>
    
    
                                        </tr>
                                        <tr class="rowTb">
    
                                            <td id="col-id">Cell</td>
                                            <td id="col-name">John Doe</td>
    
                                        </tr>
                                        <tr class="rowTb">
                                            <td id="col-id">Cell</td>
                                            <td id="col-name">John Doe</td>
                                        </tr>
                                        <tr class="rowTb">
                                            <td id="col-id">Cell</td>
                                            <td id="col-name">John Doe</td>
                                        </tr>
                                        <tr class="rowTb">
                                            <td id="col-id">Cell</td>
                                            <td id="col-name">John Doe</td>
                                        </tr>
                                        <tr class="rowTb">
                                            <td id="col-id">Cell</td>
                                            <td id="col-name">John Doe</td>
                                        </tr>
                                        <tr class="rowTb">
                                            <td id="col-id">Cell</td>
                                            <td id="col-name">John Doe</td>
                                        </tr>
                                        <tr class="rowTb">
                                            <td id="col-id">Cell</td>
                                            <td id="col-name">John Doe</td>
                                        </tr>
                                        <tr class="rowTb">
                                            <td id="col-id">Cell</td>
                                            <td id="col-name">John Doe</td>
                                        </tr>
                                        <tr class="rowTb">
                                            <td id="col-id">Cell</td>
                                            <td id="col-name">John Doe</td>
                                        </tr>
                                        <tr class="rowTb">
                                            <td id="col-id">Cell</td>
                                            <td id="col-name">John Doe</td>
                                        </tr>
    
                                    </tbody>
    
    
    
    
    
    
                                </table>
                            </div>
    
                        </div>
                    </div>
    
                    <!-- doctor modal-->
                    <div id="sales" class="modal">
    
    
                        <div class="doctor-content">
                            <p style="margin-left: 14vw; font-weight: bold;">DOCTORS</p>
                            <a href="#" id="closeBtn"><i class="fas fa-times-circle"></i></a>
                            <form>
    
                                <ul class="modal-outer">
                                    <li>
                                        <label for="doctorid">Doctor ID</label>
                                        <select id="doctorid">
                                            <option value=""></option>
                                        </select>
                                    </li>
                                    <li>
                                        <label for="doctorname">Doctor Name</label>
                                        <input type="text" style="width: 18vw;">
                                    </li>
    
                                    <li>
                                        <label for="doctoric">NRIC / Passport</label>
                                        <input type="text">
                                    </li>
    
                                    <li>
                                        <label for="doctorname">MMC Reg No</label>
                                        <input type="text">
                                    </li>
    
                                    <li class="d-flex justify-content-center">
                                        <label for="doctorname" style="margin-right: 7vw;">Gender</label>
                                        <div>
    
                                            <input type="radio" name="male" id="male" style="width: 1vw; height: 1vw; ">
                                            <label for="male" style="margin-right: 9vw; ">Male</label>
    
                                            <input type="radio" name="female" id="female" style="width: 1vw; height: 1vw; ">
                                            <label for="female" id="femalelabel">Female</label>
                                        </div>
    
                                    </li>
    
                                    <li>
                                        <label for="doctorno">Contact</label>
                                        <input type="text">
                                    </li>
    
    
                                </ul>
    
    
                            </form>
                            <button>SUBMIT</button>
    
                        </div>
    
                    </div>
    
                    <!--save modal-->
                    <div id="saveModal">
    
    
                        <div class="saveModal-content">
    
                            <p class="delp">Want to save the changes made?</p>
    
                            <button class="btn" id="btn1">Yes</button>
                            <button class="btn" id="btn2">No</button>
                        </div>
    
                    </div>
    
                    <div class="report">
                        <button id="reportBtn" class="button reportbutton">Diagnostic Report</button>
                        <div id="reportBox" class="dropdown-contentreport displaynone">
                            <div class="d-flex-around">
                                <div class="orderBox">
    
                                    <div class="orderInfo">
                                        <div class="orderTitle">Symptomps</div>
                                        <div class="symptoms">
                                            <p>Nausia</p>
    
                                            <div class="report-change">
                                                <a href=""><i class="fas fa-pen"></i> </a>
    
    
                                                <a href=""><i class="fas fa-trash-alt"></i></a>
                                            </div>
    
                                        </div>
                                        <div class="orderIcon">
                                            <i class="fas fa-plus plusIcon"></i>
                                        </div>
                                    </div>
                                </div>
    
    
                                <div class="orderBox">
    
                                    <div class="orderInfo">
                                        <div class="orderTitle">Diaognosis</div>
                                        <div class="symptoms">
                                            <p>Nausia</p>
    
                                            <div class="report-change">
                                                <a href=""><i class="fas fa-pen"></i> </a>
    
    
                                                <a href=""><i class="fas fa-trash-alt"></i></a>
                                            </div>
    
                                        </div>
                                        <div class="orderIcon">
                                            <i class="fas fa-plus plusIcon"></i>
                                        </div>
                                    </div>
                                </div>
    
                            </div>
    
    
                        </div>
                    </div>
                </div>
                <div style="display: flex;">
                    <div class="expnses">
                        <button class="button" id="expensebtn">Expenses</button>
                        <div id="expenseBox" class="dropdown-contentexpense displaynone">
                            <div class="d-flex">
                                <div class="orderBox">
    
                                    <div class="acinfo">
                                        <div class="orderTitle">ACCOUNT CODE</div>
                                        <div class="ac">
                                            <p style="margin-bottom: 6.6vh;">1000</p>
    
    
    
    
                                        </div>
    
                                    </div>
                                </div>
    
    
                                <div class="orderBox">
    
                                    <div class="acinfo2">
                                        <div class="orderTitle">ACCOUNT NAME</div>
                                        <div class="ac">
                                            <p>Utiliti Bills</p>
    
                                            <div class="report-change">
                                                <a href=""><i class="fas fa-pen"></i> </a>
    
    
                                                <a href=""><i class="fas fa-trash-alt"></i></a>
                                            </div>
    
                                        </div>
                                        <div class="acicon">
                                            <i class="fas fa-plus plusIcon"></i>
                                        </div>
                                    </div>
                                </div>
    
                            </div>
    
    
                        </div>
                    </div>
    
    
                    <div class="inventory">
                        <button id="inventoryBtn" class="button buttoninventory">Inventory</button>
                        <div id="inventoryMenu" class="dropdown-contentinventory displaynone"
                            style="width:178px; margin-right:15px;">
                            <a href="#" id="vendorbtn">Vendor</a>
                            <a href="#" id="barcodebtn">Barcode</a>
    
                        </div>
    
                        <!--vendor-->
                        <div id="vendorMenu" class="dropdown-contentvendor displaynone">
                            <div class="heading-table">
                                <table class="tabledoctor">
                                    <tr>
    
                                        <th style="width: 12vw;">VENDOR CODE<span class="updown" style="margin-top:5px;">
                                                &#9650;</span>
                                            <span class="updown" style="margin-bottom:7px;">&#9660;</span></th>
                                        <th style="width:45vw;">VENDOR NAME <span class="updown" style="margin-top:5px;">
                                                &#9650;</span> <span class="updown"
                                                style="margin-bottom:7px;">&#9660;</span>
                                        </th>
    
                                    </tr>
                                </table>
    
                            </div>
    
    
                            <div class=" table-responsive table-wrapper-scroll-y table-fix ">
                                <table class=" table ">
    
    
                                    <tbody>
                                        <tr class="rowv">
    
                                            <td id="col-id" style="width:12.2vw;">Cell</td>
                                            <td id="col-name" style="width:45vw;">John Doe</td>
    
    
                                        </tr>
                                        <tr class="rowv">
    
                                            <td id="col-id">Cell</td>
                                            <td id="col-name">John Doe</td>
    
                                        </tr>
                                        <tr class="rowv">
                                            <td id="col-id">Cell</td>
                                            <td id="col-name">John Doe</td>
                                        </tr>
                                        <tr class="rowv">
                                            <td id="col-id">Cell</td>
                                            <td id="col-name">John Doe</td>
                                        </tr>
                                        <tr class="rowv">
                                            <td id="col-id">Cell</td>
                                            <td id="col-name">John Doe</td>
                                        </tr>
                                        <tr class="rowv">
                                            <td id="col-id">Cell</td>
                                            <td id="col-name">John Doe</td>
                                        </tr>
                                        <tr class="rowv">
                                            <td id="col-id">Cell</td>
                                            <td id="col-name">John Doe</td>
                                        </tr>
                                        <tr class="rowv">
                                            <td id="col-id">Cell</td>
                                            <td id="col-name">John Doe</td>
                                        </tr>
                                        <tr class="rowv">
                                            <td id="col-id">Cell</td>
                                            <td id="col-name">John Doe</td>
                                        </tr>
                                        <tr class="rowv">
                                            <td id="col-id">Cell</td>
                                            <td id="col-name">John Doe</td>
                                        </tr>
                                        <tr class="rowv">
                                            <td id="col-id">Cell</td>
                                            <td id="col-name">John Doe</td>
                                        </tr>
    
                                    </tbody>
    
    
    
    
    
    
                                </table>
                            </div>
    
                        </div>
    
    
    
                        <!--/vendor-->
    
    
                        <!--vendor modal -->
    
                        <div class="d-flex">
                            <div class="orderBoxvendor displaynone modal" id="vendortablemodal">
    
                                <div class="orderInfovendor">
                                    <div class="orderTitlevendor">Vendor</div>
                                    <div class="orderflex">
                                        <label for="code" class="orderlb">Code</label>
                                        <select name="code" id="code" class="orderFeild w-25">
                                            <option value="1"></option>
                                        </select>
                                    </div>
                                    <div class="orderflex">
                                        <label for="Name" class="orderlb">Name</label>
                                        <input name="Name" id="Name" class="orderFeild w-75" />
                                    </div>
                                    <div class="orderflex">
                                        <label for="Description" class="orderlb">Address</label>
                                        <input name="Description" id="Description" class="orderFeild w-75" />
                                    </div>
                                    <div class="orderflex">
                                        <label for="Description" class="orderlb"></label>
                                        <!--<input name="Description" id="Description" class="orderFeild w-75 ml-6" />-->
                                        <input name="Description" id="Description" class="orderFeild w-75" />
                                    </div>
                                    <div class="orderflex">
                                        <label for="price" class="orderlb">Contact Person</label>
                                        <input type="text" class="orderFeild" id="jsinput">
                                    </div>
                                    <div class="orderflex">
                                        <label for="quantity" class="orderlb">Contact No</label>
                                        <input type="text" class="orderFeild" />
                                    </div>
    
                                    <br>
    
                                </div>
                            </div>
    
                        </div>
    
    
                        <!--vendor modal -->
    
                        <!--barcode-->
                        <div id="barcodeMenu" class="dropdown-contentbarcode displaynone">
                            <div class="heading-table">
                                <table class="tabledoctor">
                                    <tr>
    
                                        <th style="width: 12vw;">ITEM CODE <span class="updown" style="margin-top:5px;">
                                                &#9650;</span>
                                            <span class="updown" style="margin-bottom:7px;">&#9660;</span></th>
                                        <th style="width:45vw;">Name <span class="updown" style="margin-top:5px;">
                                                &#9650;</span> <span class="updown"
                                                style="margin-bottom:7px;">&#9660;</span>
                                        </th>
    
                                    </tr>
                                </table>
    
                            </div>
    
    
                            <div class=" table-responsive table-wrapper-scroll-y table-fix ">
                                <table class=" table ">
    
    
                                    <tbody>
                                        <tr>
    
                                            <td id="col-id" style="width:12.2vw;">Cell</td>
                                            <td id="col-name" style="width:45vw;">John Doe</td>
    
    
                                        </tr>
                                        <tr class="rowTb">
    
                                            <td id="col-id">Cell</td>
                                            <td id="col-name">John Doe</td>
    
                                        </tr>
                                        <tr class="rowTb">
                                            <td id="col-id">Cell</td>
                                            <td id="col-name">John Doe</td>
                                        </tr>
                                        <tr class="rowTb">
                                            <td id="col-id">Cell</td>
                                            <td id="col-name">John Doe</td>
                                        </tr>
                                        <tr class="rowTb">
                                            <td id="col-id">Cell</td>
                                            <td id="col-name">John Doe</td>
                                        </tr>
                                        <tr class="rowTb">
                                            <td id="col-id">Cell</td>
                                            <td id="col-name">John Doe</td>
                                        </tr>
                                        <tr class="rowTb">
                                            <td id="col-id">Cell</td>
                                            <td id="col-name">John Doe</td>
                                        </tr>
                                        <tr class="rowTb">
                                            <td id="col-id">Cell</td>
                                            <td id="col-name">John Doe</td>
                                        </tr>
                                        <tr class="rowTb">
                                            <td id="col-id">Cell</td>
                                            <td id="col-name">John Doe</td>
                                        </tr>
                                        <tr class="rowTb">
                                            <td id="col-id">Cell</td>
                                            <td id="col-name">John Doe</td>
                                        </tr>
                                        <tr class="rowTb">
                                            <td id="col-id">Cell</td>
                                            <td id="col-name">John Doe</td>
                                        </tr>
    
                                    </tbody>
    
    
    
    
    
    
                                </table>
                            </div>
    
                        </div>
                        <!--/barcode-->
    
                    </div>
                </div>
            </div>

        </div>



    </div>

    </div>



</body>
<script src="src/js/backup.js"></script>
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
    window.onclick = function (event) {
        var ele = document.getElementsByClassName("modal");
        for (var i = 0; i < ele.length; i++) {
            if (event.target == ele[i]) {
                ele[i].style.display = "none";
            }
        }
    }
</script>

</html>