<?php
    require_once 'byCMkGnmDa3mXlyfgPh/core/init.php';
    $staff = new Staff;
    $user = new User;
    if (!$user->loggedIn()) {
        Redirect::to('index.php');
    }
?>

<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Clinic Name</title>
    <link rel="stylesheet" href="styles/layout.css" />
    <link rel="stylesheet" href="styles/inventory_form.css">
    <link rel="stylesheet" href="styles/footer.css">
    <link rel="stylesheet" href="styles/modals.css">

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



            <div class="inventory-container-wrapper table-wrapper-scroll-y">
                <div class="form-container">
                    <i class="cl-icon fas fa-times-circle" aria-hidden="true" style="cursor: pointer;" onclick="show('modal3')"></i>
                    <form id="myForm" class="invent-form">

                        <div>
                            <label for="code">Item Code</label>
                            <select style="width: 136px;" type="text" name="code" id="itemCode" required>
                                <?php
                                    $staff->getAllMedicineCodes();
                                ?>
                            </select>
                        </div>
                        <div>
                            <label for="name">Name</label>
                            <input style="width: 380px;" type="text" name="name" id="name" required disabled>
                        </div>
                        <div>
                            <label for="stock">Stock</label>
                            <input style="width: 136px;" type="number" name="stock" id="stock" required>
                        </div>

                        <div class="date">
                            <label for="Date">Expiry Date</label>
                            <span>
                                <input class="datepicker-here" data-date-format="yyyy-mm-dd" data-language="en" id="expiryDate" required>
                                <i style="position: relative; right: 32px;" class="far fa-calendar-alt"
                                    aria-hidden="true"></i>
                            </span>

                        </div>



                        <input id="inreg-submit" name="register" type="submit" value="SUBMIT" />
                    </form>



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
                                <button class="modalBtn2" type="button" onclick="deleteInventory()">Yes</button>
                                <button class="modalBtn2" type="button" onclick="closeModal('modal2')">No</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            </div>
            <!-- delete modal till here -->
            <!-- save modal here -->
            <div id="modal3" class="modal pdl">
            <div class="modal-wrap">
                <div class="modalContent3">
                    <form style="margin-top: 7px;">
                        <div style="text-align: center;margin-top: 25px;">
                            <p class="label-modal3">Want to save the changes made?</label>
                            <div class="form-div-modal3">
                                <button class="modalBtn3" type="submit" form="myForm" onclick="closeModal('modal3')">Yes</button>
                                <button class="modalBtn3" type="button" onclick="backToInventoryPage()">No</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            </div>
            <!-- save modal till here -->


            <div class="footer">
                <div class="footer-div">

                    <div class="icons-div">
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
        function closeModal(x) {
            document.getElementById(x).style.display = "none";
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

    <!-- YY => backend script -->
    <script>
        function getUrlVars() {
            var vars = [],
                hash;
            var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
            for (var i = 0; i < hashes.length; i++) {
                hash = hashes[i].split('=');
                vars.push(hash[0]);
                vars[hash[0]] = hash[1];
            }
            return vars;
        }

        function backToInventoryPage() {
            window.location = 'inventory(PAGE).php';
        }

        function deleteInventory() {
            if(getUrlVars()["id"]) {
                $.post('byCMkGnmDa3mXlyfgPh/inventory_module/inventoryCUD.php', {
                    id: getUrlVars()["id"],
                    action: 'delete'
                }, function(data) {
                    if (data != null) {
                        var results = jQuery.parseJSON(data);
                        if (results.status == 'passed') backToInventoryPage();
                        else alert('A Problem Occur while deleting the inventory');
                    }
                });
            }else {
                backToInventoryPage();
            }
        }

        $(document).ready(function() {
            //edit page
            if(getUrlVars()["id"]) {
                $.post('byCMkGnmDa3mXlyfgPh/inventory_module/getInventoryById.php', {
                    id: getUrlVars()["id"]
                }, function(data) {
                    if (data != null) {
                        //populate form
                        var results = jQuery.parseJSON(data);
                        $('#itemCode').val(results.itemCode);
                        $('#name').val(results.name);
                        $('#expiryDate').val(results.expiry);
                        $('#stock').val(results.quantity);
                    }
                });
            }

            //item code on change
            $('#itemCode').change(function() {
                let itemCode = ($('#itemCode').val());  
                if(itemCode) {
                    $.post('byCMkGnmDa3mXlyfgPh/api/medicineCRUD_backupScript.php', {
                        value: itemCode
                    }, function(data) {
                        if (data != null) {
                            let medicineDate = jQuery.parseJSON(data);
                            $('#name').val(medicineDate.name);
                        }
                    });
                }else {
                    $('#name').val('');
                }
            });


            //submit
            $('#myForm').submit(function() {
                event.preventDefault();
                if(getUrlVars()["id"]) {
                    //edit  
                    $.post('byCMkGnmDa3mXlyfgPh/inventory_module/inventoryCUD.php', {
                        id: getUrlVars()["id"],
                        itemCode: $('#itemCode').val(),
                        expiryDate: $('#expiryDate').val(),
                        quantity: $('#stock').val(),
                        action: 'edit'
                    }, function(data) {
                        if (data != null) {
                            var results = jQuery.parseJSON(data);
                            if (results.status == 'passed') backToInventoryPage();
                            else alert('A Problem Occur while editing the inventory');
                        }
                    });
                }else {
                    //add new inventory
                    $.post('byCMkGnmDa3mXlyfgPh/inventory_module/inventoryCUD.php', {
                        itemCode: $('#itemCode').val(),
                        expiryDate: $('#expiryDate').val(),
                        quantity: $('#stock').val(),
                        action: 'add'
                    }, function(data) {
                        if (data != null) {
                            var results = jQuery.parseJSON(data);
                            if (results.status == 'passed') backToInventoryPage();
                            else alert('A Problem Occur while adding the inventory');
                        }
                    });
                }
            });
        });
    </script>
</body>

</html>