"use strict";

if (document.readyState == 'loading') {
  // loading yet, wait for the event
  document.getElementById("load").style.display = "block";
} else {
  // DOM is ready!
  document.getElementById("load").style.display = "none";
}