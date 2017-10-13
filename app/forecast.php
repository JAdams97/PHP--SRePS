<!DOCTYPE html>
<html lang="en">
	<head>
		<title>People Health Pharmacy | Forecast</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<!-- Stylesheets -->
		<link href="css/bootstrap.min.css" rel="stylesheet" />
		<link href="css/style.css" rel="stylesheet" />
	</head>
	<body class="content-body">
		<body>
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="main.html">
						<img alt="brand logo" src="img/logo.png"/>
					</a>
				</div>
				<div class="nav navbar-nav">
					<h1 class="navbar-text">People Health Pharmacy</h1>
				</div>
				<ul class="nav navbar-nav navbar-left">
					<li><a href="main.html">Home</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Items<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="items.php">Items</a></li>
							<li><a href="items-add.html">Add Item</a></li>
						</ul>
					</li>	
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Sales<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="sales.php">Sales</a></li>
							<li><a href="sales-add.html">Add Sale</a></li>
						</ul>
					</li>
					<li><a href="report.html">Report</a></li>
					<li class="active"><a href="#">Forecasting</a></li>
				</ul>
				<form class="navbar-form navbar-right" action="index.html">
					<button class="btn" type="submit">Logout</button>
				</form>
			</div>
		</nav>
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<hr />
					<form class="form">
						<div class="form-group">
							<label for="type" class="label-title">Forecast Type:</label>
							<div id="type" class="row">
								<div class="col-lg-1">
									<label class="radio-inline" for="month">
										<input type="radio" id="month" name="type" value="monthly" />Monthly
									</label>
								</div>
								<div class="col-lg-1">
									<label class="radio-inline" for="week">
										<input type="radio" id="week" name="type" value="weekly" />
										Weekly
									</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<input type="button" class="btn btn-primary" id="pre-button" value="Predict" />
						</div>
					</form>
				</div>
			</div>
			<div class="row" id="forecast-result">
				<div class="col-lg-12">
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th scope="col" id="fItemID">Item ID</th>
								<th scope="col" id="fItemName">Item Name</th>
								<th scope="col" id="fItemCurrent"></th>
								<th scope="col" id="fItemFuture"></th>
							</tr
						</thead>
						<tbody id="forecast-table">
						</tbody>
					</table>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<hr/>
					<footer>
						<p>&copy; People Health Pharmacy Inc., 2017</p>
						<a href="aboutus.html">About Us</a>
						<a href="contactus.html">Contact Us</a>
					</footer>
				</div>
			</div>
		</div>
		<!-- jQuery and JS -->
		<script src="js/jquery.min.js"></script>
		<script src="js/forecast_functions.js"></script>
		<!-- Bootstrap plug-in file -->
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>
