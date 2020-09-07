<?php
    require_once 'byCMkGnmDa3mXlyfgPh/core/init.php';
    $staff = new Staff;
    $user = new User;
    $clinic = new ClinicDB;
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
    <link rel="stylesheet" href="styles/inventory_m.css">
    <link rel="stylesheet" href="styles/modals.css">
    <script src="src/js/layout.js"></script>

    <script src="https://kit.fontawesome.com/d814c57d3c.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- for fonts -->
    <script src="https://secure.exportkit.com/cdn/js/ek_googlefonts.js"></script>

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
                <form id="searchForm">
                    <div class="dropdown-box">
                        <input type="text" name="search" id="searchValue" autocomplete="off" />
                        <a href="#" id="searchButton" class="searching-button"><img class="nav-icon" src="src/img/magnify-glass.svg"
                                alt="" /></a>

                        <div class="searchbar-dropdown">
                            <input type="radio" id="search-by-code" name="src" value="itemCode"/>
                            <label for="search-by-id">Search by Code</label>
                            <br />
                            <br />
                            <input type="radio" id="search-by-name" name="src" value="name"/>
                            <label for="search-by-name">Search by Name</label>
                        </div>
                    </div>
                </form>
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
                <div class="tabl">
                    <div class="table-nav">
                        <div style="display: flex;">
                            <div class="tablenav-indiv">
                                <label for="sid">Starting Item Code</label>
                                <select name="sid" id="sid">
                                    <option value=""></option>
                                </select>
                            </div>
                            <div>
                                <label style="margin-left:20px;" class="ml-0" for="eid">Ending Item
                                    Code</label>
                                <select name="eid" id="esid">
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                        <div>
                            <a href="purchase_order_table (PAGE).php" style="text-decoration: none;"> <div class="purchase-button" style="color: #444242;">
                                PURCHASE ORDER
                            </div></a>
                           
                        </div>
                    </div>

                    <div class="table-wrapper-scroll-y" style="overflow-y: hidden;">
                        <table class="table" style="max-width: 1020px; min-width: 1020px;"  id="listAllInventory">
                            <thead>
                                <tr>
                                    <th style="width:50px;border-left: none;">No</th>
                                    <th style="width:130px" id='itemCodeTh'>ITEM CODE <i class="fas fa-sort"></i></th>
                                    <th style="width:470px">ITEM NAME <i class="fas fa-sort"></i></th>
                                    <th style="width:180px">EXPIRY DATE <i class="fas fa-sort"></i></th>
                                    <th style="width: 150px; padding-left: 20px; border-right: none;">STOCK (UNIT)<i
                                            class="fas fa-sort"></i></th>
                                </tr>
                            </thead>
                            <tbody style="max-height: calc(100vh - 310px);min-height: 200px;"
                                class="table-wrapper-scroll-y">
                            </tbody>
                        </table>
                    </div>
                </div>

                <script>
                    function getDate(_date) {
                        let newDate = new Date(_date);
                        const date = newDate.getDate();
                        const month = newDate.getMonth() + 1;
                        const year = newDate.getFullYear();
                        return date + "-" + month + "-" + year;
                    }

                    function populateInventory(rawData) {
                        let inventories = '';
                        let index = 1;
                        if(Array.isArray(rawData)) {
                            rawData.forEach((e) => {
                                inventories += `
                                <tr ondblclick="window.location='inventory_form (PAGE).php?id=${e.inventoryID}';">
                                    <td style="display:none;">${e.inventoryID}</td>
                                    <td style="width:50px;border-left: none;">${index++}</td>
                                    <td style="width:130px">${e.itemCode}</td>
                                    <td style="width:470px">${e.name}</td>
                                    <td style="width:180px">${getDate(e.expiry)}</td>
                                    <td style=" width:164px;border-right:none">${e.quantity}</td>
                                </tr>
                                `;
                            });
                        }else {
                            inventories = rawData;
                        }
                        $('#listAllInventory tbody').html(inventories);
                    }

                    function populateItemCodeList(rawData, elementId, startValue=null) {
                        rawData.forEach((e) => {
                            if((startValue && e.itemCode >= startValue) || startValue == null) {
                                var x = document.getElementById(elementId);
                                let option = new Option(e.itemCode,e.itemCode);
                                x.add(option);
                            }
                        });
                    }

                    function deleteInventory() {
                        var selected = [];
                        $("#listAllInventory tr.selected").each(function(){
                            selected.push($('td:first', this).html());
                        });
                        selected.forEach((id) => {
                            console.log('selected id:', id);
                            $.post('byCMkGnmDa3mXlyfgPh/inventory_module/inventoryCUD.php', {
                                id: id,
                                action: 'delete'
                            }, function(data) {
                                if (data != null) {
                                    var results = jQuery.parseJSON(data);
                                    if (results.status == 'passed') ;
                                    else alert('A Problem Occur while deleting the inventory');
                                }
                            });
                        })
                        window.location.reload(true);
                    }

                    $(document).ready(function() {
                        let inventoryData = <?php $staff->listAllInventory(); ?>;
                        populateInventory(inventoryData);

                        let itemCodeData = <?php $staff->getAllItemCodes(); ?>;
                        populateItemCodeList(itemCodeData, "sid");
                        populateItemCodeList(itemCodeData, "esid");
                        populateItemCodeList(itemCodeData, "modalSid");
                        populateItemCodeList(itemCodeData, "modalEsid");

                        //Table sorter
                        $('th').click(function(){
                            var table = $(this).parents('table').eq(0)
                            var rows = table.find('tr:gt(0)').toArray().sort(comparer($(this).index()))
                            this.asc = !this.asc;
                            if (!this.asc) {
                                rows = rows.reverse()
                            }
                            for (var i = 0; i < rows.length; i++){table.append(rows[i])}
                        });

                        function comparer(index) {
                            return function(a, b) {
                                var valA = getCellValue(a, index), valB = getCellValue(b, index)
                                return $.isNumeric(valA) && $.isNumeric(valB) ? valA - valB : valA.toString().localeCompare(valB)
                            }
                        }

                        function getCellValue(row, index){ 
                            return $(row).children('td').eq(index).text() 
                        }

                        //Drop down on change
                        $('#modalSid').change(function() {
                            let modalStart = ($('#modalSid').val()); 
                            if(modalStart !== '') {
                                $('#modalEsid').empty();
                                let itemCodeData = <?php $staff->getAllItemCodes(); ?>;
                                populateItemCodeList(itemCodeData, "modalEsid", modalStart);
                                document.getElementById("modalEsid").value = '';
                            }
                        });

                        $('#sid').change(function() {
                            let start = ($('#sid').val());    
                            let end = ($('#esid').val());

                            if(start !== '') {
                                $('#esid').empty();
                                let itemCodeData = <?php $staff->getAllItemCodes(); ?>;
                                populateItemCodeList(itemCodeData, "esid", start);
                                if(end < start) {
                                    document.getElementById("esid").value = '';
                                }
                            }

                            if(start == '' && end == '') {
                                let inventoryData = <?php $staff->listAllInventory(); ?>;
                                populateInventory(inventoryData);
                            }else {
                                end = ($('#esid').val());
                                $.post('byCMkGnmDa3mXlyfgPh/inventory_module/getCustomInventory.php', {
                                    start: start,
                                    end: end
                                }, function(data) {
                                    if (data != null) {
                                        let inventoryData = jQuery.parseJSON(data);
                                        populateInventory(inventoryData);
                                    }
                                });
                            }
                        });

                        $('#esid').change(function() {
                            let start = ($('#sid').val());    
                            let end = ($('#esid').val());
                            if(start == '' && end == '') {
                                let inventoryData = <?php $staff->listAllInventory(); ?>;
                                populateInventory(inventoryData);
                            }else {
                                $.post('byCMkGnmDa3mXlyfgPh/inventory_module/getCustomInventory.php', {
                                    start: start,
                                    end: end
                                }, function(data) {
                                    if (data != null) {
                                        let inventoryData = jQuery.parseJSON(data);
                                        populateInventory(inventoryData);
                                    }
                                });
                            }
                        });

                        //search
                        $('#searchButton').click(function(){ 
                            let value = ($('#searchValue').val()); 
                            let searchKey = $('input[name=src]:checked', '#searchForm').val();
                            if(searchKey) {
                                $.post('byCMkGnmDa3mXlyfgPh/inventory_module/searchInventory.php', {
                                    searchKey: searchKey,
                                    value: value
                                }, function(data) {
                                    if (data != null) {
                                        let inventoryData = jQuery.parseJSON(data);
                                        populateInventory(inventoryData);
                                    }
                                });
                            }
                            return false; 
                        });

                        //select row on table 
                        $("#listAllInventory tr").click(function(e){
                            if(e.ctrlKey) {
                                $(this).toggleClass('selected');
                                console.log('ctrl key');
                            }
                        });


                    });
                </script>


                <!-- delete modal here -->
                <div id="modal2" class="modal pdl">
                <div class="modal-wrap">
                    <div class="modalContent2">
                        <form style="margin-top: 7px;">
                            <div style="text-align: center;margin-top: 25px;">
                                <p class="label-modal2">Are you sure to delete?</label>
                                <div class="form-div-modal2">
                                    <button class="modalBtn2" type="submit" onclick="deleteInventory(); return false;">Yes</button>
                                    <button class="modalBtn2" type="button" onclick="closeModal('modal2'); return false;">No</button>
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
                                <label for="modalSid" class="label-modal9">Starting Item Code</label>
                                <select name="sid" id="modalSid" class="inp-modal9">
                                    <option selected disabled hidden></option>
                                </select>
                            </div>
                            <div class="form-div-modal9">
                                <label for="modalEsid" class="label-modal9">Ending Item Code</label>
                                <select name="eid" id="modalEsid" class="inp-modal9">
                                    <option selected disabled hidden></option>
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


                <div class="footer">
                    <a href="inventory-patients(PAGE).php" style="text-decoration: none;"><div class="icons" style="background-color: #a3a3a3;">
                        <i class="fa fa-smile-o" style="color: #444242;" aria-hidden="true"></i>
                    </div></a>
                    
                    <div class="footer-scan" onclick="show('modal10')">
                        SCAN BARCODE
                    </div>
                    <div class="footer-div">
                        <div class="icons-div">
                            <div class="icons">
                                <a href="inventory_form (PAGE).php" style="text-decoration: none;">  <i class="fas fa-plus" style="color: #444242;"></i></a>
                            </div>
                            <div class="icons" onclick="show('modal9')">
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