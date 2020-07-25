const link = document.getElementById("forgotPassword");
const login = document.querySelector(".login");
const forgotPassForm = document.querySelector(".fpcontainer");
const close = document.querySelector(".cancel");
const heading = document.querySelector(".heading");
const link2 = document.getElementById("register");
const rgform = document.querySelector(".grid-container");
var LogoClickcounter=0;

link.addEventListener("click", e => {
  e.preventDefault();
  login.className = "login hide";
  forgotPassForm.className = "fpcontainer show";
});

close.addEventListener("click", e => {
  e.preventDefault();
  login.className = "login show";
  forgotPassForm.className = "fpcontainer hide";
});
heading.addEventListener("click", e => {
  e.preventDefault();
  heading.className = "header header-animate";
  login.className = "login show";
  LogoClickcounter=LogoClickcounter+1;
  if(LogoClickcounter>1){
    rgform.className="grid-container hide";
  }  
});
link2.addEventListener("click", e => {

  e.preventDefault();



  heading.classList.remove("header-animate");
  heading.classList.add("header-register-animate");

  login.className = "login hide";
  rgform.className = "grid-container show";

  heading.removeEventListener();
});