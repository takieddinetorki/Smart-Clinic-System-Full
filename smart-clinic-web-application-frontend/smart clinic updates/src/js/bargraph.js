var margin1 = { top: 30, right: 30, bottom: 70, left: 60 },
  width1 = 460 - margin1.left - margin1.right,
  height1 = 200 - margin1.top - margin1.bottom;

// append the svg object to the body of the page
var doc1 = document.getElementById("bgraph");
var svg1 = d3
  .select(doc1)
  .append("svg")
  .attr("width", width1 + margin1.left + margin1.right)
  .attr("height", height1 + margin1.top + margin1.bottom)
  .append("g")
  .attr("transform", "translate(" + margin1.left + "," + margin1.top + ")");

// Parse the Data
d3.csv(
  "https://raw.githubusercontent.com/holtzy/data_to_viz/master/Example_dataset/7_OneCatOneNum_header.csv",
  function (data) {
    // sort data
    data.sort(function (b, a) {
      return a.Value - b.Value;
    });

    // X axis
    var x = d3
      .scaleBand()
      .range([0, width1])
      .domain(
        data.map(function (d) {
          return d.Country;
        })
      )
      .padding(0.2);
    svg1
      .append("g")
      .attr("transform", "translate(0," + height1 + ")")
      .call(d3.axisBottom(x))
      .selectAll("text")
      .attr("transform", "translate(-10,0)rotate(-45)")
      .style("text-anchor", "end");

    // Add Y axis
    var y = d3.scaleLinear().domain([0, 13000]).range([height1, 0]);
    svg1.append("g").call(d3.axisLeft(y));

    //Append a defs (for definition) element to your SVG
    var defs = svg.append("defs");

    //Append a linearGradient element to the defs and give it a unique id
    var linearGradient = defs
      .append("linearGradient")
      .attr("id", "linear-gradient");

    //Horizontal gradient
    linearGradient
      .attr("x1", "0%")
      .attr("y1", "0%")
      .attr("x2", "0%")
      .attr("y2", "100%");

    //Set the color for the start (0%)
    linearGradient
      .append("stop")
      .attr("offset", "0%")
      .attr("stop-color", "#d1d1d1"); //light blue

    //Set the color for the end (100%)
    linearGradient
      .append("stop")
      .attr("offset", "50%")
      .attr("stop-color", "#7E7E7E"); //dark blue

    // Bars
    svg1
      .selectAll("mybar")
      .data(data)
      .enter()
      .append("rect")
      .attr("x", function (d) {
        return x(d.Country);
      })
      .attr("y", function (d) {
        return y(d.Value);
      })
      .attr("width", x.bandwidth() - 10)
      .attr("height", function (d) {
        return height1 - y(d.Value);
      })
      .style("fill", "url(#linear-gradient)")
      .attr("rx", "10");
  }
);
