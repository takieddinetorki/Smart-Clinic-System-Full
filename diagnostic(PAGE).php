<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Clinic Name</title>
    <link rel="stylesheet" href="styles/layout.css" />
    <link rel="stylesheet" href="styles/footer.css">
    <link rel="stylesheet" href="styles/diagnostic.css">
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

<body onload="sidebarActivelink('diagnostic(PAGE)')">
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
                <h1 style="text-transform: uppercase;">Diagnostic Report</h1>
            </div>

            <div style="width: 100%; max-width: 1050px;">
                <div class="tabl">
                    <div class="table-nav">
                        <div class="flex" style="margin-top: 20px;width: 100%;">
                            <div class="status" id="dpdwn1">
                                <label for="status" style="margin-left: 3px;">Status</label>
                                <select name="status" class="status_dpdwn" id="status">
                                    <option value="Today">Today</option>
                                    <option value="This week">This week</option>
                                    <option value="This month">This month</option>
                                </select>
                            </div>
                            <div style="margin-right:10px;display: flex;flex-grow: 1;" id="from-todiv">
                                <div>
                                    <label for="from">From</label>
                                    <span>
                                        <input type="text" id="tacky" class="datepicker-here" data-language='en'>
                                        <i class="far fa-calendar-alt" style="font-size: 12px;"></i> </span>
                                </div>
                                <div>
                                    <label for="to">To</label>
                                    <span>
                                        <input type="text" id="tacky" class="datepicker-here ml-inp" data-language='en'>
                                        <i class="far fa-calendar-alt" style="font-size: 12px;"></i> </span>
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
                        <table class="table" style="max-width: 1050px; min-width: 1050px;">
                            <thead>
                                <tr>
                                    <th style="width:70px;border-left: none;">No</th>
                                    <th style="width:110px">Date <i class="fas fa-sort"></i></th>
                                    <th style="width:200px">Patient ID <i class="fas fa-sort"></i></th>
                                    <th style="width:520px">Name <i class="fas fa-sort"></i></th>
                                    <th style="width: 110px; padding-left: 20px; border-right: none;">Reciept No.</th>

                                </tr>
                            </thead>
                            <tbody style="max-height: calc(100vh - 340px);min-height: 200px;"
                                class="table-wrapper-scroll-y">
                                <tr>
                                    <td style="width:70px;border-left: none;">1</td>
                                    <td style="width:110px">1/3/2020</td>
                                    <td style="width:200px">Cell</td>
                                    <td style="width:520px">John Doe</td>
                                    <td style=" width:121px;border-right:none">Cell</td>

                                </tr>
                                <tr>
                                    <td style="border-left: none;">1</td>
                                    <td>1/3/2020</td>
                                    <td>Cell</td>
                                    <td>John Doe</td>
                                    <td style="border-right:none">Cell</td>
                                </tr>
                                <tr>
                                    <td style="border-left: none;">1</td>
                                    <td>1/3/2020</td>
                                    <td>Cell</td>
                                    <td>John Doe</td>
                                    <td style="border-right:none">Cell</td>
                                </tr>
                                <tr>
                                    <td style="border-left: none;">1</td>
                                    <td>20/12/2020</td>
                                    <td>Cell</td>
                                    <td>John Doe</td>
                                    <td style="border-right:none">Cell</td>
                                </tr>
                                <tr>
                                    <td style="border-left: none;">1</td>
                                    <td>1/3/2020</td>
                                    <td>Cell</td>
                                    <td>John Doe</td>
                                    <td style="border-right:none">Cell</td>
                                </tr>
                                <tr>
                                    <td style="border-left: none;">1</td>
                                    <td>1/3/2020</td>
                                    <td>Cell</td>
                                    <td>John Doe</td>
                                    <td style="border-right:none">Cell</td>
                                </tr>
                                <tr>
                                    <td style="border-left: none;">1</td>
                                    <td>1/3/2020</td>
                                    <td>Cell</td>
                                    <td>John Doe</td>
                                    <td style="border-right:none">Cell</td>
                                </tr>
                                <tr>
                                    <td style="border-left: none;">1</td>
                                    <td>1/3/2020</td>
                                    <td>Cell</td>
                                    <td>John Doe</td>
                                    <td style="border-right:none">Cell</td>
                                </tr>
                                <tr>
                                    <td style="border-left: none;">1</td>
                                    <td>1/3/2020</td>
                                    <td>Cell</td>
                                    <td>John Doe</td>
                                    <td style="border-right:none">Cell</td>
                                </tr>
                                <tr>
                                    <td style="border-left: none;">1</td>
                                    <td>1/3/2020</td>
                                    <td>Cell</td>
                                    <td>John Doe</td>
                                    <td style="border-right:none">Cell</td>
                                </tr>
                                <tr>
                                    <td style="border-left: none;">1</td>
                                    <td>1/3/2020</td>
                                    <td>Cell</td>
                                    <td>John Doe</td>
                                    <td style="border-right:none">Cell</td>
                                </tr>
                                <tr>
                                    <td style="border-left: none;">1</td>
                                    <td>1/3/2020</td>
                                    <td>Cell</td>
                                    <td>John Doe</td>
                                    <td style="border-right:none">Cell</td>
                                </tr>
                                <tr>
                                    <td style="border-left: none;">1</td>
                                    <td>1/3/2020</td>
                                    <td>Cell</td>
                                    <td>John Doe</td>
                                    <td style="border-right:none">Cell</td>
                                </tr>


                            </tbody>
                        </table>

                    </div>
                    <br>
                </div>
                <div class="footer">
                    <div class="footer-div">
                        <div class="icons-div">
                            <div class="icons">
                                <a href="diagonsitic-form(PAGE).php"><i style="color:#444242" class="fas fa-plus"></i></a>
                                
                            </div>
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
                        <input type="text" id="from" class="inp-modal13 datepicker-here" data-language="en"><i
                            class="far fa-calendar-alt"></i>
                    </span>
                </div>
                <div class="form-div-modal13">
                    <label for="to" class="label-modal13">Ending Date</label>
                    <span>
                        <input type="text" id="to" class="inp-modal13 datepicker-here" data-language="en"><i
                            class="far fa-calendar-alt"></i>
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