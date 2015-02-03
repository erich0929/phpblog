<?php
	$conn = mysqli_connect ("192.168.10.101", "admin", "2642805");
	if (!$conn) {
		die ("Connection failed : " . mysqli_connect_error ($conn));
	}
	mysqli_select_db($conn, "test");
	mysqli_query($conn, "SET NAMES UTF8");
?>