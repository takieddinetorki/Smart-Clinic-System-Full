<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Clinic Name</title>
  <link rel="stylesheet" href="styles/layout.css" />
  <link rel="stylesheet" href="styles/modals.css">
  <link rel="stylesheet" href="styles/backup-table.css">
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
          <a href="#" class="searching-button"><img class="nav-icon" src="src/img/magnify-glass.svg" alt="" /></a>

          <div class="searchbar-dropdown">
            <input type="radio" id="search-by-id" name="src" />
            <label for="search-by-id">Search by ID</label>
            <br />
            <input type="radio" id="search-by-name" name="src" />
            <label for="search-by-name">Search by Name</label>
            <br />
            <input type="radio" id="search-by-name" name="src" />
            <label for="search-by-name">Search by NRIC/Passport</label>
          </div>
        </div>
      </div>

      <div class="nav-images">
        <div class="dropdown-user1">
            <a href="#" class="nav-logos"><img src="src/img/settings.png" alt="" /></a>
            <div class="dropdown-content3">
                <a href="settings(PAGE).html">Settings</a>
                <a href="report_bug.html">Report Bug</a>
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
                <a href="my-profile(PAGE).html">My Profile</a>
                <a href="#">Logout</a>
            </div>
        </div>
    </div>
    </div>

    <div class="sidebar" id="sidebar">
      <div class="toggle-btn" id="toggler" onclick="toggleSidebar()">
          <a href="" onclick=" return false">
              <img src="src/img/resize.svg" alt="">
          </a>
      </div>
      <a href="dashboard(PAGE).html"><img src="src/img/home.png" />
          <div class="small_sidebar">Dashboard</div>
      </a>
      <a href="patients(PAGE).html"><img src="src/img/patient.svg" />
          <div class="small_sidebar">Patients</div>
      </a>
      <a href="appointment.html"><img src="src/img/appointment-icon.svg" alt="" />
          <div class="small_sidebar">Appointments</div>
      </a>
      <a href="diagnostic(PAGE).html"><img src="src/img/diagnostic.svg" alt="" />
          <div class="small_sidebar"> Diagnostic Report</div>
      </a>
      <a href="billing(PAGE).html"><img src="src/img/finance.svg" alt="" />
          <div class="small_sidebar">Billing</div>
      </a>
      <a href="expenses(PAGE).html"><img src="src/img/prescription.svg" alt="" />
          <div class="small_sidebar">Expenses</div>
      </a>
      <a href="inventory (PAGE).html"><img src="src/img/inventory.svg" alt="" />
          <div class="small_sidebar">Inventory</div>
      </a>
      <a href="medical-cert(PAGE).html"><img src="src/img/mc.svg" alt="" />
          <div class="small_sidebar">Medical Certificate</div>
      </a>
      <a href="financial-report(PAGE).html" ><img src="src/img/cash.svg" alt="" />
          <div class="small_sidebar">Finance Reports</div>
      </a>
      <a href="backup.html" class="nav-active"><img src="src/img/settings-tools.svg" alt="" />
          <div class="small_sidebar">Backup & Table Setup</div>
      </a>
  </div>

    <div class="main">
      <div class="head-div">
        <h1>Backup Table</h1>
      </div>
      <div class="main-body">
        <div>
          <button class="div-btn" id="backup" onclick="openModal('backup','modalBT1')">Backup</button>
          <button class="div-btn" id="doctors" onclick="openModal('doctors')">Doctors</button>
          <button class="div-btn" id="diag-report" onclick="openModal('diag-report')">Diagnostic Report</button>
        </div>
        <div id="div2">
          <button class="div-btn" id="expense" onclick="openModal('expense')">Expenses</button>
          <button class="div-btn" id="inventory" onclick="openModal('inventory')">Inventory</button>
          
        </div>
      </div>


      <div style="margin-bottom: 20px;">

        <!-- backup- Data recovery modal here 1/5 -->
        <div id="modalBT1" class="modal">
            <div class="modalContentBT">
                <div class="text-center">
                    <p class="modalContentHeadBT">Data Recovery</p>
                    <i class="fa fa-exclamation-triangle" style="font-size: 44px;color: red;" aria-hidden="true"></i>
                    <p style="margin-top: 5px;">Please backup before you continue</p>
                </div>
              <form style="margin-top: 7px;">
                <div class="form-div-modalBT">
                  <label for="sid" class="label-modalBT">Backup Data</label>
                  <input name="sid" type="checkbox" id="sid" class="inp-modalBT">
                </div>
              </form>
              <div class="text-center">
                <button class="modalBtnBT" type="submit">SUBMIT</button>
              </div>
            </div>
          </div>
           <!-- backup- Data recovery modal here 1/5 -->
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
    
  </script>
  <script>
    function show(x) {
      var ele = document.getElementsByClassName("modal");
      for (var i = 0; i < ele.length; i++) {
        ele[i].style.display = "none";
      }
      document.getElementById(x).style.display = "flex";
    }
    function openModal(id,mid) {
      var ids = ['backup', 'expense', 'inventory', 'doctors','diag-report']
      document.getElementById(id).classList.toggle("btnactive");
      for (var i = 0; i < ids.length; i++) {
        if (ids[i] != id) {
          document.getElementById(ids[i]).classList.remove("btnactive");
        }
      }
      show(mid)
    }
  </script>
</body>

</html>