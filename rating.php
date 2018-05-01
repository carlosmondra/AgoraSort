<!DOCTYPE html>
<meta charset="utf-8">

<body>
  <?php
      include "DBConnect.php";
      $userRatings = pg_query($conn, "select * from user_reviews where id=" . $productId);
      $expertRatings = pg_query($conn, "select * from expert_ratings where id=" . $productId);
      $colsUser = pg_num_fields($userRatings);
      $colsExpert = pg_num_fields($expertRatings);

      $uRatings = array();
      for ($x = 1; $x < $colsUser; $x++) {
        $col = 4 - (($x - 1) % 5);
        $uRatings[$col] = $uRatings[$col] + pg_fetch_result($userRatings, 0, $x);
      }

      $eRatings = array();
      for ($y = 0; $y < 5; $y++) {
        $eRatings[$y] = 0;
      }
      for ($x = 1; $x < $colsExpert; $x++) {
        $rating = pg_fetch_result($expertRatings, 0, $x);
        if ($rating >= 80) {
          $eRatings[4] = $eRatings[4] + 1;
        } elseif ($rating >= 60) {
          $eRatings[3] = $eRatings[3] + 1;
        } elseif ($rating >= 40) {
          $eRatings[2] = $eRatings[2] + 1;
        } elseif ($rating >= 20) {
          $eRatings[1] = $eRatings[1] + 1;
        } else {
          $eRatings[0] = $eRatings[0] + 1;
        }
      }
  ?>

  <div class="container-fluid">
    <div class="row m-2">
        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
            <center><h3>
              User Ratings
              <svg id="svg1" width="500" height="300"></svg>
            </h3></center>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
            <center><h3>
              Expert Ratings
              <svg id="svg2" width="500" height="300"></svg>
            </h3></center>
        </div>
    </div>
  </div>

  <script src="//d3js.org/d3.v4.js"></script>
  <script>

    
      
  data_user = [
    {"reviewCat": "0-19%", "numReviews": <?php echo $uRatings[0] ?>},
    {"reviewCat": "20-39%", "numReviews": <?php echo $uRatings[1] ?>},
    {"reviewCat": "40-59%", "numReviews": <?php echo $uRatings[2] ?>},
    {"reviewCat": "60-79%", "numReviews": <?php echo $uRatings[3] ?>},
    {"reviewCat": "80-100%", "numReviews": <?php echo $uRatings[4] ?>}
  ]
  const svg1 = d3.select("#svg1");

  data_expert = [
     {"reviewCat": "0-19%", "numReviews": <?php echo $eRatings[0] ?>},
    {"reviewCat": "20-39%", "numReviews": <?php echo $eRatings[1] ?>},
    {"reviewCat": "40-59%", "numReviews": <?php echo $eRatings[2] ?>},
    {"reviewCat": "60-79%", "numReviews": <?php echo $eRatings[3] ?>},
    {"reviewCat": "80-100%", "numReviews": <?php echo $eRatings[4] ?>}
  ]
  const svg2 = d3.select("#svg2");

  createVis(data_user, svg1)
  createVis(data_expert, svg2)


  function createVis(data, svg) {
    var margin = {top: 20, right: 20, bottom: 30, left: 80};
    var width = +svg.attr("width") - margin.left - margin.right;
    var height = +svg.attr("height") - margin.top - margin.bottom;
      
    // var tooltip = d3.select("body").append("div").attr("class", "toolTip");
    var tooltip = d3.select(".toolTip")
    // console.log("test")
      
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
        // .on("mousemove", function(d){
        //     tooltip
        //       .style("left", d3.event.pageX - 50 + "px")
        //       .style("top", d3.event.pageY - 70 + "px")
        //       .style("display", "inline-block")
        //       .html((d.reviewCat) + "<br>" + (d.numReviews) + " user reviews");
        // })
        // .on("mouseout", function(d){ tooltip.style("display", "none");})
        .append("title")
        .text(d => d.reviewCat + "\n" + d.numReviews + " reviews")
  }


  </script>
</body>