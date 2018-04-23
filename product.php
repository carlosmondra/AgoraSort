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

  <link rel="stylesheet" href="css/product.css">
</head>
<!-- <style>
    div.row, div.col {
        border-style: solid;
    }
</style> -->
<body>
  
  <!--Navigation bar-->
<div id="nav-placeholder">
    <?php
        include 'nav.php';
    ?>
</div>

<?php
    function getRatingCols($db) {
        $tablesquery = $db->query("PRAGMA table_info(EXPERT_REVIEWS);");
        $ratings = array();
        $col = 1;
        while ($table = $tablesquery->fetchArray(SQLITE3_ASSOC)) {
            if ($col % 2 == 0) {
                $ratings[] = $table['name'];
            }
            $col = $col + 1;
        }
        return $ratings;
    }

    function getSummaryCols($db) {
        $tablesquery = $db->query("PRAGMA table_info(EXPERT_REVIEWS);");
        $summaries = array();
        $col = 1;
        while ($table = $tablesquery->fetchArray(SQLITE3_ASSOC)) {
            if ($col % 2 == 1) {
                if ($table['name'] != 'ID') {
                    $summaries[] = $table['name'];
                }
            }
            $col = $col + 1;
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
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <!-- Here goes the pictures of the phone -->
            <?php 
                $productId = $_GET["productId"];
                include 'with-jquery.php';
            ?>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
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