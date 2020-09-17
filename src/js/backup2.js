var currentDropdown;

function toggle_Colors(element) {
  // changing colors
  tabbuttons = document.getElementsByClassName("tab-button");
  for (i = 0; i < tabbuttons.length; i++) {
    tabbuttons[i].style.backgroundColor = "#b597dc";
  }
  if (element) {
    element.style.backgroundColor = "#BEB9C5";
  }
}
function hideAll() {
  //hiding all tab-contents
  var i, tabcontent;
  tabcontent = document.getElementsByClassName("tab-content");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
}

function showDropdown(element) {
  hideAll();
  var dropdowns = document.getElementsByClassName("dropdown-items");
  for (var i = 0; i < dropdowns.length; i++) {
    dropdowns[i].classList.remove("show");
  }
  if (currentDropdown == element.nextElementSibling) {
    currentDropdown.classList.remove("show");
    currentDropdown = null;
    return;
  }
  currentDropdown = element.nextElementSibling;
  currentDropdown.classList.add("show");
  toggle_Colors(element);
}

function showmodal(x) {
  hideAll();
  var ele = document.getElementsByClassName("modalN");
  for (var i = 0; i < ele.length; i++) {
    ele[i].style.display = "none";
  }
  document.getElementById(x).style.display = "flex";
  if (x == "vendorBT") {
    document.getElementById(x).style.display = "block";
  }
}

function showPage(pageName, element) {
  hideAll();
  toggle_Colors(element);
  document.getElementById(pageName).style.display = "block";
}
function toggleShow(shw, hde) {
  document.getElementById(shw).style.display = "block";
  // if(shw=='vendor-list'){
  //   document.getElementById(shw).style.display = "block";
  // }
  document.getElementById(hde).style.display = "none";
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
  } else {
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

window.addEventListener("click", function (event) {
  if (currentDropdown) {
    if (currentDropdown.previousElementSibling != event.target) {
      var dropdowns = document.getElementsByClassName("dropdown-items");
      for (var i = 0; i < dropdowns.length; i++) {
        dropdowns[i].classList.remove("show");
      }
      currentDropdown = null;
    }
  }

});

/* Toggle page using dot footer in diagnostic page */
function toggleFooterDot(thisElem, shw, hde) {
  showElem = document.getElementById(shw).style.display = "flex";
  showElem = document.getElementById(hde).style.display = "none";
  var dots = document.getElementsByClassName("dot");
  for (var i = 0; i < dots.length; i++) {
    dots[i].style.backgroundColor = "#bbb";
  }

  thisElem.style.backgroundColor = "black";
}
