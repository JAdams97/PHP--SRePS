<?php
	$month = $_POST['month'] + 1;
	$year = $_POST['year'];

	require_once ("connect.php");
	$conn = mysqli_connect($host, $user, $pass, $sql_db);

	if (!$conn)
	{
		die("Failed to connect to $sql_db: " . mysqli_connect_error());
	}

	$query = "SELECT s.itemID, i.itemName, DAY(s.saleDate) AS saleDay, s.saleQuantity FROM sales s INNER JOIN items i ON s.itemID = i.itemID WHERE MONTH(s.saleDate) = $month AND YEAR(s.saleDate) = $year ORDER BY saleDay DESC";
	$result = mysqli_query($conn, $query);
	
	$item = new \stdClass();
	$items = array();


	while($row = mysqli_fetch_assoc($result))
	{
		$item->id = $row['itemID'];
		$item->name = $row['itemName'];
		$item->day = $row['saleDay'];
		$item->quantity = $row['saleQuantity'];

		array_push($items, $item);
    }

    echo json_encode(array("items"=>$items));
?>