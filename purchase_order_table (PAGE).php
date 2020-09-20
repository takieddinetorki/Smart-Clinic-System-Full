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
    <link rel="stylesheet" href="styles/footer.css">
    <link rel="stylesheet" href="styles/modals.css">
    <link rel="stylesheet" href="styles/purchase_order_table.css">

    <script src="https://kit.fontawesome.com/d814c57d3c.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- for fonts -->
    <script src="https://secure.exportkit.com/cdn/js/ek_googlefonts.js"></script>

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
                    <a href="#" class="searching-button"><img class="nav-icon" src="src/img/magnify-glass.svg" alt="" /></a>

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

        <?php include 'sidebar.php'; ?>
        <div class="main">
            <div class="head">
                <h1>PURCHASE ORDER</h1>
            </div>

            <div style="width: 100%; max-width: 1050px;">

                <div class="tabl">
                    <div class="cl-btn">
                        <a href="inventory(PAGE).php" style="text-decoration: none;">
                            <i class="fas fa-times-circle" style="color: #444242;"></i>
                        </a>
                    </div>
                    <div class="table-nav">
                        <div style="display: flex;">
                            <div class="tablenav-indiv">
                                <label for="sid">Starting Vendor Code</label>
                                <select name="sid" id="sid">
                                    <?php
                                    $staff->getAllVendorCodes();
                                    ?>
                                </select>
                            </div>
                            <div>
                                <label style="margin-left:20px;" class="ml-0" for="eid">Ending Vendor Code</label>
                                <select name="eid" id="esid">
                                    <?php
                                    $staff->getAllVendorCodes();
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div style="display: flex;" id="tn-div2">
                            <div class="tablenav-indiv">
                                <label style="margin-left:20px;" class="ml-0" for="from">From</label>
                                <span>
                                    <input id="fromDate" class="datepicker-here" data-date-format="yyyy-mm-dd" data-language='en'>
                                    <i class="far fa-calendar-alt" style="font-size: 12;"></i>
                                </span>

                            </div>
                            <div>
                                <label for="to">To</label>
                                <span id="to-span">
                                    <input id="toDate" class="datepicker-here" data-date-format="yyyy-mm-dd" data-language='en'>
                                    <i class="far fa-calendar-alt" style="font-size: 12;"></i>
                                </span>

                            </div>
                        </div>

                    </div>

                    <div class="table-wrapper-scroll-y" style="overflow-y: hidden;">
                        <table class="table" id="listAllPurchaseOrder" style="max-width: 1050; min-width: 1050px;">
                            <thead>
                                <tr>
                                    <th style="width:70px;border-left: none;">No</th>
                                    <th style="width:110px">Date <i class="fas fa-sort"></i></th>
                                    <th style="width:200px">Vendor Code <i class="fas fa-sort"></i></th>
                                    <th style="width:370px">Vendor Name <i class="fas fa-sort"></i></th>
                                    <th style="width: 150px;">PO. No</th>
                                    <th style="width: 110px; padding-left: 20px; border-right: none;">Amount</th>

                                </tr>
                            </thead>
                            <tbody style="max-height: calc(100vh - 305px);min-height: 200px;" class="table-wrapper-scroll-y">

                            </tbody>
                        </table>

                    </div>

                    <div class="footer">
                        <div class="footer-div">
                            <div class="icons-div">
                                <div class="icons">
                                    <a href="purchase_order (PAGE).php" style="text-decoration: none;"> <i style="color: #444242;" class="fas fa-plus"></i></a>

                                </div>
                                <div class="icons" onclick="show('modal1')">
                                    <img src="src/img/printer.png" alt="printer">
                                </div>
                                <div class="icons" onclick="show('modal2')">
                                    <img src="src/img/rubbish-bin.png" alt="delete">
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
                    <!-- print modal 4 here  0/1 -->
                    <div id="modal6" class="modal pdl">
                        <div class="modal-wrap">
                            <div class="modalContent6">
                                <form style="margin-top: 15px;">
                                    <div class="form-div-modal6 category_1">
                                        <label for="from" class="label-modal6">Starting Date</label>
                                        <span>
                                            <input type="text" id="from" class="inp-modal6 datepicker-here" data-language="en"><i class="far fa-calendar-alt"></i>
                                        </span>
                                    </div>
                                    <div class="form-div-modal6 category_2">
                                        <label for="from" class="label-modal6">Starting Vendor Code</label>
                                        <span>
                                            <select type="text" id="from" class="inp-modal6 " style="background-position-y: 5px;">
                                            </select>
                                        </span>
                                    </div>
                                    <div class="form-div-modal6 category_1">
                                        <label for="to" class="label-modal6">Ending Date</label>
                                        <span>
                                            <input type="text" id="to" class="inp-modal6 datepicker-here" data-language="en"><i class="far fa-calendar-alt"></i>
                                        </span>
                                    </div>
                                    <div class="form-div-modal6 category_2">
                                        <label for="from" class="label-modal6">Ending Vendor Code</label>
                                        <span>
                                            <select type="text" id="from" class="inp-modal6" style="background-position-y: 5px;">
                                            </select>
                                        </span>
                                    </div>
                                    <div class="form-div-modal6" style="margin-left: -26px;">
                                        <div class="form-div-div-modal6" style="justify-content: flex-end;margin-right: 10px;">
                                            <input type="radio" name="date" id="date" class="inp-radio" oninput=" toggleDivfr('category_1','category_2')">
                                            <label for="date">Date</label>
                                        </div>
                                        <div class="form-div-div-modal6">
                                            <input type="radio" name="date" id="date" class="inp-radio" oninput=" toggleDivfr('category_2','category_1')">
                                            <label for="date">Vendor</label>
                                        </div>
                                    </div>
                                </form>
                                <div class="text-center">
                                    <button class="modalBtn6" type="submit">PRINT</button>
                                </div>
                            </div>
                            <div class="modal-wrap">
                            </div>
                            <!-- print modal 4 till here 1/1 -->

                        </div>
                        <div class="footer">
                            <div class="footer-div">
                                <div class="icons-div">
                                    <div class="icons">
                                        <a href="purchase_order (PAGE).php" style="text-decoration: none;"> <i class="fas fa-plus" style="color: #444242;"></i></a>
                                    </div>
                                    <div class="icons" onclick="show('modal6')">
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

</body>

<script>
    function getDate(_date) {
        let newDate = new Date(_date);
        const date = newDate.getDate();
        const month = newDate.getMonth() + 1;
        const year = newDate.getFullYear();
        return date + "-" + month + "-" + year;
    }

    function populateTable(rawData) {
        let purchaseOrder = '';
        let index = 1;
        if (Array.isArray(rawData)) {
            rawData.forEach((e) => {
                purchaseOrder += `
                <tr ondblclick="window.location='purchase_order (PAGE).php?id=${e.poNo}';">
                    <td style="display:none">${e.poNo}</td>
                    <td style="width:70px;border-left: none;">${index++}</td>
                    <td style="width:110px">${getDate(e.deliveryDate)}</td>
                    <td style="width:200px">${e.vendorCode}</td>
                    <td style="width:370px">${e.name}</td>
                    <td style="width:150px;">${e.poNo}</td>
                    <td style=" width:121px;border-right:none">${e.totalAmmount}</td>
                </tr>
                `;
            });
        } else {
            purchaseOrder = rawData;
        }
        $('#listAllPurchaseOrder tbody').html(purchaseOrder);
    }

    function queryPurchaseOrder() {
        let vendorStart = ($('#sid').val());
        let vendorEnd = ($('#esid').val());
        let fromDate = ($('#fromDate').val());
        let toDate = ($('#toDate').val());

        if (!vendorStart && !vendorEnd && !fromDate && !toDate) return;
        $.post('byCMkGnmDa3mXlyfgPh/inventory_module/getCustomPurchaseOrder.php', {
            start: vendorStart,
            end: vendorEnd,
            from: fromDate,
            to: toDate
        }, function(data) {
            if (data != null) {
                var results = jQuery.parseJSON(data);
                populateTable(results);
            }
        });
    }

    $(document).ready(function() {
        let data = <?php $staff->listAllPurchaseOrder(); ?>;
        populateTable(data);

        $('#sid').change(function() {
            let vendorStart = ($('#sid').val());
            let vendorEnd = ($('#esid').val());
            let options = $('#esid option');
            if (vendorStart !== '') {
                for (var i = 0; i < options.length; i++) {
                    if (options[i].text >= vendorStart)
                        $(options[i]).css("display", "block");
                    else
                        $(options[i]).css("display", "none");
                }
                if (vendorEnd < vendorStart) {
                    $('#esid').val('');
                }
            } else {
                for (var i = 0; i < options.length; i++) {
                    $(options[i]).css("display", "block");
                }
            }
        });

        $("#fromDate, #toDate").datepicker({
            onSelect: function(dateText) {
                queryPurchaseOrder();
            }
        });

        $('#sid, #esid').change(function() {
            queryPurchaseOrder();
        });

        //Table sorter
        $('th').click(function() {
            var table = $(this).parents('table').eq(0)
            var rows = table.find('tr:gt(0)').toArray().sort(comparer($(this).index()))
            this.asc = !this.asc;
            if (!this.asc) {
                rows = rows.reverse()
            }
            for (var i = 0; i < rows.length; i++) {
                table.append(rows[i])
            }
        });

        function comparer(index) {
            return function(a, b) {
                var valA = getCellValue(a, index),
                    valB = getCellValue(b, index)
                return $.isNumeric(valA) && $.isNumeric(valB) ? valA - valB : valA.toString().localeCompare(valB)
            }
        }

        function getCellValue(row, index) {
            return $(row).children('td').eq(index).text()
        }

    });
</script>

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

    function toggleDivfr(x, y) {
        var ele = document.getElementsByClassName(x);
        for (i = 0; i < ele.length; i++) {
            ele[i].style.display = "flex";
        }
        var ele2 = document.getElementsByClassName(y);
        for (i = 0; i < ele2.length; i++) {
            ele2[i].style.display = "none";
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