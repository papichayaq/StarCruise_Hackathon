<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Subscription</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/subscription.css" rel="stylesheet">
</head>

<body>

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<?php include_once("navbar.php"); ?>
				<div class="jumbotron" style="max-width:80%; margin:auto;">
					<div class="div-table" style="max-width:100%; margin:auto;">
						<div class="div-table-row">
							<form id="form1">
								<h5>
									<b>Payment Method:</b>
								</h5>
								</br>
								<input type="radio" name="gender" value="male"> Paypal - pay without sharing your financial information.</br>
								<input type="radio" name="gender" value="male"> Credit Card: </br>
								<input type="radio" name="gender" value="male"> Check or money order</br>
								</br>
								<div class="card_id" style="width: 50%; border-style: solid;">
									<p>
										Your billing information must match the billing address for the credit card entered below or we will be unable to process
										your payment.
									</p>
									<p>Card Number:
										<input type="text">
									</p>
									<p>Expiration Date:
										<input type="date">
									</p>
									<p>CVV:
										<input type="text">
										<a href=""></a> What's the CVV?</p>
								</div>
								</br>
								<input type="submit" class="btn btn-success" value="Cancel">
								<button type="button" class="btn btn-success" value="Confirm" onclick="javascript:document.location='index.php'">Confirm</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/scripts.js"></script>
</body>

</html>