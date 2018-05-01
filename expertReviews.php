<?php
    include "DBConnect.php";
    $resSummaries = pg_query($conn, "select * from expert_summaries where id=" . $productId);
    $resRatings = pg_query($conn, "select * from expert_ratings where id=" . $productId);
    $cols = pg_num_fields($resSummaries);

    $fieldNames = array(
        0 => "TRUSTED VIEWS",
        1 => "TECH RADAR",
        2 => "CNET",
        3 => "THE VERGE",
        4 => "ANDROID AUTHORITY",
        5 => "ENGADGET",
        6 => "DIGITAL TRENDS",
        7 => "ALPHA",
        8 => "POCKET LINT",
        9 => "EXPERT REVIEWS"
    );
?>

<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <center><h2>
                Expert Reviews
            </h2></center>
        </div>
    </div>
</div>

<div class="list-group">
    <?php 
        for ($x = 1; $x < $cols; $x++) {
            $rating = pg_fetch_result($resRatings, 0, $x);
            $summary = pg_fetch_result($resSummaries, 0, $x);
            if ($rating and $summary) {
                $linkToReview = "http://www.google.com/search?q=" . str_replace(" ", "+", $fieldNames[$x]) . "+" . $row["phone_name"] . "&btnI"
    ?>          <a href="<?php echo $linkToReview ?>" class="link-summaries">
                    <div class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1"><?php echo $fieldNames[$x]; ?></h5>
                            <?php if ($rating) { ?>
                                <small style="font-size: 20px;"><?php echo "Score " . $rating . "%"; ?></small>
                            <?php } ?>
                        </div>
                        <?php if ($summary) { ?>
                            <p class="mb-1"><?php echo $summary; ?></p>
                        <?php } ?>
                    </div>
                </a>
    <?php
            }
        }
        pg_close($conn); 
    ?>
</div>