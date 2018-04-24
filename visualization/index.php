<!DOCTYPE html>
<meta charset="utf-8">
<style>
body {
  margin: 15px;
  background-color: #F1F3F3    
}
.bar {
  fill: #0d46a0;
}
.axis path,
.axis line {
  fill: none;
  stroke: #8eb6f6;
  stroke-width: 1px;
  shape-rendering: crispEdges;
}
.x path {
  display: none;
}
.y {
  font-size:16px;
}

.toolTip {
  position: absolute;
  display: none;
  min-width: 80px;
  height: auto;
  background: none repeat scroll 0 0 #ffffff;
  border: 1px solid #6F257F;
  padding: 14px;
  text-align: center;
}
</style>
<body>
  <?php
      class MyDB extends SQLite3 {
          function __construct() {
              $this->open('agora.db');
          }
      }
      $db = new MyDB();
      if(!$db) {
          echo $db->lastErrorMsg();
      }

      $sql = "SELECT * FROM PHONES WHERE ID=" . $productId;
      $ret = $db->query($sql);
      $row = $ret->fetchArray(SQLITE3_ASSOC);
      // echo $row['PHONE_NAME'];
  ?>

  <svg id="svg1" width="500" height="500"></svg>
  <svg id="svg2" width="500" height="500"></svg>

  <script src="//d3js.org/d3.v4.js"></script>
  <script>

    
      
  data_user = [
    {"reviewCat": "0-19%", "numReviews": 18000},
    {"reviewCat": "20-39%", "numReviews": 17000},
    {"reviewCat": "40-59%", "numReviews": 80000},
    {"reviewCat": "60-79%", "numReviews": 55000},
    {"reviewCat": "80-100%", "numReviews": 1000000}
  ]
  const svg1 = d3.select("#svg1");

  data_expert = [
     {"reviewCat": "0-19%", "numReviews": 10},
    {"reviewCat": "20-39%", "numReviews": 20},
    {"reviewCat": "40-59%", "numReviews": 30},
    {"reviewCat": "60-79%", "numReviews": 40},
    {"reviewCat": "80-100%", "numReviews": 50}
  ]
  const svg2 = d3.select("#svg2");

  createVis(data_user, svg1)
  createVis(data_expert, svg2)


  function createVis(data, svg) {
    var margin = {top: 20, right: 20, bottom: 30, left: 80};
    var width = +svg.attr("width") - margin.left - margin.right;
    var height = +svg.attr("height") - margin.top - margin.bottom;
      
    var tooltip = d3.select("body").append("div").attr("class", "toolTip");
      
    var x = d3.scaleLinear().range([0, width]);
    var y = d3.scaleBand().range([height, 0]);

    var g = svg.append("g")
        .attr("transform", "translate(" + margin.left + "," + margin.top + ")");

    console.log(d3.max(data, function(d) { return d.numReviews; }))

    console.log(data)

    x.domain([0, d3.max(data, function(d) { return d.numReviews; })]);
    y.domain(data.map(function(d) { return d.reviewCat; })).padding(0.1);

    axisX = g.append("g")
        .attr("class", "x axis")
        .attr("transform", "translate(0," + height + ")")
        .call(d3.axisBottom(x).ticks(5).tickFormat(function(d) { return parseInt(d / 1000); }).tickSizeInner([-height]));

    axisX.selectAll("text").remove();


    g.append("g")
        .attr("class", "y axis")
        .call(d3.axisLeft(y));

    g.selectAll(".bar")
        .data(data)
      .enter().append("rect")
        .attr("class", "bar")
        .attr("x", 0)
        .attr("height", y.bandwidth())
        .attr("y", function(d) { return y(d.reviewCat); })
        .attr("width", function(d) { return x(d.numReviews); })
        .on("mousemove", function(d){
            tooltip
              .style("left", d3.event.pageX - 50 + "px")
              .style("top", d3.event.pageY - 70 + "px")
              .style("display", "inline-block")
              .html((d.reviewCat) + "<br>" + (d.numReviews) + " user reviews");
        })
        .on("mouseout", function(d){ tooltip.style("display", "none");});
  }


  </script>
</body>