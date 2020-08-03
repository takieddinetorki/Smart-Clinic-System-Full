<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Clinic Name</title>
    <link rel="stylesheet" href="styles/layout.css" />
    <link rel="stylesheet" href="styles/dashboard.css">
    <link rel="stylesheet" href="styles/dashboard_page.css">
    <script src="https://secure.exportkit.com/cdn/js/ek_googlefonts.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
            <a href="dashboard(PAGE).php" class="nav-active"><img src="src/img/home.png" />
                <div class="small_sidebar">Dashboard</div>
            </a>
            <a href="patients(PAGE).php"><img src="src/img/patient.svg" />
                <div class="small_sidebar">Patients</div>
            </a>
            <a href="appointment.php"><img src="src/img/appointment-icon.svg" alt="" />
                <div class="small_sidebar">Appointments</div>
            </a>
            <a href="diagnostic(PAGE).php" ><img src="src/img/diagnostic.svg" alt="" />
                <div class="small_sidebar"> Diagnostic Report</div>
            </a>
            <a href="billing(PAGE).php"><img src="src/img/finance.svg" alt="" />
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
            <div style="width:100%; max-width: fit-content ">
                <div style="width: fit-content;">
                    <select name="Month" id="" class="date-select">
                        <option value="month">This Month</option>
                    </select>

                    <div class="dashboard-cards">
                        <div class="box-wrapper">
                            <div class="box-gray">
                                <div>
                                    <p>125</p>
                                    <p>New Patients</p>
                                </div>
                                <div>
                                    <img src="src/img/patient.png" alt="">
                                </div>
                            </div>
                            <div class="box-gray">
                                <div>
                                    <p>83</p>
                                    <p>Total Appointments</p>
                                </div>
                                <div>
                                    <img src="src/img/appointment-icon.png" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="box-wrapper">
                            <div class="box-gray">
                                <div>
                                    <p>8,340.23</p>
                                    <p>Total Revenue</p>
                                </div>
                                <div>
                                    <img src="src/img/finance.png" alt="">
                                </div>
                            </div>
                            <div class="box-gray">
                                <div>
                                    <p>2,345.04</p>
                                    <p>Total Expenses</p>
                                </div>
                                <div>
                                    <img src="src/img/prescription.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="dashboard-row">
                        <div class="dashboard-item">
                            <div class="css_graph_1" style="margin-top: 20px;">
                                <p>Total Pateints</p>
                                <div style="display: flex;">
                                    <div id="y-axis">

                                    </div>
                                    <div id="graph-1">

                                    </div>
                                </div>
                            </div>
                            <div style="margin-left: auto;">
                                Days
                            </div>
                            <p style="font-size: 18px;margin-top: 0;margin-bottom: 5px;margin-top:-11px">Patients</p>
                        </div>
                        <div class="dashboard-item">
                            <div>
                                <div style="position: relative;min-width: 160px;">
                                    <div class="piesite circle-purple" id="pie_0" data-pie="80">
                                    </div>
                                    <span class="label-circle">RM 5,350.00</span>
                                    <p><i style="background-color: #a635ce;"></i> Drugs & Medications</p>
                                </div>
                                <div style="position: relative;min-width: 160px;">
                                    <div class="piesite circle-pink" id="pie_2" data-pie="75">
                                    </div>
                                    <span class="label-circle">RM 5,350.00</span>
                                    <p><i style="background-color: #f88e6f;"></i> Medical Tools</p>
                                </div>
                                <div style="position: relative;min-width: 160px;">
                                    <div class="piesite circle-blue" id="pie_1" data-pie="50">
                                    </div>
                                    <span class="label-circle">RM 2,350.00</span>
                                    <p><i style="background-color: #58769c;"></i> Salaries & Wages</p>
                                </div>
                            </div>
                            <p style="font-size: 18px; margin:0px;margin-bottom: -50px;">Expenses</p>
                        </div>
                    </div>

                    <div class="dashboard-row">
                        <div class="dashboard-item">
                            <div class="stock-count">
                                <div>
                                    <p>Total</p>
                                    <div class="rectangle">
                                        <div class="rectangle-fill" style="height: 100%;"></div>
                                    </div>
                                    <div class="triangle-down triangle-down-fill"></div>
                                    <p>100%</p>
                                </div>
                                <div>
                                    <p>Expiring</p>
                                    <div class="rectangle">
                                        <div class="rectangle-fill" style="height:15%;"></div>
                                    </div>
                                    <div class="triangle-down "></div>
                                    <p>15%</p>
                                </div>
                                <div>
                                    <p>Remaining</p>
                                    <div class="rectangle">
                                        <div class="rectangle-fill" style="height: 75%;"></div>
                                    </div>
                                    <div class="triangle-down"></div>
                                    <p>75%</p>
                                </div>
                            </div>
                            <p style="font-size: 18px; margin:0px">Stock Count</p>

                        </div>

                        <div class="dashboard-item">
                            <div class="css_graph_2" style="margin-top: 20px;">
                                <p>Total Sales (MYR)</p>
                                <div style="display: flex;">
                                    <div id="y-axis2">

                                    </div>
                                    <div id="graph-2">

                                    </div>
                                </div>
                            </div>
                            <div style="margin-left: auto;">
                                Days
                            </div>
                            <p style="font-size: 18px; margin:0px;margin-top:-10px">Expenses</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="src/js/dashboard.js"></script>
    <script src="src/js/dashboard-page.js"></script>
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
        }
    </script>
</body>

</html>