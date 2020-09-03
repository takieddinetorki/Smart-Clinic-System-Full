<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Clinic Name</title>
    <link rel="stylesheet" href="styles/layout.css" />
    <link rel="stylesheet" href="styles/modals.css">
    <link rel="stylesheet" href="styles/purchase_order.css">
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
                        <label for="search-by-id">Search by Code</label>
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
            <div class="main-container">
                <div class="head">
                    PURCHASE ORDER
                </div>
                <div class="top-items">
                    <div id="code">
                        PO NO
                    </div>
                    <div class="cl-btn">
                        <a href="purchase_order_table (PAGE).php">    <i class="fas fa-times-circle"></i></a>
                     
                    </div>
                </div>
    
                <div style="overflow-y: hidden;" class="table-wrapper-scroll-y">
    
                    <div class="box-wrapper">
                        <div class="box">
                            <div class="box-title">
                                ITEMS
                            </div>
    
                            <div class="box-content">
                                <div class="box-content-head">
                                    Details
                                </div>
                                <div class="box-content-items">
                                    <div>
                                        <label> Code</label>
                                        <select type="text" class="input_diag" style="width: 100px;">
    
                                        </select>
                                    </div>
                                    <div>
                                        <label> Name</label>
                                        <input type="text" style="width: 280px;">
                                    </div>
                                    <div>
                                        <label>Description</label>
                                        <input type="text" style="width: 280px;">
                                    </div>
                                    <div>
                                        <label style="visibility: hidden;">Description</label>
                                        <input type="text" style="width: 280px; ">
                                    </div>
    
                                    <div>
                                        <label>Unit Price</label>
                                        <input type="text" style="width: 150px;">
                                    </div>
                                    <div>
                                        <label>Quantity</label>
                                        <input type="text" style="width: 150px;">
                                    </div>
                                    <div class="plus-icon">
                                        <i class="fas fa-plus" style="margin-top: 9px;"></i>
                                    </div>
                                </div>
    
                            </div>
    
                        </div>
                        <div class="box">
                            <div class="box-title">
                                LISTING
                            </div>
                            <div class="table-wrapper-scroll-y" style="text-transform: uppercase;overflow-y: scroll;max-height: 430px;">
                                <div class="box-div list-box">
                                  <i class="far fa-times-circle"></i>
                                  <div> Paracetamol</div>
                                  <div> 500 MG</div>
                                  <div> RM 2.0</div>
                                  <div> 200 Unit</div>
                                  <div> Rm 400</div>
                                </div>
                                <div class="box-div list-box">
                                  <i class="far fa-times-circle"></i>
                                  <div> Paracetamol</div>
                                  <div> 500 mg</div>
                                  <div> 3 times a day</div>
                                  <div> When necessary</div>
                                  <div> After Meal</div>
                                </div>
                                <div class="box-div list-box">
                                  <i class="far fa-times-circle"></i>
                                  <div> Paracetamol</div>
                                  <div> 500 mg</div>
                                  <div> 3 times a day</div>
                                  <div> When necessary</div>
                                  <div> After Meal</div>
                                </div>
                                <div class="box-div list-box">
                                  <i class="far fa-times-circle"></i>
                                  <div> Paracetamol</div>
                                  <div> 500 mg</div>
                                  <div> 3 times a day</div>
                                  <div> When necessary</div>
                                  <div> After Meal</div>
                                </div>
                              </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer">
                <div class="footer-div">
                    <div class="dots-div">
                        <a href="purchase_order_2 (PAGE).php" style="text-decoration: none;"> <span class="dot" style="background-color: black;"></span></a>
                        <a href="purchase_order (PAGE).php" style="text-decoration: none;"><span class="dot"></span></a>
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
</body>

</html>