<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Clinic Name</title>
    <link rel="stylesheet" href="styles/layout.css" />
    <link rel="stylesheet" href="styles/modals.css" />
    <link rel="stylesheet" href="styles/my-profile.css" />
    <script src="https://secure.exportkit.com/cdn/js/ek_googlefonts.js"></script>
    <script src="https://kit.fontawesome.com/d814c57d3c.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="styles/datepicker.min.css" rel="stylesheet" type="text/css">
    <script src="src/js/datepicker.min.js"></script>
    <!-- Include English language -->
    <script src="src/js/i18n/datepicker.en.js"></script>

</head>
<!-- this page is created using my-profile.php -->
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



            <div class="scroll-class">
                <div class="profile-form">
                    <div class="cl-btn" onclick="show('modal3')">
                        <i class="fas fa-times-circle"></i>
                    </div>

                    <div style="display: none;" class="update-profile">
                        <img src="src/img/tick-icon.png" width="21px" height="21px" alt="">
                        <p>Your Profile has been successfully updated</p>
                    </div>
                    <div class="head" style="text-transform: uppercase;">

                        <h1>Resgiter Doctor</h1>
                    </div>

                    <div class="form-content">
                        <form class="half1">
                            <div class="form-section">
                                <label for="">Name</label>
                                <input required type="text" id="first-name" style="width: 65%;text-align: center;">
                            </div>
                            <div class="form-section">
                                <label for="docID">DOC ID</label>
                                <input required type="text" id="docID" name="docID" style="width: 65%;text-align: center;">
                            </div>
                            <div class="form-section">
                                <label for="">Mobile Number</label>
                                <input required type="text" id="mobile-number" onchange="changedinput()" style="width: 65%;text-align: center;">
                            </div>

                            <div class="form-section">
                                <label for="nric">NRIC</label>
                                <input required type="text" id="nric" name="nric" style="width: 65%;text-align: center;">
                            </div>
                            <div class="form-section">
                                <label for="mmreg">MM Reg No</label>
                                <input required type="text" id="mmreg" name="mmreg" style="width: 65%;text-align: center;">
                            </div>
                        </form>
                        <form class="half2">
                            <div class="form-section" style="height: auto;justify-content: center;">
                                <div style="width: 150px;height: 170px;border: 1px solid #444242;">
                                    <div>
                                        <img id="blah" style="width:100%;height:100%;" src="src/img/photo.png" alt="" />
                                        <input type="file" style="width:100%;height:100%;transform: translateY(-180px);background:rgba(0, 0, 255, 0.397);opacity:0" name="file" onchange="readURL(this);" id="file-inputs" />
                                    </div>
                                </div>

                            </div>
                            <div class="form-section">
                                <label>Gender</label>
                                <select id="gender" style="width: 65%;text-align: center;text-align-last: center;">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <div class="form-section">
                                <label for="">DOB</label>
                                <input required type="text" id="birthday" class="datepicker-here" data-language='en' style="width: 65%;text-align: center;">
                                <i style="color:#707070;position:relative;right:32px;top:14px;font-size:18px" class="far fa-calendar-alt" aria-hidden="true"></i>
                            </div>
                       </form>
                    </div>
                </div>
            </div>
            <div style="text-align: center;">
                <button class="sub-btn" name="reg-btn" type="submit">Add</button>
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

                // image validation 
                let name = input.files[0].name;
                console.log(name);
                let ext = name.split('.').pop().toLowerCase();
                if (jQuery.inArray(ext, ['png', 'jpg', 'jpeg']) == -1) {
                    return alert("Invalid Image File");
                } else {
                    var fsize = input.files[0].size || input.files[0].fileSize;
                    if (fsize > 2000000) return alert("Image File Size is very big");
                    else {
                        var reader = new FileReader();

                        reader.onload = function(e) {
                            $('#blah')
                                .attr('src', e.target.result);
                        };

                        reader.readAsDataURL(input.files[0]);
                    }
                }
            }
        }
    </script>
    <script src="src/js/my-profile.js"></script>
</body>

</html>