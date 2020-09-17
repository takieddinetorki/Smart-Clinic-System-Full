<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Clinic Name</title>
    <link rel="stylesheet" href="styles/layout.css" />
    <link rel="stylesheet" href="styles/inventory_m.css">
    <link rel="stylesheet" href="styles/footer.css">
    <link rel="stylesheet" href="styles/modals.css">

    <script src="https://kit.fontawesome.com/d814c57d3c.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- for fonts -->
    <script src="https://secure.exportkit.com/cdn/js/ek_googlefonts.js"></script>
    <script src="src/js/layout.js"></script>
    <link href="styles/datepicker.min.css" rel="stylesheet" type="text/css">
    <script src="src/js/datepicker.min.js"></script>
    <!-- Include English language -->
    <script src="src/js/i18n/datepicker.en.js"></script>
</head>

<body onload="sidebarActivelink('inventory(PAGE)')">
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
                <h1>INVENTORY</h1>
            </div>
            <div style="width: 100%; max-width: 1020px;">
                <a href="inventory (PAGE).php" style="text-decoration: none;">
                    <div class="cl-btn">
                        <i class="fas fa-times-circle" style="color: #444242;"></i>
                    </div>
                </a>
                
                <div class="tabl">


                    <div class="table-nav">
                        <div style="display: flex;">
                            <div class="tablenav-indiv">
                                <label for="sid">Item Code</label>
                                <select name="sid" id="sid">
                                    <option value="">1004</option>
                                </select>
                            </div>
                            <div>
                                <label style="margin-left:20px;text-transform: uppercase;" class="ml-0" for="eid">Paracetamol</label>
                            </div>
                        </div>
                    </div>
                    <div class="table-wrapper-scroll-y" style="overflow-y: hidden;">
                        <table class="table" style="max-width: 1020px; min-width: 1020px;">
                            <thead>
                                <tr>
                                    <th style="width:50px;border-left: none;">No</th>
                                    <th style="width:130px">DATE<i class="fas fa-sort"></i></th>
                                    <th style="width:180px">PATIENT ID <i class="fas fa-sort"></i></th>
                                    <th style="width:470px">PATIENT NAME <i class="fas fa-sort"></i></th>
                                    <th style="width: 150px; padding-left: 20px; border-right: none;">DOSAGE (MG)<i
                                            class="fas fa-sort"></i></th>

                                </tr>
                            </thead>
                            <tbody style="max-height: calc(100vh - 310px);min-height: 200px;"
                                class="table-wrapper-scroll-y">
                                <tr>
                                    <td style="width:50px;border-left: none;">1</td>
                                    <td style="width:130px">1/3/2020</td>
                                    <td style="width:180px">JA1190000001</td>
                                    <td style="width:470px">John Doe</td>
                                    <td style=" width:164px;border-right:none">500</td>
                                </tr>
                                <tr>
                                    <td style="border-left: none;">1</td>
                                    <td>1/3/2020</td>
                                    <td>JA1190000001</td>
                                    <td>John Doe</td>
                                    <td style="border-right:none">500</td>
                                </tr>
                                <tr>
                                    <td style="border-left: none;">1</td>
                                    <td>1/3/2020</td>
                                    <td>JA1190000001</td>
                                    <td>John Doe</td>
                                    <td style="border-right:none">500</td>
                                </tr>
                                <tr>
                                    <td style="border-left: none;">1</td>
                                    <td>1/3/2020</td>
                                    <td>JA1190000001</td>
                                    <td>John Doe</td>
                                    <td style="border-right:none">500</td>
                                </tr>
                                <tr>
                                    <td style="border-left: none;">1</td>
                                    <td>1/3/2020</td>
                                    <td>JA1190000001</td>
                                    <td>John Doe</td>
                                    <td style="border-right:none">500</td>
                                </tr>
                                <tr>
                                    <td style="border-left: none;">1</td>
                                    <td>1/3/2020</td>
                                    <td>JA1190000001</td>
                                    <td>John Doe</td>
                                    <td style="border-right:none">500</td>
                                </tr>
                                <tr>
                                    <td style="border-left: none;">1</td>
                                    <td>1/3/2020</td>
                                    <td>JA1190000001</td>
                                    <td>John Doe</td>
                                    <td style="border-right:none">500</td>
                                </tr>
                                <tr>
                                    <td style="border-left: none;">1</td>
                                    <td>1/3/2020</td>
                                    <td>JA1190000001</td>
                                    <td>John Doe</td>
                                    <td style="border-right:none">500</td>
                                </tr>
                                <tr>
                                    <td style="border-left: none;">1</td>
                                    <td>1/3/2020</td>
                                    <td>JA1190000001</td>
                                    <td>John Doe</td>
                                    <td style="border-right:none">500</td>
                                </tr>
                                <tr>
                                    <td style="border-left: none;">1</td>
                                    <td>1/3/2020</td>
                                    <td>JA1190000001</td>
                                    <td>John Doe</td>
                                    <td style="border-right:none">500</td>
                                </tr>
                                <tr>
                                    <td style="border-left: none;">1</td>
                                    <td>1/3/2020</td>
                                    <td>JA1190000001</td>
                                    <td>John Doe</td>
                                    <td style="border-right:none">500</td>
                                </tr>
                                <tr>
                                    <td style="border-left: none;">1</td>
                                    <td>1/3/2020</td>
                                    <td>JA1190000001</td>
                                    <td>John Doe</td>
                                    <td style="border-right:none">500</td>
                                </tr>
                                <tr>
                                    <td style="border-left: none;">1</td>
                                    <td>1/3/2020</td>
                                    <td>JA1190000001</td>
                                    <td>John Doe</td>
                                    <td style="border-right:none">500</td>
                                </tr>
                                <tr>
                                    <td style="border-left: none;">1</td>
                                    <td>1/3/2020</td>
                                    <td>JA1190000001</td>
                                    <td>John Doe</td>
                                    <td style="border-right:none">500</td>
                                </tr>
                                <tr>
                                    <td style="border-left: none;">1</td>
                                    <td>1/3/2020</td>
                                    <td>JA1190000001</td>
                                    <td>John Doe</td>
                                    <td style="border-right:none">500</td>
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

                <div class="footer" style="display: block;">
                    <div class="footer-div" style="float: right;">
                        <div class="icons-div">
                            <div class="icons" onclick="show('modal9')">
                                <img src="src/img/printer.png" alt="printer">
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