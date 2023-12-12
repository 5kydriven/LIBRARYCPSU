<?php
session_start();
include 'db.php';

	if(!isset($_SESSION['adminid'])){

		echo "<script>window.location='../index.php'</script>";

	
	}

		$sql=mysqli_query($conn,"SELECT * FROM admin WHERE adminid = '".$_SESSION['adminid']."'");
		$admin=mysqli_fetch_array($sql);

			$name=$admin['name'];

?>