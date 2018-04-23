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
    include "DBConnect.php";
    if ($conn) {
        echo "yes";
    } else {
        echo "nope";
    }
    $sql = "SELECT * FROM PHONES WHERE ID=" . $productId;
    $result = pg_query($conn, $sql);
    $row = pg_fetch_assoc($result);  
    var_dump($result);      
?>

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



</body>
</html>