<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Clinic Name</title>
  <link rel="stylesheet" href="styles/layout.css" />
  <link rel="stylesheet" href="styles/modals.css">
  <link rel="stylesheet" href="styles/financial-report.css">
  <script src="https://secure.exportkit.com/cdn/js/ek_googlefonts.js"></script>

</head>

<body onload="sidebarActivelink('financial-report(PAGE)')">
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

    <?php include 'sidebar.php';?>
    <div class="main">
      <div class="head-div">
        <h1>Financial Reports</h1>
      </div>
      <div class="main-body">
        <div>
          <button class="div-btn" id="sales" onclick="openModal('sales','modal14')">Sales</button>
          <button class="div-btn" id="expense" onclick="openModal('expense','modal16')">Expenses</button>
        </div>
        <div id="div2">
          <button class="div-btn" id="inventory" onclick="openModal('inventory','modal18')">Inventory</button>
          <button class="div-btn" id="pandl" onclick="openModal('pandl','modal20')">Profit and Loss</button>
        </div>
      </div>


      <div style="margin-bottom: 20px;">
        <!-- ___________________________________________________________________________________________________-->
        <!-- finance modal 1 here  0/1 -->
        <div id="modal14" class="modal">
          <div class="modalContent14">
            <form style="margin-top: 15px;">
              <div class="form-div-modal14 category_1">
                <label for="from" class="label-modal14">Month</label>
                <select name="eid" id="eid" class="inp-modal14">
                  <option value="">January</option>
                  <option value="">February</option>
                  <option value="">March</option>
                  <option value="">April</option>
                  <option value="">May</option>
                  <option value="">June</option>
                  <option value="">July</option>
                  <option value="">August</option>
                  <option value="">September</option>
                  <option value="">October</option>
                  <option value="">November</option>
                  <option value="">December</option>
                </select>
              </div>
              <div class="form-div-modal14 category_2">
                <label for="from" class="label-modal14">Quater</label>
                <select name="eid" id="eid" class="inp-modal14">
                  <option value="">First</option>
                </select>
              </div>
              <div class="form-div-modal14">
                <label for="to" class="label-modal14">Year</label>
                <select name="eid" id="eid" class="inp-modal14">
                  <option value="">2020</option>
                </select>
              </div>
              <div class="form-div-modal14" style="margin-left: -26px;">
                <div class="form-div-div-modal14" style="justify-content: flex-end;margin-right: 10px;">
                  <input type="radio" name="date" id="date" class="inp-radio14"
                    oninput="toggleDivfr('category_1','category_2')">
                  <label for="date">Monthly</label>
                </div>
                <div class="form-div-div-modal14">
                  <input type="radio" name="date" id="date" class="inp-radio14"
                    oninput="toggleDivfr('category_2','category_1')">
                  <label for="date">Quaterly</label>
                </div>
              </div>
            </form>
            <div class="text-center">
              <button class="modalBtn14" type="submit">PRINT</button>
            </div>
          </div>
        </div>
        <!-- finance modal 1 till here 1/1 -->
        <!-- ___________________________________________________________________________________________________-->

        <!-- finance modal 3 here  0/1 -->
        <div id="modal16" class="modal">
          <div class="modalContent16">
            <form style="margin-top: 7px;">
              <div class="form-div-modal16">
                <label for="sid" class="label-modal16">Starting Account</label>
                <select name="sid" id="sid" class="inp-modal16">
                  <option value="">JA000906000</option>
                </select>
              </div>
              <div class="form-div-modal16">
                <label for="eid" class="label-modal16">Ending Account</label>
                <select name="eid" id="eid" class="inp-modal16">
                  <option value="">JA000906000</option>
                </select>
              </div>
              <div class="form-div-modal16 category_1">
                <label for="from" class="label-modal16">Month</label>
                <select name="sid" id="sid" class="inp-modal16">
                  <option value="">January</option>
                  <option value="">February</option>
                  <option value="">March</option>
                  <option value="">April</option>
                  <option value="">May</option>
                  <option value="">June</option>
                  <option value="">July</option>
                  <option value="">August</option>
                  <option value="">September</option>
                  <option value="">October</option>
                  <option value="">November</option>
                  <option value="">December</option>
                </select>
              </div>
              <div class="form-div-modal16 category_2">
                <label for="from" class="label-modal16">Quater</label>
                <select name="eid" id="eid" class="inp-modal16">
                  <option value="">First</option>
                </select>
              </div>
              <div class="form-div-modal16">
                <label for="to" class="label-modal16">Year</label>
                <select name="sid" id="sid" class="inp-modal16">
                  <option value="">2020</option>
                </select>
              </div>
              <div class="form-div-modal16" style="margin-left: -26px;">
                <div class="form-div-div-modal16" style="justify-content: flex-end;margin-right: 10px;">
                  <input type="radio" name="date" id="date" class="inp-radio16"
                    oninput="toggleDivfr('category_1','category_2')">
                  <label for="date">Monthly</label>
                </div>
                <div class="form-div-div-modal16">
                  <input type="radio" name="date" id="date" class="inp-radio16"
                    oninput="toggleDivfr('category_2','category_1')">
                  <label for="date">Quaterly</label>
                </div>
              </div>
            </form>
            <div class="text-center">
              <button class="modalBtn16" type="submit">PRINT</button>
            </div>
          </div>
        </div>
        <!-- finance modal 3 till here 1/1 -->
        <!-- ______________________________________________________________________________________________________________________ -->

        <!-- finance modal 5 here  0/1 -->
        <div id="modal18" class="modal">
          <div class="modalContent18">
            <form style="margin-top: 7px;">
              <div class="form-div-modal18">
                <label for="sid" class="label-modal18">Starting Item</label>
                <select name="sid" id="sid" class="inp-modal18">
                  <option value="">JA000906000</option>
                </select>
              </div>
              <div class="form-div-modal18">
                <label for="eid" class="label-modal18">Ending Item</label>
                <select name="eid" id="eid" class="inp-modal18">
                  <option value="">JA000906000</option>
                </select>
              </div>
              <div class="form-div-modal18 category_1">
                <label for="from" class="label-modal18">Month</label>
                <select name="sid" id="sid" class="inp-modal18">
                  <option value="">January</option>
                  <option value="">February</option>
                  <option value="">March</option>
                  <option value="">April</option>
                  <option value="">May</option>
                  <option value="">June</option>
                  <option value="">July</option>
                  <option value="">August</option>
                  <option value="">September</option>
                  <option value="">October</option>
                  <option value="">November</option>
                  <option value="">December</option>
                </select>
              </div>
              <div class="form-div-modal18 category_2">
                <label for="from" class="label-modal18">Quater</label>
                <select name="sid" id="sid" class="inp-modal18">
                  <option value="">First</option>
                </select>
              </div>
              <div class="form-div-modal18">
                <label for="to" class="label-modal18">Year</label>
                <select name="sid" id="sid" class="inp-modal18">
                  <option value="">2020</option>
                </select>
              </div>
              <div class="form-div-modal18" style="margin-left: -26px;">
                <div class="form-div-div-modal18" style="justify-content: flex-end;margin-right: 10px;">
                  <input type="radio" name="date" id="date" class="inp-radio18"
                    oninput="toggleDivfr('category_1','category_2')">
                  <label for="date">Monthly</label>
                </div>
                <div class="form-div-div-modal18">
                  <input type="radio" name="date" id="date" class="inp-radio18"
                    oninput="toggleDivfr('category_2','category_1')">
                  <label for="date">Quaterly</label>
                </div>
              </div>
            </form>
            <div class="text-center">
              <button class="modalBtn18" type="submit">PRINT</button>
            </div>
          </div>
        </div>
        <!-- finance modal 5 till here 1/1 -->
        <!-- ______________________________________________________________________________________________________________________ -->
        <!-- finance modal 7 here  0/1 -->
        <div id="modal20" class="modal">
          <div class="modalContent20">
            <form style="margin-top: 15px;">
              <div class="form-div-modal20 category_1">
                <label for="from" class="label-modal20">Month</label>
                <select name="eid" id="eid" class="inp-modal20">
                  <option value="">January</option>
                  <option value="">February</option>
                  <option value="">March</option>
                  <option value="">April</option>
                  <option value="">May</option>
                  <option value="">June</option>
                  <option value="">July</option>
                  <option value="">August</option>
                  <option value="">September</option>
                  <option value="">October</option>
                  <option value="">November</option>
                  <option value="">December</option>
                </select>
              </div>
              <div class="form-div-modal20 category_2">
                <label for="from" class="label-modal20">Quater</label>
                <select name="eid" id="eid" class="inp-modal20">
                  <option value="">First</option>
                </select>
              </div>
              <div class="form-div-modal20 category_3">
                <label for="to" class="label-modal20">Year</label>
                <select name="eid" id="eid" class="inp-modal20">
                  <option value="">2020</option>
                </select>
              </div>
              <div class="form-div-modal20">
                <div class="form-div-div-modal20" style="justify-content: flex-end;">
                  <input type="radio" name="date" id="date" class="inp-radio20"
                    oninput="toggleDivfr('category_1','category_2')">
                  <label for="date">Monthly</label>
                </div>
                <div class="form-div-div-modal20">
                  <input type="radio" name="date" id="date" class="inp-radio20"
                    oninput="toggleDivfr('category_2','category_1')">
                  <label for="date">Quaterly</label>
                </div>
                <div class="form-div-div-modal20">
                  <input type="radio" name="date" id="date" class="inp-radio20"
                    oninput="toggleDivfr('category_1','category_2','category_3')">
                  <label for="date">Yearly</label>
                </div>
              </div>
            </form>
            <div style="text-align: center;">
              <button class="modalBtn20" type="submit">PRINT</button>
            </div>
          </div>
        </div>
        <!-- finance modal 7 till here 1/1 -->
        <!-- ______________________________________________________________________________________________________________________ -->

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
      var hiddiv=document.getElementsByClassName("small_sidebar");
      for(var i=0;i<hiddiv.length;i++){
        hiddiv[i].classList.toggle("hidden_sidebar");
      }
    }
    function openModal(id, mid) {
      var ids = ['sales', 'expense', 'inventory', 'pandl']
      document.getElementById(id).classList.toggle("btnactive");
      for (var i = 0; i < ids.length; i++) {
        if (ids[i] != id) {
          document.getElementById(ids[i]).classList.remove("btnactive");
        }
      }
      show(mid);
    }
    function toggleDivfr(x, y, z = "") {
      if (z != "") {
        var ele = document.getElementsByClassName(x);
        for (i = 0; i < ele.length; i++) {
          ele[i].style.display = "none";
        }
        var ele2 = document.getElementsByClassName(y);
        for (i = 0; i < ele2.length; i++) {
          ele2[i].style.display = "none";
        }
        var ele3 = document.getElementsByClassName(z);
        for (i = 0; i < ele3.length; i++) {
          ele3[i].style.display = "flex";
        }
      }
      else {
        var ele = document.getElementsByClassName(x);
        for (i = 0; i < ele.length; i++) {
          ele[i].style.display = "flex";
        }
        var ele2 = document.getElementsByClassName(y);
        for (i = 0; i < ele2.length; i++) {
          ele2[i].style.display = "none";
        }
      }

    }
  </script>
  <script>
    function show(x) {
      var ele = document.getElementsByClassName("modal");
      for (var i = 0; i < ele.length; i++) {
        ele[i].style.display = "none";
      }
      document.getElementById(x).style.display = "flex";
    }
  </script>
</body>

</html>