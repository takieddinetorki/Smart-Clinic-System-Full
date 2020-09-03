<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Clinic Name</title>
    <link rel="stylesheet" href="styles/layout.css" />
    <link rel="stylesheet" href="styles/footer.css">
    <link rel="stylesheet" href="styles/modals.css">
    <link rel="stylesheet" href="styles/setting.css" />
    <script src="https://kit.fontawesome.com/d814c57d3c.js" crossorigin="anonymous"></script>

    <script src="https://secure.exportkit.com/cdn/js/ek_googlefonts.js"></script>
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

        <?php include 'sidebar.php';?>

        <div class="main">

            <div class="wrapper" id="wrap">
                <div class="main-container">
                    <div class="cl-btn" onclick="show('modal3')">
                        <i class="fas fa-times-circle"></i>
                    </div>
                    <div style="display: none;" class="update-profile">
                        <img src="src/img/tick-icon.png" width="21px" height="21px" alt="">
                        <p>Your Profile has been successfully updated</p>
                    </div>
                    <div class="head-div">
                        <h1>Settings</h1>
                    </div>

                    <div style="margin-top: -42px;">
                        <form action="#" class="form">
                            <div class="form-div">
                                <label class="form-label" for="">Company Name</label>
                                <input class="form-inp w-BIG" type="text" name="" id="">
                            </div>
                            <div class="form-div">
                                <label class="form-label" for=""></label>
                                <input class="form-inp  w-BIG" type="text" name="" id="">
                            </div>
                            <div style="display: flex;">
                                <div class="form-div">
                                    <label class="form-label" for="">Company No</label>
                                    <input type="text" id="from" class=" form-inp">
                                </div>
                                <div class="form-div" style="padding-right: 20px;padding-left: 10px;">
                                    <label class="form-label" for="" style="margin-left: 20px;">Bank
                                        Account No</label>
                                    <input type="text" id="from" class="form-inp">
                                </div>
                            </div>
                            <div style="display: flex;">
                                <div class="form-div">
                                    <label class="form-label" for="">Sales Tax Registration No</label>
                                    <input type="text" id="from" class=" form-inp">
                                </div>
                                <div class="form-div" style="padding-right: 20px;padding-left: 10px;">
                                    <label class="form-label" for="" style="margin-left: 20px;">GST Registration No
                                    </label>
                                    <input type="text" id="from" class="form-inp">

                                </div>
                            </div>


                            <div class="form-div">
                                <label class="form-label" for="">Address</label>
                                <input class="form-inp w-BIG" type="text" name="" id="">
                            </div>
                            <div class="form-div">
                                <label class="form-label" for=""></label>
                                <input class="form-inp w-BIG" type="text" name="" id="">
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <div style="text-align: center;margin-top: -30px;">
                <button class="sub-btn" type="submit">Submit</button>
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
            document.getElementById("wrap").classList.toggle("width-toggle");
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
    <!-- ______________________________________________________________________________________________________________________ -->
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
</body>

<script src="src/js/layout.js"></script>

</html>