<?php
    include "DBConnect.php";
    $resSummaries = pg_query($conn, "select * from expert_summaries where id=" . $productId);
    $resRatings = pg_query($conn, "select * from expert_ratings where id=" . $productId);
    $cols = pg_num_fields($resSummaries);

    $fieldNames = array(
        "TRUSTEDVIEWS_SUMM" => "TRUSTED VIEWS",
        "TECHRADAR_SUMM" => "TECHRADAR",
        "CNET_SUMM" => "CNET",
        "THEVERGE_SUMM" => "THEVERGE",

        "ANDROIDAUTHORITY_SUMM" => "bar",
        "ENGADGET_SUMM" => "foo",
        "DIGITALTRENDS_SUMM" => "bar",
        "ALPHA_SUMM" => "foo",

        "POCKETLINT_SUMM" => "bar",
        "EXPERTREVIEWS_SUMM" => "foo",
    );
?>

<div class="list-group">
    <?php 
        for ($x = 1; $x < $cols; $x++) {
            $rating = pg_fetch_result($resRatings, 0, $x);
            $summary = pg_fetch_result($resSummaries, 0, $x);
            if ($rating and $summary) {
    ?>
                <div class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1"><?php echo pg_field_name($resSummaries, $x); ?></h5>
                        <?php if ($rating) { ?>
                            <small><?php echo "Score " . $rating . "%"; ?></small>
                        <?php } ?>
                    </div>
                    <?php if ($summary) { ?>
                        <p class="mb-1"><?php echo $summary; ?></p>
                    <?php } ?>
                </div>
    <?php
            }
        } 
    ?>
</div>