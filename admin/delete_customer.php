<?php
	//require_once("checklogin.php");
	require_once("../conn.php");
	
	$userid = $_GET["userid"];

	// sql to delete a record
	$sql = " DELETE FROM customer WHERE userid='$userid' ";

	if ($conn->query($sql) === TRUE) {
		header('Location: customer.php');
	} else {
		die("Error deleting record: " . $conn->error);
	}

	$conn->close();
?>