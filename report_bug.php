<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Clinic Name</title>
    <link rel="stylesheet" href="styles/layout.css" />
    <link rel="stylesheet" href="styles/report_bug.css">
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

            <div>
                <div class="form-container-wrapper table-wrapper-scroll-y">

                    <div class="form-container" style="height: 450px; margin-top: 40px; min-width: 600px;">
                        <div class="head">
                            <h1 style="text-transform: uppercase;">REPORT A BUG</h1>
                        </div>

                        <a>
                            <i class="cl-icon fas fa-times-circle" aria-hidden="true"></i>
                        </a>
                        <form class="expenses-form">

                            <div>
                                <label for="name">Name</label>
                                <input style="width: 380px;" type="text" name="name">
                            </div>

                            <div class="date">
                                <label for="Date">Date</label>
                                <span>
                                    <input type="text" class="datepicker-here" data-language="en">
                                    <i style="position: relative; right: 32px;" class="far fa-calendar-alt"
                                        aria-hidden="true"></i>
                                </span>

                            </div>
                            <div style="height: 100px;">
                                <label for="description">Description</label>
                                <textarea style="width: 380px;" class="inp-wid" type="text"
                                    name="description"></textarea>
                            </div>


                            <div>
                                <label for="email">Email Address</label>
                                <input style="width: 380px;" class="inp-wid" type="text" name="email">
                            </div>
                            <div class="attachment">
                                <label for="attachment">Attachment</label>
                                <span>
                                    <label id="attachment-label" for="file-upload">
                                        Upload File
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                    </label>
                                    <input id="file-upload" type="file" onchange="displayFilename()" />

                                </span>
                            </div>


                            <input style="margin-top: 50px;" id="inreg-submit" name="register" type="submit"
                                value="SUBMIT" />
                        </form>
                    </div>

                </div>


            </div>
        </div>

    </div>


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


    function displayFilename() {
        var thefile = document.getElementById('file-upload').value;
        var filename = thefile.substr(thefile.lastIndexOf('\\') + 1);
        document.getElementById('attachment-label').childNodes[0].nodeValue = filename + ' '
    }



</script>