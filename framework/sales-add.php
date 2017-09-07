<!DOCTYPE html>
<html lang="en">
	<head>
		<title>People Health Pharmacy | Add Sale</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<!-- Bootstrap -->
		<link href="css/bootstrap.min.css" rel="stylesheet" />
		<!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="js/html5shiv.min.js"></script>
		<script src="js/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-sm-10">
					<h1>Company Logo</h1>
					<!-- style the company logo to be center of page?-->
				</div>
				<br>
				<div class="col-sm-2">
					<form action="main.html">
						<button type="submit">Logout</button>
					</form>

				</div>
			</div>
			<div class="row">
				<!-- For now using <br> tag to seperate each section. Use CSS style instead  -->
				<br><br>
				<div class="col-sm-3">
				<!-- This will be the dashboard which contains links to the other pages -->
				<!-- will be styled -->
					<div class="dashboard">
						<strong>Dashboard (aka nav bar)</strong>
						<ul>
							<li><a href="index.html">Home</a></li>
							<li><a href="items.html">Items</a></li>
							<li><a href="sales.html">Sales</a></li>
							<li><a href="report.html">Report</a></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-8">
					<strong>Middle Content: Sale screen, add/delete/modify sales record</strong>
					<hr>
					<form id="saleAddForm" method="post" action="add_sale.php">
						<p>
							<label for="saleItem">Item Name:</label>
							<input type="text" name="saleItem" id="saleItem" />
						</p>
						<p>
							<label for="saleDate">Date:</label>
							<input type="date" name="saleDate" id="saleDate" />
						</p>
						<p>
							<label for="saleQuantity">Item Quantity:</label>
							<input type="text" name="saleQuantity" id="saleQuantity" />
						</p>
						<p>
							<label for="saleCost">Cost:</label>
							<input type="text" name="saleCost" id="saleCost" />
						</p>

						<input type="submit" id="subSaleAdd" value="Submit" />
						<input type="reset" id="resSaleAdd" value="Clear Form" />
					</form>
				</div>
			</div>
		</div>

		<!-- AngularJS v1.6.3 -->
		<script src="js/angular.min.js"></script>
		<!-- jQuery - required for Bootstrap's JavaScript plugins) -->
		<script src="js/jquery.min.js"></script>
		<!-- Bootstrap plug-in file -->
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>
