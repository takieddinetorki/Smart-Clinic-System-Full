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
    <link rel="stylesheet" href="styles/purchase_order.css">
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
            <div class="main-container">
                <div class="head">
                    PURCHASE ORDER
                </div>
                <div class="top-items">
                    <div id="code">
                        PO NO
                        <p id="poNo" style="display: none;"></p>
                    </div>
                    <div class="cl-btn" onclick="show('modal3')">
                        <i class="fas fa-times-circle"></i>
                    </div>
                </div>

                <form id="vendorForm">
                <div style="overflow-y: hidden;" class="table-wrapper-scroll-y" id="page1">

                    <div class="box-wrapper">
                        <div class="box">
                            <div class="box-title">
                                VENDOR
                            </div>

                            <div class="box-content">
                                <div class="box-content-head">
                                    Details
                                </div>
                                <div class="box-content-items">
                                    <div>
                                        <label> Code</label>
                                        <select type="text" pattern="^\d*[a-zA-Z][a-zA-Z0-9]*$" id="vendorCode" class="input_diag" style="width: 100px;" required>
                                            <?php
                                                $staff->getAllVendorCodes();
                                            ?>
                                        </select>
                                    </div>
                                    <div>
                                        <label> Name</label>
                                        <input type="text" id="vendorName" style="width: 280px;" disabled>
                                    </div>
                                    <div>
                                        <label>Address</label>
                                        <input type="text" id="address" style="width: 280px;" disabled>
                                    </div>
                                    <div>
                                        <label style="visibility: hidden;">Address</label>
                                        <input type="text" style="width: 280px; " disabled>
                                    </div>
                                    <div>
                                        <label style="visibility: hidden;">Address</label>
                                        <input type=" text" style="width: 280px; " disabled>
                                    </div>

                                    <div>
                                        <label>Contact Person</label>
                                        <input type="text" id="contactPerson" style="width: 200px;" disabled>
                                    </div>
                                    <div>
                                        <label>Contact No.</label>
                                        <input type="text" id="contactNo" style="width: 200px;" disabled>
                                    </div>

                                </div>

                            </div>

                        </div>


                        <div class="box">
                            <div class="box-title">
                                DELIVERY
                            </div>

                            <div class="box-content">
                                <div class="box-content-head">
                                    Details
                                </div>
                                <div class="box-content-items">
                                    <div>
                                        <label for="Date">Delivery Date</label>
                                        <span>
                                            <input type="text" id="deliveryDate" class="datepicker-here" data-date-format="yyyy-mm-dd" data-language="en"
                                                style="width: 140px;" required>
                                            <i style="position: relative; right: 32px;" class="far fa-calendar-alt"
                                                aria-hidden="true"></i>
                                        </span>

                                    </div>

                                    <div>
                                        <label> Delivery Address</label>
                                        <input type="text" id="deliveryAddress" class="input_diag" style="width: 280px;" required>
                                    </div>
                                    <div>
                                        <label>Quotation No.</label>
                                        <input type="text" id="quotationNo" style="width: 200px;" required>
                                    </div>
                                    <div>
                                        <label>Payment Term</label>
                                        <input type="text" id="paymentTerm" class="input_diag" style="width: 200px;" required>
                                    </div>
                                    <div>
                                        <label>Contact Person</label>
                                        <input type="text" id="contactPerson" class="input_diag" style="width: 200px;" required>

                                    </div>

                                    <div>
                                        <label>Contact No.</label>
                                        <input type="text" id="contactNo" class="input_diag" style="width: 200px;" required>
                                    </div>
                                    <div>
                                        <label>Delivery Charges</label>
                                        <input type="text" id="deliveryCharge" placeholder="RM" id="delivery-charges" style="width: 200px;"
                                            onchange="changedInput(this)" required>
                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                </form>

                

                <div style="overflow-y: hidden; display: none;" class="table-wrapper-scroll-y" id="page2">
                    <div class="box-wrapper">
                        <div class="box">
                            <div class="box-title">
                                ITEMS
                            </div>

                            <div class="box-content">
                                <div class="box-content-head">
                                    Details
                                </div>
                                <form id="itemForm">
                                    <div class="box-content-items">
                                        <div>
                                            <label> Code</label>
                                            <select type="text" id="itemCode" class="input_diag" style="width: 100px;" required>
                                                <?php
                                                    $staff->getAllMedicineCodes();
                                                ?>
                                            </select>
                                        </div>
                                        <div>
                                            <label> Name</label>
                                            <input type="text" id="itemName" style="width: 280px;" disabled>
                                        </div>
                                        <div>
                                            <label>Description</label>
                                            <input type="text" id="desc" style="width: 280px;" required>
                                        </div>
                                        <div>
                                            <label style="visibility: hidden;">Description</label>
                                            <input type="text" style="width: 280px; " id="desc2">
                                        </div>

                                        <div>
                                            <label>Unit Price</label>
                                            <input type="text" id="unitPrice" style="width: 150px;" onchange="changedInput(this)" required>
                                        </div>
                                        <div>
                                            <label>Quantity</label>
                                            <input type="number" min="1" id="quantity" style="width: 150px;" required>
                                        </div>
                                        <button type="submit" form="itemForm" class="plus-icon">
                                            <i class="fas fa-plus" style="margin-top: 0"></i>
                                        </button>
                                    </div>
                                    <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
                                </form>

                            </div>

                        </div>
                        <div class="box">
                            <div class="box-title">
                                LISTING
                            </div>
                            <div id="listing" class="table-wrapper-scroll-y" style="text-transform: uppercase;overflow-y: scroll;max-height: 430px;">
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
                                <button class="modalBtn2" type="submit" form="vendorForm">Yes</button>
                                <button class="modalBtn2" type="button" onclick="closeModal('modal2'); return false;">No</button>
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
                                <button class="modalBtn3" type="button" onclick="window.location='purchase_order_table (PAGE).php'">No</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            </div>
            <!-- save modal till here -->

            <div class="footer">
                <div class="footer-div">
                    <div class="dots-div">
                        <a href="#" onclick="show('page1'); closeModal('page2'); toggleDotColor('dot1', 'dot2'); return false;" style="text-decoration: none;"><span class="dot" id="dot1" style="background: black;"></span></a>
                        <a href="#" onclick="show('page2'); closeModal('page1'); toggleDotColor('dot1', 'dot2'); return false;" style="text-decoration: none;"> <span class="dot" id="dot2"></span></a>
                       
                    </div>
                    <div class="icons-div">
                        <button class="icons" type="submit" form="vendorForm">
                            <img src="src/img/save-file-option.png" alt="save" style="margin-top: 0;">
                        </button>
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

    <!-- YY => backend script -->
    <script>
        // adding ordered item to an js object then send it to a script to add the items into the table
        var itemList = [];
        var totalMedicineCost = 0;

        // to delete item
        function deleteItem(index) {
            totalMedicineCost -= +(calculateMedicineCost(itemList[index].price, itemList[index].quantity));
            itemList.splice(itemList.findIndex((item) => item.index == index), 1);
            populateList();
        }

        // to calculate per item cost
        function calculateMedicineCost(price, quantity){ 
            return parseFloat(price) * parseFloat(quantity);
        }

        function populateList() {
            $('#listing').html('');
            itemList.forEach((item) => {
                let currentListing = $('#listing').html();
                currentListing += `
                    <div class="box-div list-box">
                        <i class="far fa-times-circle" onclick="deleteItem(${item.index})"></i>
                        <div onclick="testing()">${item.itemName}</div>
                        <div>${item.description}</div>
                        <div>RM ${item.unitPrice}</div>
                        <div>${item.quantity} unit</div>
                        <div>RM ${item.price}</div>
                    </div>
                `;
                $('#listing').html(currentListing);
            });
        }

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

        $(document).ready(function() {
            if(getUrlVars()['id']) {
                var pon = id;
                $('#poNo').val(pon);
            }else {
                var pon = "<?php $id = new ID(''); echo $id->generateID('purchase'); ?>";
                $('#poNo').val(pon);
            }

            // getting the vendor information
            $('#vendorCode').change(function() {
                var value = $(this).val();
                if (value){
                    $.post('byCMkGnmDa3mXlyfgPh/inventory_module/getVendorByCode.php', {
                        code: value
                    }, function(data) {
                        if (data != null) {
                            var results = jQuery.parseJSON(data);
                            $('#vendorName').val(results.name);
                            $('#address').val(results.address);
                            $('#contactPerson').val(results.contactedPerson);
                            $('#contactNo').val(results.contactNo);
                        }
                    });
                }else {
                    $('#vendorName').val('');
                    $('#address').val('');
                    $('#contactPerson').val('');
                    $('#contactNo').val('');
                }
            });

            // gettin the medicines name
            $('#itemCode').change(function() {
                var value = $(this).val();
                if (value){
                    $.post('byCMkGnmDa3mXlyfgPh/api/medicineCRUD_backupScript.php', {
                        value
                    }, function(data) {
                        if (data != null) {
                            var results = jQuery.parseJSON(data);
                            $('#itemName').val(results.name);
                        }
                    });
                }else {
                    $('#itemName').val('');
                }
            });

            // to calculate the total cost for a purchase 
            let deliveryCost = 0;
            $('#deliveryCharge').change(function(){
                deliveryCost = parseFloat($('#deliveryCharge').val().substring(3));
            });

            let index = 0;
            $('#itemForm').submit(function() {
                let itemCode = $('#itemCode').val();
                let itemName = $('#itemName').val();
                let desc = $('#desc').val();
                let desc2 = $('#desc2').val();
                let unitPrice = $('#unitPrice').val().substring(3);
                let quantity = $('#quantity').val();
                let price = (parseFloat(unitPrice)*quantity).toFixed(2);
                totalMedicineCost += +(calculateMedicineCost(unitPrice, quantity).toFixed(2));
                
                let currentIndex = index++;
                let item = {
                    index: currentIndex,
                    itemCode: itemCode,
                    itemName: itemName,
                    description: desc + desc2,
                    unitPrice: unitPrice,
                    quantity: quantity,
                    price: price,
                    poNo: $('#poNo').val()
                };

                itemList.push(item);
                populateList();
                $('#itemForm').trigger("reset");
                return false;
            });

            // upon clicking on the submit button 
            var totalCost = 0;
            $('#vendorForm').submit(function(event) {
                // adding delivery information to a object 
                var deliveryInfo = {
                    date: $('#deliveryDate').val(),
                    address: $('#deliveryAddress').val(),
                    quotion: $('#quotationNo').val(),
                    paymentTerm: $('#paymentTerm').val(),
                    contactPerson: $('#contactPerson').val(),
                    contactNo: $('#contactNo').val(),
                    deliveryCharge: parseFloat($('#deliveryCharge').val().substr(3))
                };
                totalCost = totalMedicineCost + deliveryCost;
                let tableData = {
                    poNo: $('#poNo').val(),
                    vendorCode: $('#vendorCode').val(),
                    deliveryInfo: deliveryInfo,
                    items: itemList,
                    totalCost: totalCost
                };
                event.preventDefault();
                if (tableData != null) {
                    tableData = JSON.stringify(tableData);
                    $.post('byCMkGnmDa3mXlyfgPh/api/addPurchaseOrderScript.php', {
                        tableData
                    }, function(data,status) {
                        window.location = 'purchase_order_table (PAGE).php';
                    });
                }
            });

        });

    </script>

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
        function toggleDotColor(x, y) {
            let colorX = document.getElementById(x).style.background;
            let colorY = document.getElementById(y).style.background;
            document.getElementById(x).style.background = colorY;
            document.getElementById(y).style.background = colorX;
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
    <script>
        function changedInput(t) {
            if (isNaN(t.value)) {
                alert("Type Number Only");
                t.value = "";
            } else {
                var value = "RM " + parseFloat(t.value).toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
                t.value = value;
            }
        }
    </script>
</body>


</html>