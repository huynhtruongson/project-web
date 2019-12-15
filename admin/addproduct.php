<?php
	require_once("../conn.php");
	//require_once("checklogin.php");
	$id =$_POST["id"];
	$name = $_POST["name"];
	$price = $_POST["price"];
	$bed = $_POST["bed"];
	$amount = $_POST["amount"];
	$description = $_POST["description"];
	$convenient = $_POST["convenient"];
	
	$target_dir = "../uploads/";
	$file_name = basename($_FILES["fileUpload"]["name"]);
	$target_file = $target_dir . $file_name;
	
	if (!move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target_file)) {
        die("Sorry, there was an error uploading your file.");
    }
	$id_edit=$_POST["id_edit"]; 
	if (!empty($_POST["id_edit"])) {
		// UPDATE
		$sql = "UPDATE room SET id='$id',name='$name',price='$price',bed='$bed',amount ='$amount',image='$file_name',description='$description',convenient = '$convenient' WHERE id='$id_edit'";
	} else { 
		// ADD
		$sql = "INSERT INTO room (id, name, price, bed, amount, image, description,convenient)
			VALUES ('$id', '$name', '$price', '$bed', '$amount','$file_name', '$description','$convenient')";
	}
	
			
	if ($conn->query($sql) === FALSE) {
		die("Error: " . $sql . $conn->error);
	} else {
		header("Location: index.php");
	}
?>