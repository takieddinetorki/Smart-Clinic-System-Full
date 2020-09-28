var total_days = 30;
var container_width = 350;
// var container_height = 200;
var MAX_COUNT = 0;
function cleargraph(graph) {
  while (graph.firstChild) {
    graph.removeChild(graph.firstChild);
  }
}
function label_y_axis(data, div, label_gap) {
  cleargraph(div);
  var maxvalue = 0;
  for (var i = 0; i < total_days; i++) {
    if (data[i] > maxvalue) {
      maxvalue = data[i];
    }
  }
  //label with diffrence label_gap
  var label_count = Number(maxvalue) / Number(label_gap);
  var temp = Number(maxvalue) + Number(label_gap);
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

function plot_graph(graph, data, MAX_COUNT, classname,text) {
  cleargraph(graph);
  var div_width = container_width / total_days;
  var total_height = graph.clientHeight;
  var PPPH = total_height / MAX_COUNT;

  for (var i = 0; i < total_days; i++) {
    var enclosureDiv = document.createElement("div");
    var newtransparentDiv = document.createElement("div");
    var flag=0;
    if(data[i]==0){
      flag=1;
      data[i]=0.5;  //just to make user aware
    }
    newtransparentDiv.style.height = total_height - PPPH * data[i];
    newtransparentDiv.style.width = div_width;
    var newDiv = document.createElement("div");
    newDiv.style.height = PPPH * data[i];
    newDiv.style.width = div_width;
    newDiv.classList.add(classname);
    newDiv.id=classname+i;

    var hoverDiv = document.createElement("div");
    if(flag==1){
      hoverDiv.innerHTML=0+ " "+text;
    }else{
      hoverDiv.innerHTML=data[i]+ " "+text;
    }
    hoverDiv.classList.add("toolTip"); 
    hoverDiv.id =classname+ i+"tooltip";
    newDiv.addEventListener("mouseover",function (event){
      document.getElementById(event.target.id+"tooltip").style.display="block";
    })
    newDiv.addEventListener("mouseout",function (event){
      document.getElementById(event.target.id+"tooltip").style.display="none";
    })

    enclosureDiv.appendChild(newtransparentDiv);
    enclosureDiv.appendChild(hoverDiv);
    enclosureDiv.appendChild(newDiv);
    graph.appendChild(enclosureDiv);
  }
}
function plot_graph1(data,tc) {
  // var data = [];
  // for (var i = 0; i < total_days; i++) {
  //   //filling the temp data
  //   data_temp = Math.floor(Math.random() * 100 + 20);
  //   data.push(data_temp);
  // }
  total_days=tc;
  var div = document.getElementById("y-axis");
  MAX_COUNT = label_y_axis(data, div, 15);
  var graph = document.getElementById("graph-1");
  plot_graph(graph, data, MAX_COUNT, "divG1","patients");
}
function plot_graph2(data,tc) {
  // var data = [];
  // for (var i = 0; i < total_days; i++) {
  //   //filling the temp data
  //   data_temp = Math.floor(Math.random() * 50000 + 5000);
  //   data.push(data_temp);
  // }
  total_days=tc;
  var div = document.getElementById("y-axis2");
  MAX_COUNT = label_y_axis(data, div, 10000);
  var graph = document.getElementById("graph-2");
  plot_graph(graph, data, MAX_COUNT, "divG2","expenses");
}


  // plot_graph1();
  //plot_graph2();
