<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Clinic Name</title>
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
            <a href="appointment.html"  class="nav-active"><img src="src/img/appointment-icon.svg" alt="" />
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
            <a href="backup.html"><img src="src/img/settings-tools.svg" alt="" />
                <div class="small_sidebar">Backup & Table Setup</div>
            </a>
        </div>

        <div class="main">
            <div class="head">
                <h1 style="text-transform: uppercase;">Appointments</h1>
            </div>
            <div>
                <div class="form-container-wrapper">

                    <div class="form-container">
                        <a>
                            <i class="cl-icon fas fa-times-circle" aria-hidden="true" onclick="show('modal3')"></i>
                        </a>
                        <form class="expenses-form">
                            <div>
                                <label for="account">Patient ID</label>
                                <select style="width: 136px;" type="text" name="patientId">
                                    <option value="1"></option>
                                </select>
                            </div>
                            <div>
                                <label for="accountName">Patient Name</label>
                                <input style="width: 380px;" class="inp-wid" type="text" name="patientName">
                            </div>

                            <div class="date">
                                <label for="Date">Date</label>
                                <span>
                                    <input type="text" class="datepicker-here" data-language="en">
                                    <i style="position: relative; right: 32px;" class="far fa-calendar-alt"
                                        aria-hidden="true"></i>
                                </span>

                            </div>
                            <div>
                                <label for="amount">Time</label>
                                <input style="width: 120px;" step="0.01" type="number" name="time" placeholder="00.00">
                            </div>


                            <div>
                                <label for="account">Doctor ID</label>
                                <select style="width: 136px;" type="text" name="doctorId">
                                    <option value="1"></option>
                                </select>
                            </div>
                            <div>
                                <label for="accountName">Doctor Name</label>
                                <input style="width: 380px;" class="inp-wid" type="text" name="doctorName">
                            </div>


                            <input style="margin-top: 50px;" id="inreg-submit" name="register" type="submit"
                                value="SUBMIT" />
                        </form>
                    </div>

                </div>


            </div>
        </div>

    </div>
    <!-- save modal here -->
    <div id="modal3" class="modal pdl">
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
    <!-- save modal till here -->

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