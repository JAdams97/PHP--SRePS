<!DOCTYPE html>
<html lang="en">

<head>
	<title>People Health Pharmacy | Delete Sale</title>
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
</head>

<body>
	<div class="container">

		<?php
				require_once ("connect.php");
				$connect = @mysqli_connect($host, $user, $pass, $sql_db);

				if ($connect)
				{
					$sql_table="sales";
					$id = $_GET['id'];

					if (!$id)
					{
						echo "<p>No ID given, please try again</p>";
						echo "<a href=\"items.php\">Return to items</a>";
					}

					$query = "
					UPDATE $sql_table
					SET saleStatus = 0
					WHERE saleID = $id";

					$result = mysqli_query($connect, $query);

					if ($result)
					{
						echo "<p>Successfully deleted a sale!</p>";
						echo "<p><a href=\"sales.php\">Return to sales</a></p>";
					}
					else
					{
						echo "<p>Something is wrong with ", $query, "</p>";
						echo "<p>Query was not added, please try again</p>";
						echo "<p><a href=\"sales.php\">Return to sales</a></p>";
					}
				}
				else
				{
					echo "<p>Failed to connect to the database $sql_db</p>";
				}

				mysqli_close($connect);
			?>

	</div>

	<!-- AngularJS v1.6.3 -->
	<script src="js/angular.min.js"></script>
	<!-- jQuery - required for Bootstrap's JavaScript plugins) -->
	<script src="js/jquery.min.js"></script>
	<!-- Bootstrap plug-in file -->
	<script src="js/bootstrap.min.js"></script>
</body>

</html>
