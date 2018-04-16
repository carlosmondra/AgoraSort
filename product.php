<!DOCTYPE html>
<html lang="en">
<head>
  <title>Nuzar</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
  <script src="https://d3js.org/d3.v4.min.js"></script>
</head>
<style>
    div.row, div.col {
        border-style: solid;
    }
</style>
<body>
  
  <!--Navigation bar-->
<div id="nav-placeholder"></div>

<div class="container-fluid">
    <div class="row m-5">
        <div class="col">
            <!-- Here goes the pictures of the phone -->
            <div id="images-visualization"></div>
        </div>
        <div class="col">
            <!-- Here goes the user reviews visualization -->
            <div id="rating-visualization"></div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <!-- Websites for the product -->
        </div>
    </div>
</div>

<script>
$(function(){
  $("#nav-placeholder").load("nav.php");
});
$(function(){
  $("#images-visualization").load("with-jquery.php");
});
$(function(){
  $("#rating-visualization").load("rating.php");
});
$("#test-image").attr("src","img/032.jpg");
</script>

</body>
</html>