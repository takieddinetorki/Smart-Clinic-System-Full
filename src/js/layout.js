var dt = new Date();

const months = [
    "January",
    "February",
    "March",
    "April",
    "May",
    "June",
    "July",
    "August",
    "September",
    "October",
    "November",
    "December"
];
const monthsIndex = dt.getMonth();
var str="";
var str2="";
str=str.concat(String(months[monthsIndex])).concat(" ").concat(String(dt.getDate()));
str=str.concat(", ").concat(String(dt.getFullYear()));

str2=str2.concat('\n').concat(String(dt.getHours())).concat(" : ");
var minutes=(String(dt.getMinutes()))

console.log(minutes.length);
if(minutes.length==1){
    var temp="0";
    console.log(temp);
    temp=temp.concat(minutes);
    console.log(temp);
    str2=str2.concat(temp)
}else{
    str2=str2.concat(minutes);
    console.log(minutes.length);
}


document.getElementById("date").innerHTML=str;
document.getElementById("time").innerHTML=str2;

function sidebarActivelink(id){
    var element = document.getElementById(id);
    element.classList.add("nav-active");
}
