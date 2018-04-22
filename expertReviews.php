<?php 
    $tablesquery = $db->query("PRAGMA table_info(EXPERT_REVIEWS);");

    $col = 1;
    $ratings = array();
    $summary = array();
    while ($table = $tablesquery->fetchArray(SQLITE3_ASSOC)) {
        if ($col % 2 == 1) {
            if ($table['name'] != 'ID') {
                $ratings[] = $table['name'];
            }
        } else {
            $summary[] = $table['name'];
        }
        $col = $col + 1;
    }

    function selectColumns($table, $cols, $productId) {
        $sql = "SELECT ";
        foreach ($cols as $col) {
            $sql = $sql . $col . ",";
        }
        $sql = substr($sql, 0, -1);
        return $sql . "FROM " . $table . " WHERE ID=" . $productId;
    }

    $sqlRatings = selectColumns("EXPERT_REVIEWS", $ratings, $productId);
    $sqlSummary = selectColumns("EXPERT_REVIEWS", $summary, $productId);
    
    /* $ret = $db->query($sql);
    $row = $ret->fetchArray(SQLITE3_ASSOC);

    if ($row['ANDROIDAUTHORITY_SUMM'] !== NULL) {
        echo "damn";
    } else {
        echo "yes";
    } */
?>

<div class="list-group">
    <?php if (true) { ?>
        <div class="list-group-item list-group-item-action flex-column align-items-start">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">List group item heading</h5>
                <small>3 days ago</small>
            </div>
            <p class="mb-1"><?php echo $row['TRUSTEDVIEWS_SUMM']; ?></p>
        </div>
    <?php } ?>
</div>