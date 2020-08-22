var total_days = 30;
var container_width = 350;
// var container_height = 200;
var MAX_COUNT = 0;

function label_y_axis(data, div, label_gap) {
  var maxvalue = 0;
  for (var i = 0; i < total_days; i++) {
    if (data[i] > maxvalue) {
      maxvalue = data[i];
    }
  }
  //label with diffrence label_gap
  var label_count = maxvalue / label_gap;
  var temp = maxvalue + label_gap;
  for (var i = 0; i < label_count; i++) {
    temp = temp - label_gap;
    var para = document.createElement("p");
    var node = document.createTextNode(temp);

    para.appendChild(node);
    div.appendChild(para);
  }
  div.style.fontFamily = "'Poppins',sans-serif";
  return maxvalue;
}
function createDiv() {}
function plot_graph(graph, data, MAX_COUNT, classname) {
  var div_width = container_width / total_days;
  var total_height = graph.clientHeight;
  var PPPH = total_height / MAX_COUNT;

  for (var i = 0; i < total_days; i++) {
    console.log("new div");
    var enclosureDiv = document.createElement("div");
    var newtransparentDiv = document.createElement("div");
    newtransparentDiv.style.height = total_height - PPPH * data[i];
    newtransparentDiv.style.width = div_width;

    var newDiv = document.createElement("div");
    newDiv.style.height = PPPH * data[i];
    newDiv.style.width = div_width;
    newDiv.classList.add(classname);

    enclosureDiv.appendChild(newtransparentDiv);
    enclosureDiv.appendChild(newDiv);
    graph.appendChild(enclosureDiv);
  }
}
function plot_graph1() {
  var data = [];
  for (var i = 0; i < total_days; i++) {
    //filling the temp data
    data_temp = Math.floor(Math.random() * 100 + 20);
    data.push(data_temp);
  }
  var div = document.getElementById("y-axis");
  MAX_COUNT = label_y_axis(data, div, 15);
  var graph = document.getElementById("graph-1");
  plot_graph(graph, data, MAX_COUNT, "divG1");
}
function plot_graph2() {
  var data = [];
  for (var i = 0; i < total_days; i++) {
    //filling the temp data
    data_temp = Math.floor(Math.random() * 50000 + 5000);
    data.push(data_temp);
  }
  var div = document.getElementById("y-axis2");
  MAX_COUNT = label_y_axis(data, div, 10000);
  var graph = document.getElementById("graph-2");
  plot_graph(graph, data, MAX_COUNT, "divG2");
}


  plot_graph1();
  plot_graph2();
