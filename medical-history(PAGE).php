<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Clinic Name</title>
    <link rel="stylesheet" href="styles/layout.css" />
    <link rel="stylesheet" href="styles/medical-history.css" />
    <link rel="stylesheet" href="styles/footer.css" />
    <link rel="stylesheet" href="styles/modals.css" />
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
                    <h1>MEDICAL HISTORY</h1>
                </div>
                <div class="cl-btn" onclick="show('modal3')">
                    <i class="fas fa-times-circle"></i>
                </div>
                <div class="scroll-class">
                    <div class="hist-form">
                        <div class="form-row">
                            <label class="issues-col">Illness</label>
                            <input type="radio" name="Diabetes" class="disease-option" />
                            <label for="diabetes" class="diseases">Diabetes</label>
                            <input type="radio" name="Heart Patient" class="disease-option" />
                            <label for="diabetes" class="diseases" style="width:110px;">Heart Patient</label>
                            <input type="radio" name="Migraine" class="disease-option" />
                            <label for="diabetes" class="diseases">Migraine</label>
                            <input type="radio" name="Blood Pressure" class="disease-option" />
                            <label for="diabetes" class="diseases" style="width:120px;">Blood Pressure</label>
                        </div>
                        <div class="form-row">
                            <label class="issues-col"></label>
                            <input type="radio" name="Lungs" class="disease-option" />
                            <label for="diabetes" class="diseases">Lungs</label>
                            <input type="radio" name="Tubercolosis" class="disease-option" />
                            <label for="diabetes" class="diseases" style="width:110px;">Tubercolosis</label>
                            <input type="radio" name="Others" class="disease-option" />
                            <label for="diabetes" class="diseases" style="width:60px;">Others</label>
                            <input type="text" class="detail1" style="margin-left:5px;">
                        </div>
                        <div class="form-row">
                            <label class="issues-col">Smoking</label>
                            <input type="radio" name="smoking" class="disease-option" />
                            <label for="diabetes" class="diseases">Never</label>
                            <input type="radio" name="smoking" class="disease-option" />
                            <label for="diabetes" class="diseases" style="width:110px;">Occational</label>
                            <input type="radio" name="smoking" class="disease-option" />
                            <label for="diabetes" class="diseases">Habitual</label>
                        </div>
                        <div class="form-row">
                            <label class="issues-col">Drinking</label>
                            <input type="radio" name="drink" class="disease-option" />
                            <label for="diabetes" class="diseases">Never</label>
                            <input type="radio" name="drink" class="disease-option" />
                            <label for="diabetes" class="diseases" style="width:110px;">Occational</label>
                            <input type="radio" name="drink" class="disease-option" />
                            <label for="diabetes" class="diseases">Habitual</label>
                        </div>
                        <div class="form-row">
                            <label class="issues-col">Tobacco</label>
                            <input type="radio" name="tobacco" class="disease-option" />
                            <label for="diabetes" class="diseases">Never</label>
                            <input type="radio" name="tobacco" class="disease-option" />
                            <label for="diabetes" class="diseases" style="width:110px;">Occational</label>
                            <input type="radio" name="tobacco" class="disease-option" />
                            <label for="diabetes" class="diseases">Habitual</label>
                        </div>
                        <div class="form-row">
                            <label class="issues-col"></label>
                            <input type="radio" name="Other" class="allergy-option" />
                            <label for="diabetes" class="allergies">Others</label>
                            <input type="text" class="detail1">
                        </div>
                        <div class="form-row">
                            <label class="issues-col">Allergies</label>
                            <input type="radio" name="Food" class="allergy-option" />
                            <label for="diabetes" class="allergies">Food</label>
                            <input type="text" class="detail2">
                        </div>
                        <div class="form-row">
                            <label class="issues-col"></label>
                            <input type="radio" name="Drug" class="allergy-option" />
                            <label for="diabetes" class="allergies">Drug</label>
                            <input type="text" class="detail2">
                        </div>
                        <div class="form-row">
                            <label class="issues-col"></label>
                            <input type="radio" name="Others" class="allergy-option" />
                            <label for="diabetes" class="allergies">Others</label>
                            <input type="text" class="detail2">
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
    <script src="src/js/layout.js"></script>
</body>

</html>