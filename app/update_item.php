<!DOCTYPE html>
<html lang="en">
	<head>
		<title>People Health Pharmacy | Update Item</title>
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
		
		<!-- JavaScript function to go back one page. This way it retains the previous
			inputted data instead of refreshing the page -->
		<script>
			function goBack() {
			    window.history.back();
		}

		</script>
	</head>
	<body>
		<div class="container">

			<?php
				require_once ("connect.php");
				$connect = @mysqli_connect($host, $user, $pass, $sql_db);

				if ($connect)
				{
					$sql_table="items";
					$error_msg = "";

					$itemID = $_POST["itemID"];
					$itemName = $_POST["itemName"];
					$itemType = $_POST["itemType"];
					$itemPrice = $_POST["itemPrice"];
					$itemStock = $_POST["itemStock"];
					$itemDesc = $_POST["itemDescription"];


					if ($itemName == "")
					{
						$error_msg .= "<p>Item Name cannot be empty</p>";
					}

					if ($itemType == "")
					{
						$error_msg .= "<p>Type cannot be blank.</p>";
					}


					if ($itemPrice <= 0)
					{
						$error_msg .= "<p>Item price must be more than 0.</p>";
					}
					else if ($itemPrice == "")
					{
						$error_msg .= "<p>Item price cannot be blank.</p>";
					}

					
					if ($itemStock == "")
					{
						$error_msg .= "<p>Item stock cannot be blank.</p>";
					}

					$query = 
					"UPDATE $sql_table 
						SET 
						itemName = '$itemName',
						itemType = '$itemType',
						itemPrice = '$itemPrice',
						itemStock = '$itemStock',
						itemDescription = '$itemDesc'
						Where
						itemID = $itemID ";

					$result = NULL;

					if ($error_msg != "")
					{
						echo "<p>$error_msg</p>";
						echo "<p><a href=\"#\" onclick=\"goBack()\">Return to modify item form</a></p>";
					}
					else
					{
						$result = mysqli_query($connect, $query);

						if ($result)
						{
							echo "<p>Successfully updated an item!</p>";
							echo "<p><a href=\"items.php\">Return to Items Page</a></p>";

							// or will automatically return after 3 seconds
                			echo '<meta http-equiv="refresh" content="3; URL=items.php">';

						}
						else
						{
							echo "<p>Something is wrong with ", $query, "</p>";
							echo "<p>Query was not added, please try again</p>";
							echo "<p><a href=\"items.php\">Return to Items = Page</a></p>";
						}
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
