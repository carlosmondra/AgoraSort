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


  <style>

.thumbnail{
    max-height: 50%;
    max-width: 100%;
}

/* Create two equal columns that floats next to each other */
.column {
    float: left;
    width: 20%;
    padding: 10px;
}

/* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
}
html, body{
  padding: 0;
  margin: 0;
}
html{
  height: 100%;
}
body{
  min-height: 100%;
}

.centerBlock {
  display: table;
  margin: auto;
}
</style>
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
   class MyDB extends SQLite3 {
      function __construct() {
         $this->open('agora.db');
      }
   }
   $db = new MyDB();
   if(!$db) {
      echo $db->lastErrorMsg();
   }

   $sql =<<<EOF
      SELECT * from PHONES;
EOF;
	$count = 0;
	$ret = $db->query($sql);
	while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
		if ($count % 5 == 0) {
			?><div class="row"><?php
		} ?>
		<div class="col">
			<a href="product.php?phone=<?php echo preg_replace('/\s/', '', $row['PHONE_NAME']); ?>">
				<center>
					<h2><?php echo $row['PHONE_NAME']; ?></h2>
				</center>
			</a>
			<div class="centerBlock product-img">
				<img src="<?php echo $row['IMG_URL']; ?>"  class="img-responsive" style="max-width: 100%; height: auto;"/>
				<div class="overlay">
					<div class="text">
						<?php echo $row['HEADLINE']; ?>
						<br>
						Expert Rating: <?php echo $row['EXPERT_RATING']; ?>
						<br>
						User Rating: <?php echo $row['USER_RATING']; ?>
					</div>
				</div>
			</div>
        </div>
		<?php 
		$count = $count + 1;
		if ($count % 5 == 0) {
			?></div><?php
		}
	}
	$db->close();
?>
</div>




</body>
</html>
