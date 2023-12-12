<?php

	include 'db.php';

	$keys = $_GET['key'];
	$a = $_POST['category'];

	mysqli_query($conn, "UPDATE category set category = '$a' where cateid = '$keys' ");

	 echo "<script>alert('Successfully Save Changes')</script>";
                     echo "<script>window.open('../admin/category.php', '_self')</script>";

?>