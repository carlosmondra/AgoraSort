<?php
    include "DBConnect.php";
    $resSummaries = pg_query($conn, "select * from expert_summaries where id=" . $productId);
    $resRatings = pg_query($conn, "select * from expert_ratings where id=" . $productId);
    $cols = pg_num_fields($resSummaries);
?>

<div class="list-group">
    <?php 
        for ($x = 1; $x < $cols; $x++) {
    ?>
            <div class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">List group item heading</h5>
                    <small><?php echo pg_fetch_result($resRatings, 0, $x); ?></small>
                </div>
                <p class="mb-1"><?php echo pg_fetch_result($resSummaries, 0, $x); ?></p>
            </div>
    <?php
        } 
    ?>
</div>