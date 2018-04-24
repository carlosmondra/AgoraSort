<!DOCTYPE html>
<html lang="en">
<head>
  <title>MarketSort</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
  <script src="https://d3js.org/d3.v4.min.js"></script>

  <link rel="stylesheet" href="css/product.css">
</head>
<!-- <style>
    div.row, div.col {
        border-style: solid;
    }
</style> -->
<body>
    <?php
        $productId = $_GET["productId"];
        include "DBConnect.php";
        $sql = "select * from phones where id=" . $productId;
        $result = pg_query($conn, $sql);
        $row = pg_fetch_assoc($result); 
    ?>
  
  <!--Navigation bar-->
<div id="nav-placeholder">
    <?php
        include 'nav.php';
    ?>
</div>

<?php
    echo $row["phone_name"];
?>

<?php
    function getRatingCols($conn) {
        $ratings = array();
        $res = pg_query($conn, "select * from expert_ratings where id = 1");
        $i = pg_num_fields($res);
        for ($j = 0; $j < $i; $j++) {
            $ratings[] = pg_field_name($res, $j);
        }
        return $ratings;
    }

    function getSummaryCols($conn) {
        $summaries = array();
        $res = pg_query($conn, "select * from expert_summaries where id = 1");
        $i = pg_num_fields($res);
        for ($j = 0; $j < $i; $j++) {
            $fieldname = pg_field_name($res, $j);
            if ($fieldname != 'ID') {
                $summaries[] = $fieldname;
            }
        }
        return $summaries;
    }

    function selectColumns($table, $cols, $productId) {
        $sql = "SELECT ";
        foreach ($cols as $col) {
            $sql = $sql . $col . ",";
        }
        $sql = substr($sql, 0, -1);
        return $sql . " FROM " . $table . " WHERE ID=" . $productId;
    }
?>

<div class="container-fluid">
    <div class="row m-5">
        <div class="col">
            <!-- Here goes the pictures of the phone -->
            <?php 
                include 'with-jquery.php';
            ?>
        </div>
    </div>
    <div class="row m-5">
    <div class="col">
        <!-- Here goes the user reviews visualization -->
            <?php
                include "rating.php";
            ?>
        </div>
    </div>
    <div class="row m-5">
        <div class="col">
            <?php
                include "expertReviews.php";
            ?>
        </div>
    </div>
</div>


</body>
</html>