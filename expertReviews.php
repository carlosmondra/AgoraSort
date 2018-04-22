<?php
    $ratings = getRatingCols($db);
    $summary = getSummaryCols($db);
    $sqlRatings = selectColumns("EXPERT_REVIEWS", $ratings, $productId);
    $sqlSummary = selectColumns("EXPERT_REVIEWS", $summary, $productId);
    echo $sqlRatings;
    echo $sqlSummary;
    
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