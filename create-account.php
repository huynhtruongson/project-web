<?php
    require_once("conn.php");
    session_start();
	//require_once("checklogin.php");
	$firstname =$_POST["firstname"];
	$lastname = $_POST["lastname"];
	$email = $_POST["email"];
	$phone = $_POST["phone"];
	$username = $_POST["username"];
	$password = $_POST["password"];
	
	$id=$_POST["id"]; 
	if (!empty($_POST["id"])) {
		// UPDATE
		$sql = "UPDATE user SET firstname='$firstname',lastname='$lastname',email='$email',phone='$phone',password ='$password' WHERE id='$id'";
	} else { 
		// ADD
		$sql = "INSERT INTO user (username, password, firstname, lastname, email, phone)
            VALUES ('$username', '$password', '$firstname', '$lastname', '$email','$phone')";
        $_SESSION["username"] = $username;
	}
	
			
	if ($conn->query($sql) === FALSE) {
		die("Error: " . $sql . $conn->error);
	} else {
		header("Location: index.php");
	}
?>