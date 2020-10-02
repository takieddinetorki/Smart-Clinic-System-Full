"use strict";

function hideSingle() {
  var temp1 = document.getElementById("ms_single");
  var hide1 = document.getElementById("spouse-label");
  var hide2 = document.getElementById("spouse-input");

  if (temp1.checked == true) {
    hide1.style.display = "none";
    hide2.style.display = "none";
  } else {
    hide1.style.display = "flex";
    hide2.style.display = "flex";
  }
}

function calcAge(d, a) {
  console.log("In function");
  var temp = document.getElementById(d);
  var dob_entry = temp.value;

  if (dob_entry != "") {
    console.log(dob_entry);
    var split_dob = dob_entry.split("-");
    var day = split_dob[2];
    var month = split_dob[1];
    var year = split_dob[0];
    var ageValue = 0;
    var condition1 = parseInt(month + day);
    var today_date = new Date();
    var today_year = today_date.getFullYear().toString();
    var today_day = today_date.getDate().toString();
    var today_month = (today_date.getMonth() + 1).toString();
    var condition2 = parseInt(today_month + today_day);

    if (condition2 >= condition1) {
      ageValue = parseInt(today_year - parseInt(year));
    } else {
      ageValue = parseInt(today_year - parseInt(year) - 1);
    }

    console.log(ageValue);
    document.getElementById(a).value = ageValue;
  }
}

function changedinput1() {
  var t = document.getElementById("mobile-number");

  if (isNaN(t.value)) {
    alert("Type Number Only");
    t.value = "";
  } else {
    if (t.value - Math.floor(t.value) !== 0) {
      alert("No Digital Numbers");
      t.value = "";
    } else if (t.value - Math.floor(t.value) == 0) {
      t.value = "+60" + parseInt(t.value);
    }
  }
}

function changedinput2() {
  var t = document.getElementById("e-number");

  if (isNaN(t.value)) {
    alert("Type Number Only");
    t.value = "";
  } else {
    if (t.value - Math.floor(t.value) !== 0) {
      alert("No Digital Numbers");
      t.value = "";
    } else if (t.value - Math.floor(t.value) == 0) {
      t.value = "+60" + parseInt(t.value);
    }
  }
}

function nricdiv(x) {
  var p = document.getElementById(x);
  var n = p.value;
  n = n.split('-').join('');
  var finalVal = n.match(/.{1,6}/g).join('-');
  finalVal = finalVal.match(/.{1,11}/g).join('-');

  if (finalVal.length != 14) {
    p.value = "";
    alert("Length of NRIC field should be 12");
  } else {
    p.value = finalVal;
  }
}