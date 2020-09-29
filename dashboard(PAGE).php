<?php
require_once 'byCMkGnmDa3mXlyfgPh/core/init.php';

$user = new User;
$clinic = new ClinicDB;
$staff = new Staff();
?>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Smart Clinic <?php if ($user->loggedIn()) echo deescape($clinic->getClinicInfo('clinicName', 'clinicID', $user->data()->clinicID));
                        else echo " Log in to show clinic" ?></title>
    <link rel="stylesheet" href="styles/layout.css" />
    <link rel="stylesheet" href="styles/dashboard.css">
    <link rel="stylesheet" href="styles/dashboard_page.css">
    <script src="https://secure.exportkit.com/cdn/js/ek_googlefonts.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body onload="sidebarActivelink('dashboard(PAGE)')">
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
            <div style="width:100%; max-width: fit-content ">
                <div style="width: fit-content;">
                    <select name="timeStatus" id="timeStatus" class="date-select" onchange="populate()">
                        <option value="month" selected>This Month</option>
                        <option value="week">This Week</option>
                        <option value="year">This Year</option>
                    </select>

                    <div class="dashboard-cards">
                        <div class="box-wrapper">
                            <div class="box-gray">
                                <div>
                                    <p id="newP">125</p>
                                    <p>New Patients</p>
                                </div>
                                <div>
                                    <img src="src/img/patient.png" alt="">
                                </div>
                            </div>
                            <div class="box-gray">
                                <div>
                                    <p id="totalAppointments">83</p>
                                    <p>Total Appointments</p>
                                </div>
                                <div>
                                    <img src="src/img/appointment-icon.png" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="box-wrapper">
                            <div class="box-gray">
                                <div>
                                    <p id="totalR">8,340.23</p>
                                    <p>Total Revenue</p>
                                </div>
                                <div>
                                    <img src="src/img/finance.png" alt="">
                                </div>
                            </div>
                            <div class="box-gray">
                                <div>
                                    <p id="totalE">2,345.04</p>
                                    <p>Total Expenses</p>
                                </div>
                                <div>
                                    <img src="src/img/prescription.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="dashboard-row">
                        <div class="dashboard-item">
                            <div class="css_graph_1" style="margin-top: 20px;">
                                <p>Total Pateints</p>
                                <div style="display: flex;">
                                    <div id="y-axis">

                                    </div>
                                    <div id="graph-1">

                                    </div>
                                </div>
                            </div>
                            <div style="margin-left: auto;" id="g1_label">
                                Days
                            </div>
                            <p style="font-size: 18px;margin-top: 0;margin-bottom: 5px;margin-top:-11px">Patients</p>
                        </div>
                        <div class="dashboard-item">
                            <div>
                                <div style="position: relative;min-width: 160px;">
                                    <div class="piesite circle-purple" id="pie_0" data-pie="80">
                                    </div>
                                    <span class="label-circle">RM <span id="dm_c">5,350.00</span></span>
                                    <p><i style="background-color: #a635ce;"></i> Drugs & Medications</p>
                                </div>
                                <div style="position: relative;min-width: 160px;">
                                    <div class="piesite circle-pink" id="pie_2" data-pie="75">
                                    </div>
                                    <span class="label-circle">RM<span id="mt_c">5,350.00</span></span>
                                    <p><i style="background-color: #f88e6f;"></i> Medical Tools</p>
                                </div>
                                <div style="position: relative;min-width: 160px;">
                                    <div class="piesite circle-blue" id="pie_1" data-pie="50">
                                    </div>
                                    <span class="label-circle">RM <span id="sw_c">2,350.00</span></span>
                                    <p><i style="background-color: #58769c;"></i> Salaries & Wages</p>
                                </div>
                            </div>
                            <p style="font-size: 18px; margin:0px;" id="expense-graph-div-p">Expenses</p>
                        </div>
                    </div>

                    <div class="dashboard-row">
                        <div class="dashboard-item">
                            <div class="stock-count">
                                <div>
                                    <p>Total</p>
                                    <div class="rectangle">
                                        <div class="rectangle-fill h100"></div>
                                    </div>
                                    <div class="triangle-down triangle-down-fill" id="sc_t_d"></div>
                                    <p id="sc_t_p">100%</p>
                                </div>
                                <div>
                                    <p>Expiring</p>
                                    <div class="rectangle">
                                        <div class="rectangle-fill h15" id="sc_e_d"></div>
                                    </div>
                                    <div class="triangle-down "></div>
                                    <p id="sc_e_p">15%</p>
                                </div>
                                <div>
                                    <p>Remaining</p>
                                    <div class="rectangle">
                                        <div class="rectangle-fill h75" id="sc_r_d"></div>
                                    </div>
                                    <div class="triangle-down"></div>
                                    <p id="sc_r_p">75%</p>
                                </div>
                            </div>
                            <p style="font-size: 18px; margin:0px">Stock Count</p>

                        </div>

                        <div class="dashboard-item">
                            <div class="css_graph_2" style="margin-top: 20px;">
                                <p>Total Sales (MYR)</p>
                                <div style="display: flex;">
                                    <div id="y-axis2">

                                    </div>
                                    <div id="graph-2">

                                    </div>
                                </div>
                            </div>
                            <div style="margin-left: auto;" id="label-g2">
                                Days
                            </div>
                            <p style="font-size: 18px; margin:0px;margin-top:-10px">Sales</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Backend Integration -->
    <!-- Mohammad Yeasin Al Fahad -->
    <!-- 24/09/2020 -->
    <script>
        $(document).ready(function() {

            // retriving normal information
            // $('#totalAppointments').html('ssa');
            // change the data on status change 
            $('#timeStatus').change(function() {
                let value = $(this).val();
                console.log(value);
            });
        });
    </script>
    <script src="src/js/dashboard.js"></script>
    <script src="src/js/dashboard-page.js"></script>
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
        }
    </script>



<!-- By Yash -->
    <script>
        populate(); //calling first time
        function topbar(a, b, c, d) {
            var A =document.getElementById("newP");
            var B=document.getElementById("totalAppointments");
            var C= document.getElementById("totalR");
            var D= document.getElementById("totalE");
            A.innerHTML=0;
            B.innerHTML=0;
            C.innerHTML=0;
            D.innerHTML=0;
            if (a.total) {
                A.innerHTML = Math.round(a["total"]);
            }
            if (b.total) {
                B.innerHTML = Math.round(b["total"]);
            }
            if (c.total) {
                C.innerHTML = Math.round(c["total"]);
            }
            if (d.total) {
                D.innerHTML = Math.round(d["total"]);
            }
        }
        function barGraph(totalCount,values,gtype,state){
            var data = [];
            var i = 1;
            if(state=="week"){
                i=parseInt(<?php strval(date('d', strtotime("this week")));  ?>);
            }
            if (values[0].count) {
                values.forEach((e) => {
                        var diff = e.temp - i;
                        var flag=0;
                        while (diff-- > 0) {
                            flag=1;
                            data.push(0);
                            i++;
                        }
                        if(flag==0){i++;}
                        data.push(e.count);     
                });
                //now populating remaining vaues if any
                if(data.length<totalCount){
                    var diff= totalCount-data.length;
                    while(diff-->0){
                        data.push(0)
                    }
                }
            }
            console.log("->"+data.length)
            if(gtype=="graph1"){
                plot_graph1(data,totalCount);
            }else{
                plot_graph2(data,totalCount);
            }
        }
        function stocksGraph(total,expired){
            //for the graph 2 and 3
            var pe = document.getElementById("sc_e_p");
            var pr = document.getElementById("sc_r_p");
            var de = document.getElementById("sc_e_d");
            var dr = document.getElementById("sc_r_d");
           
            if (total[0].count) {
                if(expired[0].count){
                    var remain = total[0].count-expired[0].count;
                    var rPercent = Math.round((parseInt(remain)/parseInt(total[0].count))*100);
                    var ePercent = Math.round((parseInt(expired[0].count)/parseInt(total[0].count))*100);
                    pe.innerHTML=ePercent+" %";
                    pr.innerHTML=rPercent+" %";
                    de.style.height=ePercent.toString()+"%";
                    de.style.height=ePercent.toString()+"%";
                }else{
                    //nothing is expired (expired = 0)
                    var remain = total[0].count;
                    pe.innerHTML="0 %";
                    pr.innerHTML="100 %";
                    de.style.height="0%";
                    de.style.height="100%";
                }
            }

        }

        function populate() {
            var ele = document.getElementById("timeStatus").value;
            if (ele == "week") {
                //this part is for the top information on Dashboard
                var totalP = <?php $staff->getAllPatientNumberCurrentWeek() ?>; ;
                var totalA = <?php $staff->getAllAppointmentNumberCurrentWeek(); ?>;
                var totalR = <?php $staff->getAllSalesCurrentWeek(); ?>;
                var totalE = <?php $staff->getAllExpensesCurrentWeek() ;?>;
                topbar(totalP,totalA,totalR,totalE);
                
                //this is for 1st and 4th graph   
                document.getElementById("g1_label").innerHTML="Days";
                document.getElementById("label-g2").innerHTML="Days";

                var values = <?php $staff->getDataforPateintCurrentWeek(); ?>;
                var valuesG2 = <?php $staff->getDataforSalesCurrentWeek(); ?>;
                barGraph(7,values,"graph1","week");
                barGraph(7,valuesG2,"graph2","week");

                //this is for 3rd graph
                var totalS = <?php $staff->gettotalStock() ?>; ;
                var expiredS = <?php $staff->getexpiredStockCurrentweek() ?>; ;
                stocksGraph(totalS,expiredS);

            } else if (ele == "month") {
                //this part is for the top information on Dashboard
                var totalP = <?php $staff->getAllPatientNumberCurrentMonth() ?>;
                var totalA = <?php $staff->getAllAppointmentNumberCurrentMonth() ?>;
                var totalR = <?php $staff->getAllSalesCurrentMonth() ?>;
                var totalE = <?php $staff->getAllExpensesCurrentMonth() ?>;
                topbar(totalP,totalA,totalR,totalE);

                 //this is for 1st and 4th graph   
                document.getElementById("g1_label").innerHTML="Days";
                document.getElementById("label-g2").innerHTML="Days";

                var values = <?php $staff->getDataforPateintCurrentMonth(); ?>;
                var valuesG2 = <?php $staff->getDataforSalesCurrentMonth(); ?>;
                barGraph(30,values,"graph1","month");
                barGraph(30,valuesG2,"graph2","month");

                //this is for 3rd graph
                var totalS = <?php $staff->gettotalStock() ?>; ;
                var expiredS = <?php $staff->getexpiredStockCurrentMonth() ?>; ;
                stocksGraph(totalS,expiredS);

            } else {
                //this part is for the top information on Dashboard
                var totalP = <?php $staff->getAllPatientNumberCurrentYear() ?>;
                var totalA = <?php $staff->getAllAppointmentNumberCurrentYear() ?>;
                var totalR = <?php $staff->getAllSalesCurrentYear() ?>;
                var totalE = <?php $staff->getAllExpensesCurrentYear() ?>;
                topbar(totalP,totalA,totalR,totalE);
                
                //this is for 1st and 4th graph   
                document.getElementById("g1_label").innerHTML="Month";
                document.getElementById("label-g2").innerHTML="Month";

                var values = <?php $staff->getDataforPateintCurrentYear(); ?>;
                var valuesG2 = <?php $staff->getDataforSalesCurrentYear(); ?>;
                barGraph(12,values,"graph1","year");
                barGraph(12,valuesG2,"graph2","year");

                //this is for 3rd graph
                var totalS = <?php $staff->gettotalStock() ?>; ;
                var expiredS = <?php $staff->getexpiredStockCurrentYear() ?>; ;
                stocksGraph(totalS,expiredS);
            }
        }
        
        
    </script>
</body>

</html>