<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Clinic Name</title>
    <link rel="stylesheet" href="styles/layout.css" />
    <link rel="stylesheet" href="styles/footer.css" />
    <link rel="stylesheet" href="styles/modals.css" />
    <link rel="stylesheet" href="styles/personal-info2.css" />
    <script src="https://secure.exportkit.com/cdn/js/ek_googlefonts.js"></script>
    <script src="https://kit.fontawesome.com/d814c57d3c.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="styles/datepicker.min.css" rel="stylesheet" type="text/css">
    <script src="src/js/datepicker.min.js"></script>
    <!-- Include English language -->
    <script src="src/js/i18n/datepicker.en.js"></script>

</head>

<body onload="sidebarActivelink('patients(PAGE)')">

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
                <a href="#" class="nav-logos"><img src="src/img/settings.png" alt="" /></a>

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
                        <a href="#">My Profile</a>
                        <a href="#">Logout</a>
                    </div>
                </div>
            </div>
        </div>


        <?php include 'sidebar.php'; ?>

        <div class="main">
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


            <div class="main-body">
                <div class="head">
                    <h1>PERSONAL INFORMATION</h1>
                </div>
                <div class="cl-btn" onclick="show('modal3')">
                    <i class="fas fa-times-circle"></i>
                </div>
                <div class="scroll-class table-wrapper-scroll-y">
                    <div class="personal-form">
                        <div class="box1">
                            <div class="form-part1">
                                <div class="form-row" style="margin-top:10px;">
                                    <label class="patient-id-label">Patient ID</label>
                                    <input type="text" class="patient-id">
                                    <label class="passport-no-label" style="width:80px;text-align:center;padding-top:0px;">NRIC/<br>Passport</label>
                                    <input type="text" class="passport-no">
                                    <label style="width:80px;text-align:center" class="dob-label">D.O.B</label>
                                    <input type="text" onfocusout="calcAge('dob-input','age-input')" class="dob datepicker-here" data-language='en' id="dob-input">
                                    <label class="age-label" style="width:70px;text-align:center">Age</label>
                                    <input type="text" class="age" id="age-input">
                                </div>
                                <div class="form-row">
                                    <label class="patient-name-label">Name</label>
                                    <input type="text" class="patient-name">

                                </div>
                                <div class="form-row">
                                    <label class="address-label">Address</label>
                                    <input type="text" class="address">

                                </div>
                                <div class="form-row">
                                    <label class="address-label"></label>
                                    <input type="text" class="address">
                                </div>
                            </div>
                            <div class="photo-part">
                                <div class="photo-input">
                                    <img id="blah" style="width:100%;height:100%;" src="src/img/photo.png" alt="" />
                                    <input type="file" style="width:100%;height:100%;transform: translateY(-180px);background:rgba(0, 0, 255, 0.397);opacity:0" name="fileToUpload" onchange="readURL(this);" id="file-inputs" />

                                    <!--<input type="file" style="width:100%;height:100%;opacity:1;" name="fileToUpload" onchange="readURL(this);" id="jqdate" />-->
                                </div>
                            </div>
                        </div>
                        <div class="box2">
                            <div class="form-row" style="margin-bottom:12px;">
                                <label class="gender-label">Name</label>
                                <input type="radio" name="gender" value="male" style="margin-top:8px;color:black;" />
                                <label for="male" style="width:60px;">Male</label>
                                <input type="radio" name="gender" value="female" style="margin-top:8px;color:black;" />
                                <label for="female" style="width:60px;">Female</label>
                                <label for="race" style="width:60px;text-align:right;padding-right:5px;" c>Race</label>
                                <select name="race" class="race" style="text-align:center;" m>
                                    <option value="c">C</option>
                                    <option value="m">M</option>
                                    <option value="i">I</option>
                                    <option value="o">O</option>
                                </select>
                                <label for="matrial" style="width:100px;text-align:right;padding-right:5px;">National</label>
                                <select name="matrial" class="nationality" style="width: 100px;">
                                    <?php include 'countries.php'; ?>
                                </select>
                                <label for="status" style="width:110px;text-align:right;padding-right:5px;">Marital
                                    Status</label>
                                <input type="radio" name="status" value="single" id="ms_single" oninput="hideSingle()" style="margin-top:8px;color:black;" />
                                <label for="single" style="width:50px;">Single</label>
                                <input type="radio" name="status" value="married" oninput="hideSingle()" style="margin-top:8px;color:black;" />
                                <label for="married" style="width:50px;">Married</label>
                            </div>
                            <div class="form-row">
                                <label for="mobile">Mobile No</label>
                                <input type="text" name="mobile" class="mobile-no" id="mobile-number" onchange="changedinput1()" />
                                <label for="spouse-name" style="width:80px;padding-left:25px;padding-top:0px;margin-right:15px;" id="spouse-label">Spouse Name</label>
                                <input type="text" id="spouse-input" class="spouse-name">
                            </div>
                            <div class="form-row">
                                <label for="emergency-name" style="padding-top:0px;transform: translateY(-1.5vh);">Emergency<br>Contact<br>Name</label>
                                <input type="text" name="mobile" class="emergency-name" />
                                <label for="emergency-no" style="width:80px;padding-left:25px;padding-top:0px;margin-right:15px;">Emergency
                                    Contact No</label>
                                <div class="cell-bottom1">
                                    <input type="text" class="emergency-no" id="e-number" onchange="changedinput2()" />
                                    <label for="relationship" style="width:30%;text-align:center;">Relationship</label>
                                    <select name="" class="relationship">
                                        <option value="father">Father</option>
                                        <option value="mother">Mother</option>
                                        <option value="Spouse">Spouse</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row" style="margin-bottom:5px;">
                                <label for="doc-id">Doctor ID</label>
                                <input type="text" name="doc-id" class="doctor-id" />
                                <label for="doctor" style="width:80px;padding-left:25px;padding-top:0px;margin-right:15px;">Doctor</label>
                                <input type="text" class="doctor">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer">
                    <div class="footer-div">
                        <div class="dots-div">
                            <span class="dot"></span>
                            <a href="medical-history-edit.php" style="text-decoration: none;color:black"><span class="dot" style="background-color:black"></span></a>
                        </div>
                        <div class="icons-div">
                            <div class="icons">
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
        window.onclick = function(event) {
            var ele = document.getElementsByClassName("modal");
            for (var i = 0; i < ele.length; i++) {
                if (event.target == ele[i]) {
                    ele[i].style.display = "none";
                }
            }
        }
    </script>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

    <script src="src/js/layout.js"></script>
    <script src="src/js/personal-info.js"></script>
</body>

</html>