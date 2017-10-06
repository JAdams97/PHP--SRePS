<!DOCTYPE html>
<html lang="en" data-ng-app="phpApp">
	<head>
		<title>People Health Pharmacy | Sales</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<!-- Bootstrap -->
		<link href="css/bootstrap.min.css" rel="stylesheet" />
		<!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="js/html5shiv.min.js"></script>
		<script src="js/respond.min.js"></script>
		<![endif]-->
		<!-- styles -->
		<link href="css/style.css" rel="stylesheet" />
	</head>
	<body>
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="main.php">
						<img alt="brand logo" src="images/logo.png"/>
					</a>
				</div>
				<div class="nav navbar-nav">
					<h1 class="navbar-text">People Health Pharmacy</h1>
				</div>
				<ul class="nav navbar-nav navbar-left">
					<li><a href="main.php">Home</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Items<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="items.php">Items</a></li>
							<li><a href="items-add.php">Add Item</a></li>
						</ul>
					</li>	
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Sales<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li class="active"><a href="#">Sales</a></li>
							<li><a href="sales-add.php">Add Sale</a></li>
						</ul>
					</li>
					<li><a href="report.php">Report</a></li>
					<li><a href="forecast.php">Forecasting</a></li>
				</ul>
				<form class="navbar-form navbar-right" action="index.php">
					<button class="btn" type="submit">Logout</button>
				</form>
			</div>
		</nav>
		<div class="container" data-ng-controller="salesCtrl">
			<div class="row">
				<div class="col-lg-12">
					<div class="table-responsive">
						<table class="table table-striped table-hover">
							<thead>
								<tr>
									<th scope="col" id="saleID">Sale ID</th>
									<th scope="col" id="saleItem">Item ID</th>
									<th scope="col" id="saleDate">Sale Date</th>
									<th scope="col" id="saleQuantity">Item Quantity</th>
									<th scope="col" id="saleCost">Total Cost</th>
									<th scope="col" id="saleStatus">Status</th>
									<th scope="col" id="saleManage">Manage</th>
								</tr>
							</thead>
							<tbody>
								<tr data-ng-repeat="s in sales">
									<td>{{s.saleID}}</td>
									<td>{{s.itemID}}</td>
									<td>{{s.saleDate}}</td>
									<td>{{s.saleQuantity}}</td>
									<td>{{s.saleCost}}</td>
									<td>{{s.saleStatus}}</td>
									<td>
										<input class="btn" type="button" value="Modify" />
										<input class="btn" type="button" value="Delete" />
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<hr/>
					<footer>
						<p>&copy; People Health Pharmacy Inc., 2017</p>
					</footer>
				</div>
			</div>
		</div>
		<!-- AngularJS v1.6.3 -->
		<script src="js/angular.min.js"></script>
		<script src="js/php_app.js"></script>
		<!-- jQuery - required for Bootstrap's JavaScript plugins) -->
		<script src="js/jquery.min.js"></script>
		<!-- Bootstrap plug-in file -->
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>