function hideNotifIcon(){
    document.getElementById("notif").style.display="none";
}
function changedinput() {
    var t = document.getElementById("mobile-number");
    if (isNaN(t.value)) {
        alert("Type Number Only");
        t.value = "";
    } else {
        if ((t.value - Math.floor(t.value)) !== 0) {
            alert("No Digital Numbers");
            t.value = "";
        } else if ((t.value - Math.floor(t.value)) == 0) {
            t.value = "+60" + parseInt(t.value)
        }

    }
}

function checkletter1() {
    var s = document.getElementById("first-name");
    var letters = /^[A-Za-z]+$/;

    if (s.value.match(letters)) {
        s.value = s.value;
    } else {
        alert("Type Letters Only");
        s.value = "";
    }
}

function checkletter2() {
    var s = document.getElementById("last-name");
    var letters = /^[A-Za-z]+$/;

    if (s.value.match(letters)) {
        s.value = s.value;
    } else {
        alert("Type Letters Only");
        s.value = "";
    }
}

function checkemail() {
    var e = document.getElementById("email");
    var email_format = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;


    if (e.value.match(email_format)) {
        e.value = e.value;
    } else {
        alert("Invalid E-mail Format");
        e.value = "";
    }
}