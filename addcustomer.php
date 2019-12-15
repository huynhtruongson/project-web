<?php
	require_once("conn.php");
	//require_once("checklogin.php");
	$userroomid =$_POST["userroomid"];
	$userfirstname = $_POST["userfirstname"];
	$userlastname = $_POST["userlastname"];
	$useremail = $_POST["useremail"];
	$userphone = $_POST["userphone"];
    $userarrivaldate = $_POST["userarrivaldate"];
    $userdeparturedate = $_POST["userdeparturedate"];
    $useramount = $_POST["useramount"];
	$userservice = $_POST["userservice"];
	$userprice = $_POST["userprice"];
	$usertotalmoney = $userprice*$useramount;
	$userdate = date("d/m/Y");
	$userid=$_POST["userid"];
	if (!empty($_POST["userid"])) {
		// UPDATE
		$sql = "UPDATE customer SET userfirstname='$userfirstname',userlastname='$userlastname',useremail='$useremail',userphone ='$userphone',userarrivaldate='$userarrivaldate',userdeparturedate='$userdeparturedate',useramount='$useramount',userservice='$userservice',usertotalmoney='$usertotalmoney' WHERE userid='$userid'";
		if ($conn->query($sql) === FALSE) {
			die("Error: " . $sql . $conn->error);
		} else {
			header("Location: index.php");
		}
	} else { 
		// ADD
		$sql = "INSERT INTO customer (userroomid, userfirstname, userlastname, useremail, userphone, userarrivaldate, userdeparturedate, useramount, userservice,userdate,usertotalmoney)
			VALUES ('$userroomid', '$userfirstname', '$userlastname', '$useremail', '$userphone', '$userarrivaldate', '$userdeparturedate','$useramount','$userservice','$userdate','$usertotalmoney')";
		if ($conn->query($sql) === FALSE) {
			die("Error: " . $sql . $conn->error);
		} else {
			header("Location: customer-info.php?userphone=$userphone");
		}
	}
	
			
	/*if ($conn->query($sql) === FALSE) {
		die("Error: " . $sql . $conn->error);
	} else {
		header("Location: customer-info.php?userphone=$userphone");
	}*/
?>