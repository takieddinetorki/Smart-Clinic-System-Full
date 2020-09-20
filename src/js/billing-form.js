var num_array = [0, 0, 0, 0]

function addArray(n) {
    var result = parseFloat(n[0]) + parseFloat(n[1]) + parseFloat(n[2]) + parseFloat(n[3]);
    return result.toFixed(2);
}

function changedinput1() {
    var t = document.getElementById("blank1");
    var t2 = document.getElementById("blank5");
    if (isNaN(t.value)) {
        alert("Type Number Only");
        t.value = "";
        num_array[0] = t.value;
    } else {
        //var value = "RM            " + parseFloat(t.value).toFixed(2);
        //t.value = value;
        var value =  parseFloat(t.value).toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
        num_array[0] = t.value;
        t.value = value;
        t2.value = addArray(num_array);
    }
}

function changedinput2() {
    var t = document.getElementById("blank2");
    var t2 = document.getElementById("blank5");
    if (isNaN(t.value)) {
        alert("Type Number Only");
        t.value = "";
    } else {
        var value =  parseFloat(t.value).toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
        num_array[1] = t.value;
        t.value = value;
        t2.value = addArray(num_array);
    }
}

function changedinput3() {
    var t = document.getElementById("blank3");
    var t2 = document.getElementById("blank5");
    if (isNaN(t.value)) {
        alert("Type Number Only");
        t.value = "";
    } else {
        var value =  parseFloat(t.value).toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
        num_array[2] = t.value;
        t.value = value;
        t2.value = addArray(num_array);
    }
}

function changedinput4() {
    var t = document.getElementById("blank4");
    var t2 = document.getElementById("blank5");
    if (isNaN(t.value)) {
        alert("Type Number Only");
        t.value = "";
    } else {
        var value =  parseFloat(t.value).toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
        num_array[3] = t.value;
        t.value = value;
        t2.value = addArray(num_array);
    }
}