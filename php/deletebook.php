<?php
	include 'db.php';

	$bookid = $_GET['bookid'];

	mysqli_query($conn, "DELETE from books where bookid = '$bookid'");


		echo "<script>alert('Deleted successfully :)')</script>";
        echo "<script>window.open('../admin/books.php', '_self')</script>";



?>