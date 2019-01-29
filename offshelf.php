<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Off The Shelf</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
		<link href="css/offshelf.css" rel="stylesheet">
		<link href="css/hwhite.css" rel="stylesheet">
  </head>
  <body>

    <div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<?php include_once("navbar.php"); ?>
				<h1 align="center">Off the Shelf Products</h1>

					<?php
					$result = mysqli_query($con, "SELECT Software_ID, Software_Name FROM Software");
					$count = 0;
					while ($row = mysqli_fetch_array($result)) {
					if ($count == 0 || ($count > 1 && $count % 3 == 0)) { ?>
						<div class="row"> <?php } ?>
						<div class="col-md-4 col-lg-4 col-sm-4 col-xs-4">
							<div>
								<img id='product' src='product.jpg' />
								<h3><?php echo $row['Software_Name'] ?></h3>
								<?php
								echo "<a href='productdesc.php?id=".$row['Software_ID']."'>";
								echo "<button type='button' class='btn btn-success'>View</button>";
								echo "</a>"
								?>
							</div>
						</div> <?php
						if (++$count % 3 == 0) echo '</div>';
					} ?>
			</div>
		</div>
</div>
</div>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
  </body>
</html>