<?php
	require_once ("connect.php");
	$conn = @mysqli_connect($host, $user, $pass, $db);

	if (!$conn)
	{
		echo "<p>Cannot connect to: " . $db . ": " . mysql_error() . "</p>";
	}
	
	echo "<p>Connected successfully</p>";

	$sql_table = "sales";

	$query = "SELECT * FROM $sql_table";
	$result = mysqli_query($conn, $query);
	$data = array();

	if (!$result)
	{
		die("Query cannot be executed: " . mysql_error());
	}

	while($row = mysql_fetch_array($result))
	{
		$sale_id = $row['saleID'];
		$item_id = $row['itemID'];
		$date = $row['saleDate'];
		$quantity = $row['saleQuantity'];
		$cost = $row['saleCost'];
		$status = $row['saleStatus'];

		$data[] = array('date' => $date);
	}

	echo json_encode($data)
?>