<?php
require_once 'byCMkGnmDa3mXlyfgPh/core/init.php';
$staff = new Staff;
$user = new User;
$clinic = new ClinicDB;
$id = new ID;
if (!$user->loggedIn()) {
    Redirect::to('index.php');
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Smart Clinic <?php if ($user->loggedIn()) echo deescape($clinic->getClinicInfo('clinicName', 'clinicID', $user->data()->clinicID));
                        else echo " Log in to show clinic" ?></title>
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

<body onload="sidebarActivelink('expenses(PAGE)')">
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
            <div class="foot-wrap">
                <div class="head" style="text-transform: uppercase;">
                    <h1>ADD BARCODE</h1>
                </div>
                <div>
                    <div class="form-container-wrapper" id="main-wrap">

                        <div class="form-container">
                            <a>
                                <i class="cl-icon fas fa-times-circle" aria-hidden="true" onclick="show('modal3')"></i>
                            </a>
                            <form class="expenses-form" method="POST" action="">
                                <div>
                                    <label for="code">Item Code</label>
                                    <select type="text" name="code" class="input_diag" style="margin-left:10px;width: 50%;">
                                        <option value=""></option>
                                    </select>
                                </div>
                                <div>
                                    <label for="name">Name</label>
                                    <input style="margin-left:10px;width: 50%;" type="text" name="name" id="name">
                                </div>
                                <div>
                                    <label for="stock">Stock</label>
                                    <input style="margin-left:10px;width: 50%;" type="number" name="stock" id="stock">
                                </div>
                                <div>
                                    <label for="cNum">Expiry Date</label>
                                    <input required type="text" id="expiry" class="datepicker-here" data-language='en' style="width: 200px;margin-left: 10px;text-align: center;">
                                    <i style="color:#707070;position:relative;font-size:18px;margin-left: 250px;margin-top: -6px;" class="far fa-calendar-alt" aria-hidden="true"></i>

                                </div>
                                <div>
                                    <div class="Barcode">
                                        <label for="Barcode">Barcode</label>
                                        <span style="margin-left: 80px;">
                                            <label id="barcode-label" for="file-upload">
                                                Upload File
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                            </label>
                                            <input id="file-upload" type="file" onchange="displayFilename()" />

                                        </span>
                                    </div>
                                </div>

                                <input id="inreg-submit" name="barcode" type="submit" value="Add" />
                                <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
                            </form>
                        </div>

                    </div>


                </div>
                <div class="footer">
                    <div class="footer-div">
                        <div class="icons-div">
                            <div class="icons">
                                <img src="src/img/save-file-option.png" alt="printer">
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
        document.getElementById("main-wrap").classList.toggle("widthChange");
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
    function displayFilename() {
        var thefile = document.getElementById('file-upload').value;
        var filename = thefile.substr(thefile.lastIndexOf('\\') + 1);
        document.getElementById('barcode-label').childNodes[0].nodeValue = filename + ' '
    }
</script>