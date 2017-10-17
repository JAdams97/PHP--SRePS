<!DOCTYPE html>
<html lang="en">
	<head>
		<title>People Health Pharmacy | Report</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<!-- Stylesheets -->
		<link href="css/bootstrap.min.css" rel="stylesheet" />
		<link href="css/style.css" rel="stylesheet" />
	</head>
	<body class="content-body">
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
					<li class="active"><a href="#">Report</a></li>
					<li><a href="forecast.php">Forecasting</a></li>
				</ul>
				<form class="navbar-form navbar-right" action="index.html">
					<button class="btn" type="submit">Logout</button>
				</form>
			</div>
		</nav>
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="display-2">Generate a Report</h1>
					<hr />
					<p>The form below will allow you to generate sales reports for a given month or week. To begin, follow the steps outlined below:</p>
					<ol>
						<li>Select whether you would like to generate a monthly or weekly report.</li>
						<li>Choose the month and year (if monthly) or start date, month, and year (if weekly) into the text fields below the radio buttons.</li>
						<li>Click on the 'Generate Results' button to view a preview of the data in a table.</li>
						<li>If the result is satisfactory, click on the 'Download Results' button to receive a .CSV of the produced data.</li>
					</ol>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<hr />
					<form class="form" method="post" action="save_report.php">
						<div class="form-group">
							<label for="type" class="label-title">Report Type:</label>
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
						<div class="form-group" id="month-area">
							<label for="month-period" class="label-title">Report Period:</label>
							<div id="month-period" class="row">
								<div class="col-lg-2">
									<label for="mp-month">Month</label>
									<select class="form-control" id="mp-month" name="month"></select>
								</div>
								<div class="col-lg-2">
									<label for="mp-year">Year</label>
									<select class="form-control" id="mp-year" name="year"></select>
								</div>
							</div>
						</div>
						<div class="form-group">
							<input type="submit" class="btn btn-primary" id="gen-button" value="Generate" />
						</div>
					</form>
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
	</body>
	<!-- jQuery and JS-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="js/report_functions.js"></script>
	<!-- Bootstrap plug-in file -->
	<script src="js/bootstrap.min.js"></script>
</html>
