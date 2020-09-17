<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Clinic Name</title>
    <link rel="stylesheet" href="styles/layout.css" />
    <link rel="stylesheet" href="styles/backup2.css">
    <link rel="stylesheet" href="styles/modals.css">
    <link rel="stylesheet" href="styles/backup-table-modal.css">
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

<body onload="sidebarActivelink('backup')">
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
                <h1>BACKUP & TABLE SETUP</h1>
            </div>


            <div class="buttons-container">
                <div>
                    <button onclick="showDropdown(this)" class="tab-button">backup</button>
                    <div class="dropdown-items">
                        <div onclick="showmodal('modalBT1')">Data Recovery</div>
                        <div onclick="showmodal('modalBT2')">Lock Period</div>
                        <div onclick="showmodal('modalBT3')">Backup Data</div>
                        <div onclick="showmodal('modalBT4')">Restore Data</div>
                    </div>
                </div>

                <div><button class="tab-button" onclick="showPage('doctors-tab',this)">doctors</button></div>
                <div><button class="tab-button" onclick="showPage('report-tab',this)">diagnostic report</button></div>
                <div><button class="tab-button" onclick="showPage('expenses-tab',this)">expenses</button></div>
                <div>
                    <button onclick="showDropdown(this)" class="tab-button">inventory</button>
                    <div class="dropdown-items">
                        <div onclick="showmodal('vendorBT')">Vendor</div>
                        <div onclick="showmodal('barcodeBT')">Barcode</div>
                    </div>
                </div>
            </div>
            <div style="margin-bottom: 20px;" id="backup-tab">

                <!-- backup- Data recovery modal here 1/4 -->
                <div id="modalBT1" class="modalN tab-content">
                    <div class="modalContentBT">
                        <div class="text-center">
                            <p class="modalContentHeadBT">Data Recovery</p>
                            <i class="fa fa-exclamation-triangle" style="font-size: 44px;color: red; margin-top: 10px;"
                                aria-hidden="true"></i>
                            <p style="margin-top: 5px;color: black;">Please backup before you continue</p>
                        </div>
                        <form style="margin-top: 7px;">
                            <div class="form-div-modalBT">
                                <label for="sid" class="label-modalBT">Backup Data</label>
                                <input name="sid" type="checkbox" id="sid" class="inp-modalBT">
                            </div>
                        </form>
                        <div class="text-center">
                            <button class="modalBtnBT" type="submit">SUBMIT</button>
                        </div>
                    </div>
                </div>
                <!-- backup- Data recovery modal here 1/4 -->
                <!-- backup- Lock Data modal here 2/4 -->
                <div id="modalBT2" class="modalN tab-content">
                    <div class="modalContentBT">
                        <div class="text-center">
                            <p class="modalContentHeadBT">Lock Period</p>
                        </div>
                        <form style="margin-top: 15px;">
                            <div class="form-div-modalBT category_1">
                                <label for="from" class="label-modalBT label-lock">Month</label>
                                <select name="eid" id="eid" class="inp-modalBT inp-modalBTLock">
                                    <option value="">January</option>
                                    <option value="">February</option>
                                    <option value="">March</option>
                                    <option value="">April</option>
                                    <option value="">May</option>
                                    <option value="">June</option>
                                    <option value="">July</option>
                                    <option value="">August</option>
                                    <option value="">September</option>
                                    <option value="">October</option>
                                    <option value="">November</option>
                                    <option value="">December</option>
                                </select>
                            </div>
                            <div class="form-div-modalBT category_2">
                                <label for="from" class="label-modalBT label-lock">Quater</label>
                                <select name="eid" id="eid" class="inp-modalBT inp-modalBTLock">
                                    <option value="">First</option>
                                </select>
                            </div>
                            <div class="form-div-modalBT category_3">
                                <label for="to" class="label-modalBT label-lock">Year</label>
                                <select name="eid" id="eid" class="inp-modalBT inp-modalBTLock">
                                    <option value="">2020</option>
                                </select>
                            </div>
                            <div class="form-div-modalBT" style="margin-top: 10px;">
                                <div class="form-div-div-modalBT" style="justify-content: flex-end;">
                                    <input type="radio" name="date" id="date" class="inp-radioBT"
                                        oninput="toggleDivfr('category_1','category_2')">
                                    <label for="date">Monthly</label>
                                </div>
                                <div class="form-div-div-modalBT">
                                    <input type="radio" name="date" id="date" class="inp-radioBT"
                                        oninput="toggleDivfr('category_2','category_1')">
                                    <label for="date">Quaterly</label>
                                </div>
                                <div class="form-div-div-modalBT">
                                    <input type="radio" name="date" id="date" class="inp-radioBT"
                                        oninput="toggleDivfr('category_1','category_2','category_3')">
                                    <label for="date">Yearly</label>
                                </div>
                            </div>
                        </form>
                        <div class="text-center">
                            <button class="modalBtnBT" type="submit">LOCK/UNLOCK</button>
                        </div>
                    </div>
                </div>
                <!-- backup- Lock Data modal here 2/4 -->
                <!-- backup- backup Data modal here 3/4 -->
                <div id="modalBT3" class="modalN tab-content">
                    <div class="modalContentBT">
                        <div class="text-center">
                            <p class="modalContentHeadBT">Backup Data</p>
                            <i class="fa fa-exclamation-triangle" style="font-size: 44px;color: red; margin-top: 10px;"
                                aria-hidden="true"></i>
                            <p style="margin-top: 5px;color: black;">All users must exit from station before proceeding!
                            </p>
                        </div>
                        <form style="margin-top: 7px;">
                            <div class="form-div-modalBT">
                                <label for="from" class="label-modalBT label-backup">File Name</label>
                                <input name="eid" id="eid" class="inp-modalBT inp-modalBTLock">
                            </div>
                            <div class="form-div-modalBT">
                                <label for="from" class="label-modalBT label-backup">Folder</label>
                                <select name="eid" id="eid" class="inp-modalBT inp-modalBTLock">
                                    <option value=""></option>
                                </select>
                            </div>
                        </form>
                        <div class="text-center">
                            <button class="modalBtnBT" type="submit">BACKUP</button>
                        </div>
                    </div>
                </div>
                <!-- backup- backup Data modal here 3/4 -->
                <!-- backup- Restore Data modal here 4/4 -->
                <div id="modalBT4" class="modalN tab-content">
                    <div class="modalContentBT">
                        <div class="text-center">
                            <p class="modalContentHeadBT">Restore Data</p>
                            <i class="fa fa-exclamation-triangle" style="font-size: 44px;color: red; margin-top: 10px;"
                                aria-hidden="true"></i>
                            <p style="margin-top: 5px;color: black;">All users must exit from station before proceeding!
                            </p>
                        </div>
                        <form style="margin-top: 7px;">
                            <div class="form-div-modalBT">
                                <label for="from" class="label-modalBT label-backup">File Name</label>
                                <input name="eid" id="eid" class="inp-modalBT inp-modalBTLock">
                            </div>
                        </form>
                        <div class="text-center">
                            <button class="modalBtnBT" type="submit">BACKUP</button>
                        </div>
                    </div>
                </div>
                <!-- backup- Restore Data modal here 4/4 -->
            </div>

            <div id="doctors-tab" class="tab-content" style="width: 100%; max-width: 600px;">



                <div class="tabl">

                    <div class="table-wrapper-scroll-y" style="overflow-y: hidden;">
                        <table class="table" style="max-width: 600px; min-width: 600px;">
                            <thead>
                                <tr>
                                    <th style="width:150px">Patient ID <i class="fas fa-sort"></i></th>
                                    <th style="width:451px">Name <i class="fas fa-sort"></i></th>
                                </tr>
                            </thead>
                            <tbody style="max-height: calc(100vh - 300px);min-height: 200px;"
                                class="table-wrapper-scroll-y">
                                <tr>
                                    <td style="width:150px">JA000906000</td>
                                    <td style="width:450px">JOHN DOE</td>
                                </tr>
                                <tr>
                                    <td style="width:150px">JA000906000</td>
                                    <td style="width:450px">JOHN DOE</td>
                                </tr>
                                <tr>
                                    <td style="width:150px">JA000906000</td>
                                    <td style="width:450px">JOHN DOE</td>
                                </tr>
                                <tr>
                                    <td style="width:150px">JA000906000</td>
                                    <td style="width:450px">JOHN DOE</td>
                                </tr>
                                <tr>
                                    <td style="width:150px">JA000906000</td>
                                    <td style="width:450px">JOHN DOE</td>
                                </tr>
                                <tr>
                                    <td style="width:150px">JA000906000</td>
                                    <td style="width:450px">JOHN DOE</td>
                                </tr>
                                <tr>
                                    <td style="width:150px">JA000906000</td>
                                    <td style="width:450px">JOHN DOE</td>
                                </tr>
                                <tr>
                                    <td style="width:150px">JA000906000</td>
                                    <td style="width:450px">JOHN DOE</td>
                                </tr>
                                <tr>
                                    <td style="width:150px">JA000906000</td>
                                    <td style="width:450px">JOHN DOE</td>
                                </tr>
                                <tr>
                                    <td style="width:150px">JA000906000</td>
                                    <td style="width:450px">JOHN DOE</td>
                                </tr>





                            </tbody>
                        </table>

                    </div>

                </div>

                <div class="footer">
                    <div class="footer-div">
                        <div class="icons-div">
                            <div class="icons">
                                <i class="fas fa-plus"></i></a>
                            </div>
                            <div class="icons">
                                <img src="src/img/printer.png" alt="printer">
                            </div>
                            <div class="icons">
                                <img src="src/img/rubbish-bin.png" alt="delete">
                            </div>
                        </div>
                    </div>
                </div>


            </div>

            <div id="report-tab" class="tab-content">

                <div id="report-page1" class="report-box-container">

                    <div class="report-box">

                        <div class="report-box-title">Symptoms</div>
                        <div class="report-box-content  table-wrapper-scroll-y">

                            <div class="report-content">
                                <p>Fever</p>
                                <div>
                                    <button><i class="fas fa-pen" aria-hidden="true"></i></button>
                                    <button><i class="fas fa-trash-alt" aria-hidden="true"></i></button>
                                </div>
                            </div>
                            <div class="report-content">
                                <p>Fever</p>
                                <div>
                                    <button><i class="fas fa-pen" aria-hidden="true"></i></button>
                                    <button><i class="fas fa-trash-alt" aria-hidden="true"></i></button>
                                </div>
                            </div>
                            <div class="report-content">
                                <p>Fever</p>
                                <div>
                                    <button><i class="fas fa-pen" aria-hidden="true"></i></button>
                                    <button><i class="fas fa-trash-alt" aria-hidden="true"></i></button>
                                </div>
                            </div>
                            <div class="report-content">
                                <p>Fever</p>
                                <div>
                                    <button><i class="fas fa-pen" aria-hidden="true"></i></button>
                                    <button><i class="fas fa-trash-alt" aria-hidden="true"></i></button>
                                </div>
                            </div>
                            <div class="report-content">
                                <p>Fever</p>
                                <div>
                                    <button><i class="fas fa-pen" aria-hidden="true"></i></button>
                                    <button><i class="fas fa-trash-alt" aria-hidden="true"></i></button>
                                </div>
                            </div>
                            <div class="report-content">
                                <p>Fever</p>
                                <div>
                                    <button><i class="fas fa-pen" aria-hidden="true"></i></button>
                                    <button><i class="fas fa-trash-alt" aria-hidden="true"></i></button>
                                </div>
                            </div>
                            <div class="report-content">
                                <p>Fever</p>
                                <div>
                                    <button><i class="fas fa-pen" aria-hidden="true"></i></button>
                                    <button><i class="fas fa-trash-alt" aria-hidden="true"></i></button>
                                </div>
                            </div>
                            <div class="report-content">
                                <p>Fever</p>
                                <div>
                                    <button><i class="fas fa-pen" aria-hidden="true"></i></button>
                                    <button><i class="fas fa-trash-alt" aria-hidden="true"></i></button>
                                </div>
                            </div>
                            <div class="report-content">
                                <p>Fever</p>
                                <div>
                                    <button><i class="fas fa-pen" aria-hidden="true"></i></button>
                                    <button><i class="fas fa-trash-alt" aria-hidden="true"></i></button>
                                </div>
                            </div>

                        </div>

                        <div class="report-box-footer">
                            <div class="icon-container">
                                <i class="fas fa-plus plusIcon" aria-hidden="true"></i>
                            </div>
                        </div>


                    </div>

                    <div class="report-box">
                        <div class="report-box-title">Diagnosis</div>
                        <div class="report-box-content table-wrapper-scroll-y"></div>
                        <div class="report-box-footer">
                            <div class="icon-container">
                                <i class="fas fa-plus plusIcon" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>


                </div>

                <div id="report-page2" style="display: none;" class="report-box-container">

                    <div class="report-box">

                        <div class="report-box-title">Treatment</div>
                        <div class="report-box-content  table-wrapper-scroll-y">

                            <div class="report-content">
                                <p>Fever</p>
                                <div>
                                    <button><i class="fas fa-pen" aria-hidden="true"></i></button>
                                    <button><i class="fas fa-trash-alt" aria-hidden="true"></i></button>
                                </div>
                            </div>


                        </div>

                        <div class="report-box-footer">
                            <div class="icon-container">
                                <i class="fas fa-plus plusIcon" aria-hidden="true"></i>
                            </div>
                        </div>


                    </div>

                    <div class="report-box">
                        <div class="report-box-title">Allergy</div>
                        <div class="report-box-content table-wrapper-scroll-y"></div>
                        <div class="report-box-footer">
                            <div class="icon-container">
                                <i class="fas fa-plus plusIcon" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>


                </div>

                <div class="dots-div">
                    <span class="dot" onclick="toggleFooterDot(this,'report-page1','report-page2')"
                        style="background-color: black;"></span>
                    <span class="dot" onclick="toggleFooterDot(this,'report-page2','report-page1')"></span>
                </div>

            </div>


            <div id="expenses-tab" class="tab-content">



                <div class="expenses-box-container">

                    <div class="expenses-box">

                        <div class="expenses-box-title">

                            <div style="min-width: 200px; border-right: 1px solid #707070;">Account Code</div>
                            <div style="width: 500px">Account Name</div>

                        </div>
                        <div class="expenses-box-content  table-wrapper-scroll-y">

                            <div class="expenses-table-line"></div>

                            <div class="expenses-content">
                                <div style="min-width: 200px; text-align: center; ">1000</div>
                                <div class="account-name">
                                    Utility Bills
                                    <div>
                                        <button><i class="fas fa-pen" aria-hidden="true"></i></button>
                                        <button><i class="fas fa-trash-alt" aria-hidden="true"></i></button>
                                    </div>
                                </div>
                            </div>



                        </div>

                        <div>
                            <div class="icon-container">
                                <i class="fas fa-plus plusIcon" aria-hidden="true"></i>
                            </div>
                        </div>


                    </div>



                </div>


            </div>

            <div id="inventory-tab">
                <div id="vendorBT" class="tab-content">
                    <div id="vendor-list" style="width: 100%;max-width: calc(100vw - 350px);"
                        class="table-wrapper-scroll-y">
                        <div>
                            <div class="table-wrapper-scroll-y" style="overflow-y: hidden;">
                                <table class="table" style="max-width: 630px; min-width: 630px;">
                                    <thead>
                                        <tr>
                                            <th style="width:200px;border-left: none;">VENDOR CODE<i
                                                    class="fas fa-sort"></i></th>
                                            <th style="width: 390px; border-right: none;">VENDOR NAME<i
                                                    class="fas fa-sort"></i>
                                            </th>

                                        </tr>
                                    </thead>
                                    <tbody style="max-height: calc(100vh - 380px);min-height: 200px;"
                                        class="table-wrapper-scroll-y">
                                        <tr>
                                            <td style="width:200px;border-left: none;">1</td>
                                            <td style=" width:413px;border-right:none">Cell</td>

                                        </tr>
                                        <tr>
                                            <td style="border-left: none;">1</td>
                                            <td style="border-right:none">Cell</td>
                                        </tr>
                                        <tr>
                                            <td style="border-left: none;">1</td>
                                            <td style="border-right:none">Cell</td>
                                        </tr>
                                        <tr>
                                            <td style="border-left: none;">1</td>
                                            <td style="border-right:none">Cell</td>
                                        </tr>
                                        <tr>
                                            <td style="border-left: none;">1</td>
                                            <td style="border-right:none">Cell</td>
                                        </tr>
                                        <tr>
                                            <td style="border-left: none;">1</td>
                                            <td style="border-right:none">Cell</td>
                                        </tr>
                                        <tr>
                                            <td style="border-left: none;">1</td>
                                            <td style="border-right:none">Cell</td>
                                        </tr>
                                        <tr>
                                            <td style="border-left: none;">1</td>
                                            <td style="border-right:none">Cell</td>
                                        </tr>
                                        <tr>
                                            <td style="border-left: none;">1</td>
                                            <td style="border-right:none">Cell</td>
                                        </tr>
                                        <tr>
                                            <td style="border-left: none;">1</td>
                                            <td style="border-right:none">Cell</td>
                                        </tr>


                                    </tbody>
                                </table>

                            </div>
                        </div>
                        <div class="footer">
                            <div class="footer-div">
                                <div class="icons-div">
                                    <div class="icons" onclick="toggleShow('addVendor','vendor-list')">
                                        <i class="fas fa-plus"></i></a>
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
                    <!-- the add vendor page -->
                    <div id="addVendor" style="width: 100%;max-width: calc(100vw - 275px);"
                        class="table-wrapper-scroll-y">
                        <div style="display: flex;">
                            <div class="box-wrapper">

                                <div class="box">
                                    <div class="box-content">
                                        <div class="box-content-head">
                                            Vendor
                                        </div>
                                        <div class="box-content-items">
                                            <form action="">
                                                <div>
                                                    <label> Code</label>
                                                    <select type="text" class="input_diag" style="width: 100px;">
                                                        <option value=""></option>
                                                    </select>
                                                </div>
                                                <div>
                                                    <label> Name</label>
                                                    <input type="text" style="width: 280px;">
                                                </div>
                                                <div>
                                                    <label>Address</label>
                                                    <input type="text" style="width: 280px;">
                                                </div>
                                                <div>
                                                    <label style="visibility: hidden;">Address</label>
                                                    <input type="text" style="width: 280px; ">
                                                </div>
                                                <div>
                                                    <label style="visibility: hidden;">Address</label>
                                                    <input type=" text" style="width: 280px; ">
                                                </div>

                                                <div>
                                                    <label>Contact Person</label>
                                                    <input type="text" style="width: 200px;">
                                                </div>
                                                <div>
                                                    <label>Contact No.</label>
                                                    <input type="text" style="width: 200px;">
                                                </div>

                                            </form>


                                        </div>

                                    </div>
                                    <div class="text-center" style="margin-top: 10px;">
                                        <button class="modalBtnBT" type="submit">SUBMIT</button>
                                    </div>
                                </div>
                            </div>
                            <div style="font-size: 20px;margin-top: 6px;margin-left: 6px;"
                                onclick="toggleShow('vendor-list','addVendor')">
                                <i class="cl-icon fas fa-times-circle" aria-hidden="true" style="color:#444242"></i>
                            </div>
                        </div>
                        <div class="footer">
                            <div class="footer-div ad-footer">
                                <div class="icons-div">
                                    <div class="icons" onclick="toggleShow('addVendor','vendor-list')">
                                        <img src="src/img/save-file-option.png" alt="printer">
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


                <div id="barcodeBT" class="tab-content">
                    <div id="barcode-list" style="width: 100%;max-width: calc(100vw - 350px);"
                        class="table-wrapper-scroll-y">
                        <div>
                            <div class="table-wrapper-scroll-y" style="overflow-y: hidden;">
                                <table class="table" style="max-width: 630px; min-width: 630px;">
                                    <thead>
                                        <tr>
                                            <th style="width:200px;border-left: none;">ITEM CODE<i
                                                    class="fas fa-sort"></i></th>
                                            <th style="width: 390px; border-right: none;">NAME<i
                                                    class="fas fa-sort"></i>
                                            </th>

                                        </tr>
                                    </thead>
                                    <tbody style="max-height: calc(100vh - 380px);min-height: 200px;"
                                        class="table-wrapper-scroll-y">
                                        <tr>
                                            <td style="width:200px;border-left: none;">1</td>
                                            <td style=" width:413px;border-right:none">Cell</td>

                                        </tr>
                                        <tr>
                                            <td style="border-left: none;">1</td>
                                            <td style="border-right:none">Cell</td>
                                        </tr>
                                        <tr>
                                            <td style="border-left: none;">1</td>
                                            <td style="border-right:none">Cell</td>
                                        </tr>
                                        <tr>
                                            <td style="border-left: none;">1</td>
                                            <td style="border-right:none">Cell</td>
                                        </tr>
                                        <tr>
                                            <td style="border-left: none;">1</td>
                                            <td style="border-right:none">Cell</td>
                                        </tr>
                                        <tr>
                                            <td style="border-left: none;">1</td>
                                            <td style="border-right:none">Cell</td>
                                        </tr>
                                        <tr>
                                            <td style="border-left: none;">1</td>
                                            <td style="border-right:none">Cell</td>
                                        </tr>
                                        <tr>
                                            <td style="border-left: none;">1</td>
                                            <td style="border-right:none">Cell</td>
                                        </tr>
                                        <tr>
                                            <td style="border-left: none;">1</td>
                                            <td style="border-right:none">Cell</td>
                                        </tr>
                                        <tr>
                                            <td style="border-left: none;">1</td>
                                            <td style="border-right:none">Cell</td>
                                        </tr>


                                    </tbody>
                                </table>

                            </div>
                        </div>
                        <div class="footer">
                            <div class="footer-div">
                                <div class="icons-div">
                                    <div class="icons" onclick="toggleShow('addBarcode','barcode-list')">
                                        <i class="fas fa-plus"></i></a>
                                    </div>
                                    <div class="icons" onclick="show('modal9_2')">
                                        <img src="src/img/printer.png" alt="printer">
                                    </div>
                                    <div class="icons" onclick="show('modal2')">
                                        <img src="src/img/rubbish-bin.png" alt="delete">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- the add vendor page -->
                    <div id="addBarcode" style="width: 100%;max-width: calc(100vw - 275px);"
                        class="table-wrapper-scroll-y">
                        <div style="display: flex;">
                            <div class="box-wrapper">

                                <div class="box">
                                    <div class="box-content">
                                        <div class="box-content-head">
                                            Inventory
                                        </div>
                                        <div class="box-content-items">
                                            <form action="">
                                                <div>
                                                    <label>Item Code</label>
                                                    <select type="text" class="input_diag" style="width: 100px;">
                                                        <option value=""></option>
                                                    </select>
                                                </div>
                                                <div>
                                                    <label> Name</label>
                                                    <input type="text" style="width: 280px;">
                                                </div>
                                                <div>
                                                    <label>Stock</label>
                                                    <input type="text" style="width: 280px;">
                                                </div>
                                                <div>
                                                    <label>Expiry Date</label>
                                                    <span>
                                                        <input type="text" style="width: 200px;" class="datepicker-here"
                                                            data-language='en'>
                                                        <i class="far fa-calendar-alt" style="font-size: 13px;"></i>
                                                    </span>
                                                </div>
                                                <!-- <div>
                                                    <label>BarCode</label>
                                                    <input type="text" style="width: 200px;">
                                                </div> -->
                                                <div class="Barcode">
                                                    <label for="Barcode">Barcode</label>
                                                    <span>
                                                        <label id="barcode-label" for="file-upload">
                                                            Upload File
                                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                                        </label>
                                                        <input id="file-upload" type="file"
                                                            onchange="displayFilename()" />

                                                    </span>
                                                </div>

                                            </form>


                                        </div>

                                    </div>
                                    <div class="text-center" style="margin-top: 10px;">
                                        <button class="modalBtnBT" type="submit">SUBMIT</button>
                                    </div>
                                </div>
                            </div>
                            <div style="font-size: 20px;margin-top: 6px;margin-left: 6px;"
                                onclick="toggleShow('barcode-list','addBarcode')">
                                <i class="cl-icon fas fa-times-circle" aria-hidden="true" style="color:#444242"></i>
                            </div>
                        </div>
                        <div class="footer">
                            <div class="footer-div ad-footer">
                                <div class="icons-div">
                                    <div class="icons">
                                        <img src="src/img/save-file-option.png" alt="printer">
                                    </div>
                                    <div class="icons" onclick="show('modal9_2')">
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
        </div>
    </div>



</body>
<script src="src/js/backup2.js"></script>
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
    function displayFilename() {
        var thefile = document.getElementById('file-upload').value;
        var filename = thefile.substr(thefile.lastIndexOf('\\') + 1);
        document.getElementById('barcode-label').childNodes[0].nodeValue = filename + ' '
    }
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
<!-- print modal 6 here  0/1 -->
<div id="modal9" class="modal pdl">
<div class="modal-wrap">
    <div class="modalContent9">
        <form style="margin-top: 7px;">
            <div class="form-div-modal9">
                <label for="sid" class="label-modal9" style="width: 51%;">Starting Vendor Code</label>
                <select name="sid" id="sid" class="inp-modal9">
                    <option value="">00906000</option>
                </select>
            </div>
            <div class="form-div-modal9">
                <label for="eid" class="label-modal9" style="width: 51%;">Ending Vendor Code</label>
                <select name="eid" id="eid" class="inp-modal9">
                    <option value="">00906000</option>
                </select>
            </div>
        </form>
        <div class="text-center">
            <button class="modalBtn9" type="submit" style="margin-left: 0px;">PRINT</button>
        </div>
    </div>
</div>
</div>
<!-- print modal 6 till here 1/1 -->
<!-- print modal 6 here  0/1 -->
<div id="modal9_2" class="modal pdl">
<div class="modal-wrap">
    <div class="modalContent9">
        <form style="margin-top: 7px;">
            <div class="form-div-modal9">
                <label for="sid" class="label-modal9" style="width: 51%;">Starting BarCode ID</label>
                <select name="sid" id="sid" class="inp-modal9">
                    <option value="">00906000</option>
                </select>
            </div>
            <div class="form-div-modal9">
                <label for="eid" class="label-modal9" style="width: 51%;">Ending BarCode ID</label>
                <select name="eid" id="eid" class="inp-modal9">
                    <option value="">00906000</option>
                </select>
            </div>
        </form>
        <div class="text-center">
            <button class="modalBtn9" type="submit" style="margin-left: 0px;">PRINT</button>
        </div>
    </div>
</div>
</div>
<!-- print modal 6 till here 1/1 -->

</html>