<?php
require_once 'byCMkGnmDa3mXlyfgPh/core/init.php';
$staff = new Staff;
$user = new User;
$clinic = new ClinicDB;
$doc = new Doctor;
$id = new ID;
if (!$user->loggedIn()) {
  Redirect::to('index.php');
}
?><html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Smart Clinic <?php if ($user->loggedIn()) echo deescape($clinic->getClinicInfo('clinicName', 'clinicID', $user->data()->clinicID));
                      else echo " Log in to show clinic" ?></title>
  <link rel="stylesheet" href="styles/layout.css" />
  <link rel="stylesheet" href="styles/diagonistic-template.css">
  <link rel="stylesheet" href="styles/footer.css">
  <link rel="stylesheet" href="styles/modals.css">
  <link rel="stylesheet" href="styles/diagonstic-report.css">
  <link rel="stylesheet" href="styles/diagonstic-form.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <!-- for fonts -->
  <script src="https://secure.exportkit.com/cdn/js/ek_googlefonts.js"></script>
  <script src="https://kit.fontawesome.com/d814c57d3c.js" crossorigin="anonymous"></script>

</head>

<body onresize="resizeDiv()" onload="resizeDiv()" class="table-wrapper-scroll-y">
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
      <div class="head">
        <h1>DIAGNOSTIC REPORT</h1>
      </div>

      <div class="main-body" id="ad-width">
        <div id="code">
          R004
        </div>
        <div class="cl-btn" onclick="show('modal3')">
          <i class="fas fa-times-circle"></i>
        </div>
        <div id="sliderdiv" class="table-wrapper-scroll-y">
          <div style="display: flex;min-width: 1035px;max-width: 1035px;">
            <div class="inDiv">
              <div>
                <div class="flex">
                  <label for="patients" class="label_col" style="min-width: 66px;">Patient ID</label>
                  <select name="patients" class="input_diag">
                    <option value="1">J100090060</option>
                  </select>
                  <p class="p_col">Jane</p>
                  <i class="fas fa-eye eyeclass"></i>
                </div>
                <div class="flex">
                  <label for="docId" class="label_col">Doctor ID</label>
                  <input type="text" name="docId" class="input_diag" style="margin-left: 23px;">
                  <p class="p_col">Dr. Jane Doe</p>
                </div>
              </div>
              <div class="box pageTwo" style="height: 396px;padding:2px 10px 5px 10px">
                <div class="box-title">
                  Prescription
                </div>
                <div class="box-content">
                  <div class="box-div" style="height: 325px;">
                    <div id="drg" class="box-div-head">
                      Drugs
                    </div>
                    <div>
                      <div style="margin-top: 8px;">
                        <div>
                          <select style="width: 310px;" class="diag-form-inp" type="text" name="drugs" id="drugs">
                            <option hidden>Select Drugs</option>
                            <!-- <option value="-">-</option> -->
                            <?php $doc->getAllMedicines() ?>
                          </select>
                        </div>
                        <div id="drugList" style="height: 40px;margin-top: 5px;overflow-y: auto;">
                        </div>
                      </div>
                      <div style="max-height: 240px;margin-left: 10px; margin-right: 55px;">
                        <div class="drug-div">
                          <div class="drug-label">
                            Dosage
                          </div>
                          <div>
                            <input id="dosage" type="text" placeholder="250" class="input_diag" style="width: 70px;">
                            <span style="margin-left: 10px;">mg</span>
                          </div>
                        </div>
                        <div class="drug-div">
                          <div class="drug-label">
                            Frequency
                          </div>
                          <div>
                            <select name="frequency" id="frequency" type="text" class="input_diag" style="width: 170px;">
                              <option value="-">-</option>
                              <option value="1 times a day">1 times a day</option>
                              <option value="2 times a day">2 times a day</option>
                              <option value="3 times a day">3 times a day</option>
                              <option value="4 times a day">4 times a day</option>
                              <option value="5 times a day">5 times a day</option>
                            </select>
                          </div>
                        </div>
                        <div class="drug-div">
                          <div class="drug-label">
                            No of days
                          </div>
                          <div>
                            <input id="days" type="text" class="input_diag" placeholder="3" style="width: 70px;">
                            <span style="margin-left: 10px;">days</span>
                          </div>
                        </div>
                        <div class="drug-div">
                          <div class="drug-label">
                            Instruction
                          </div>
                          <div>
                            <select name="instructions" id="instructions" type="text" class="input_diag" style="width: 170px;">
                              <option value="-">-</option>
                              <option value="Before Meal">Before Meal</option>
                              <option value="After Meal">After Meal</option>
                              <option value="When Necessary">When Necessary</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div style="margin-top: 15px;">
                      <div id="addMedi" class="plus-icon">
                        <i class="fas fa-plus"></i>
                      </div>
                    </div>
                  </div>
                </div>

              </div>

            </div>

            <div class="box inDiv pageTwo">
              <div class="box-title sdsfsdfs">
                Listing
              </div>
              <div id="mediListing" class="box-content table-wrapper-scroll-y" style="overflow-y: scroll;max-height: 430px;">
              </div>
            </div>



            <div class="box inDiv pageTwo">
              <div class="box-title">
                Attachments
              </div>
              <div class="box-content">
                <div class="box-div" style="height: 411px;">
                  <div class="box-div-head">
                    Images/Documents
                  </div>
                  <div>
                    <div class="table-wrapper-scroll-y" style="height: 320px;padding-top: 16px; padding-bottom: 6px;overflow-y: auto;">
                      <span class="inp-select">
                        xxxxxxxxxxxxxxxxxxxxxxx<i class="far fa-times-circle"></i>
                      </span>
                    </div>
                  </div>
                  <div>
                    <div class="plus-icon">
                      <i class="fas fa-plus"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <script>
              $(document).ready(function() {

                $('#dosage').change(function() {
                  if (isNaN($(this).val())) {
                    alert('Dosage Must be a Number');
                    $(this).val("");
                  }
                });
                $('#days').change(function() {
                  if (isNaN($(this).val())) {
                    alert('Days Must be a Number');
                    $(this).val("");
                  }
                });

                //medicines collection 
                let medicines = [];
                let notMedicines = [];
                let finalMedi = [];
                let checkDoubleValue = [];
                let completeMedicineList = [];
                let rawMedicineList = [];
                let mediListCancelled = [];

                $('#drugs').change(function() {
                  let val = $(this).val();
                  if (!checkDoubleValue.includes(val)) {
                    medicines.push(val);
                    checkDoubleValue.push(val);
                    $('#drugList').append(
                      `
                                <span class="inp-select">${val}<i class="far fa-times-circle closeSymptoms"></i></span>
                                `
                    );
                    // closing the medicines
                    var closebtns = document.getElementsByClassName("closeSymptoms");
                    for (var i = 0; i < closebtns.length; i++) {
                      closebtns[i].addEventListener("click", function() {
                        let vv = $(this).parent().text();
                        notMedicines.push(vv);
                        this.parentElement.style.display = 'none';
                      });
                    }
                  }
                });


                // adding medicines 
                $('#addMedi').click(function() {
                  finalMedi = medicines.filter(n => !notMedicines.includes(n));
                  if (finalMedi.length > 0) {
                    let html = ``;
                    finalMedi.forEach((e) => {
                      html += `<div class="box-div list-box">
                                <i class="far fa-times-circle closeDrugs"></i>
                                <div> ${e}</div>
                                <div> ${$('#dosage').val()} mg</div>
                                <div> ${$('#frequency').val()}</div>
                                <div> continue till ${$('#days').val()}</div>
                                <div> ${$('#instructions').val()}</div>
                              </div>`;

                      // adding the value into the object to have a complete array of onject consist of all medicines
                      let randomObj = {
                        name: e,
                        dosage: $('#dosage').val(),
                        frequency: $('#frequency').val(),
                        days: $('#days').val(),
                        instuction: $('#instructions').val()
                      };
                      rawMedicineList.push(randomObj);
                    });

                    $('#mediListing').append(html);
                    $('#drugList').empty();
                    $('#dosage').val("");
                    $('#frequency').val("-");
                    $('#days').val("");
                    $('#instructions').val("-");

                    medicines = [];
                    notMedicines = [];

                  } else {
                    console.log(finalMedi.length);
                    alert("Please Add Drugs in the List First");
                  }

                  var closebtns = document.getElementsByClassName("closeDrugs");
                  for (var i = 0; i < closebtns.length; i++) {
                    closebtns[i].addEventListener("click", function() {
                      let vv = $(this).next().text().trim();
                      checkDoubleValue = checkDoubleValue.filter(e => e != vv)
                      console.log('after close');
                      console.log(vv);
                      console.log(checkDoubleValue);
                      mediListCancelled.push(vv);
                      console.log(mediListCancelled);
                      this.parentElement.style.display = 'none';
                    });
                  }
                });
                // now final medical list after cancel button pressed 
                $('.sdsfsdfs').click(function() {
                  rawMedicineList.forEach((e) => {
                    if (!mediListCancelled.includes(e.name)) completeMedicineList.push(e);
                  });
                  console.log('rawMedicineList');
                  console.log(rawMedicineList);
                  console.log('CompleteMedicineList');
                  console.log(completeMedicineList);
                });

              });
            </script>

          </div>
        </div>
        <div class="footer">
          <div class="footer-div">
            <div class="dots-div">
              <a href="diagonsitic_report(PAGE).php"> <span class="dot" style="background-color: black;"></span></a>
              <a href="diagonsitic-form(PAGE).php"> <span class="dot"></span></a>
            </div>
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

  </div>
  <script type="text/javascript">
    function toggleSidebar() {
      document.getElementById("toggler").classList.toggle("toggle-icon-placement");
      document.getElementById("sidebar").classList.toggle("small_width");
      var hiddiv = document.getElementsByClassName("small_sidebar");
      for (var i = 0; i < hiddiv.length; i++) {
        hiddiv[i].classList.toggle("hidden_sidebar");
      }
      document.getElementById("ad-width").classList.toggle("widthAdjust");
      var ele = document.getElementsByClassName('modal');
      for (i = 0; i < ele.length; i++) {
        ele[i].classList.toggle("pdl");
        ele[i].classList.toggle("pdl-hide");
      }
    }
  </script>
  <script>
    function resizeDiv() {
      sidebarActivelink('diagnostic(PAGE)');
      var divtemp = document.getElementById("sliderdiv");
      if (divtemp.offsetWidth < 1035) {
        divtemp.style.overflowX = "scroll";

      } else {
        divtemp.style.overflowX = "hidden";
      }
    }

    function wt_htValidator(id, inp) {
      var input = document.getElementById(id);
      input.value = input.value.split(inp).join('');
      if (isNaN(input.value)) {
        alert("Enter number only, in Weight (unit kg) and height field (unit cm)");
        input.value = "";
      } else {
        if (input.value == "") {
          input.value += "0.0 "
        }
        input.value += inp;
      }
    }
  </script>
  <script>
    // script for modals
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
  <!-- ______________________________________________________________________________________________________________________ -->
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

  <script src="src/js/layout.js"></script>
  <!-- save modal till here -->
</body>

</html>