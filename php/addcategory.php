<?php

include 'db.php';

if (isset($_POST['submit'])) {
	
	$a = $_POST['category'];

	mysqli_query($conn, "INSERT into category (category) values ('$a')");

		echo "<script>alert('Added successfully :)')</script>";
                        echo "<script>window.open('../admin/category.php', '_self')</script>";
}


?>