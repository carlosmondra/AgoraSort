<!DOCTYPE html>
<html lang="en">
<head>
  <title>MarketSort</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="css/main.css">
</head>

<body>  
  <!--Navigation bar-->
	<div id="nav-placeholder">
		<?php
			include 'nav.php';
		?>
	</div>

<div class="container-fluid">
<?php
	include "DBConnect.php";

	function getUserRating($conn, $id) {
		$userRatings = pg_query($conn, "select * from user_reviews where id=" . $id);
		$colsUser = pg_num_fields($userRatings);

		$finalUserRating = 0;
		$totalRatings = 0;
		for ($x = 1; $x < $colsUser; $x++) {
			$currentRatings = pg_fetch_result($userRatings, 0, $x);
			$totalRatings = $totalRatings + $currentRatings;
			$weight = 5 - (($x - 1) % 5);
			$finalUserRating = $finalUserRating + $currentRatings * $weight * 20;
		}
		return round($finalUserRating / $totalRatings);
	}

	function getExpertRating($conn, $id) {
		$expertRatings = pg_query($conn, "select * from expert_ratings where id=" . $id);
		$colsExpert = pg_num_fields($expertRatings);
		$finalExpertRating = 0;
		for ($x = 1; $x < $colsExpert; $x++) {
			$finalExpertRating = $finalExpertRating + pg_fetch_result($expertRatings, 0, $x);
		}
		return round($finalExpertRating / $colsExpert);
	}

	$result = pg_query($conn, "select * from phones");
	$count = 0;
	while ($row = pg_fetch_assoc($result)) {
		if ($count % 5 == 0) {
			?><div class="row mb-4"><?php
		} ?>
		<div class="col-lg col-md col-sm-6 col-xs-12">
			<div class="centerBlock product-img">
				<img src="<?php echo $row['img_url']; ?>"  class="img-responsive" style="max-width: 100%; height: auto;"/>
				<a href="product.php?productId=<?php echo $row['id']; ?>">
					<div class="overlay">
						<div class="text">
							<?php echo $row['headline']; ?>
							<br>
							Expert Rating: <?php echo getExpertRating($conn, $row['id']); ?>
							<br>
							User Rating: <?php echo getUserRating($conn, $row['id']); ?>
						</div>
					</div>
				</a>
			</div>
			<center>
				<h6><?php echo $row['phone_name']; ?></h6>
			</center>
        </div>
		<?php 
		$count = $count + 1;
		if ($count % 5 == 0) {
			?></div><?php
		}
	}
	pg_close($conn);
?>
</div>




</body>
</html>
