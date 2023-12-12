<?php

include 'db.php';

$bookid = $_GET['bookid'];


			$file=$_FILES['image']['tmp_name'];
			$image = $_FILES["image"] ["name"];
			$image_name= addslashes($_FILES['image']['name']);
			$size = $_FILES["image"] ["size"];
			$error = $_FILES["image"] ["error"];
			{
						if($size > 10000000) //conditions for the file
						{
						die("Format is not allowed or file size is too big!");
						}
						
					else
						{

					move_uploaded_file($_FILES["image"]["tmp_name"],"../upload/" . $_FILES["image"]["name"]);			
					$bookimage=$_FILES["image"]["name"];


      	$a = $_POST['title'];
		$aa = $_POST['authors'];

		$author1 = $_POST['authors1'];
		$author2 = $_POST['authors2'];
		$author3 = $_POST['authors3'];
		$author4 = $_POST['authors4'];


		$edition = $_POST['edition'];
		$aaa = $_POST['publication'];
		$aaaa = $_POST['publisher'];
		$aaaaa = $_POST['isbn'];
		$aaaaaa = $_POST['copyright'];
		$aaaaaaa = $_POST['copies'];

		$aaaaaaaa = $_POST['category'];
		$section = $_POST['section'];
		$physical = $_POST['physical'];
		$notes = $_POST['notes'];
		// $aaaaaaaaa = $_POST['rack'];
		// $aaaaaaaaaa = $_POST['column'];
		// $aaaaaaaaaaa = $_POST['row'];

		// $aaaaaaaaaaaa = $_POST['used'];

		$sql = mysqli_query($conn, "SELECT * from books where isbn = $aaaaa ");
		$row = mysqli_num_rows($sql);

		if ($row > 1) {
			
						echo "<script>alert('ISBN No alreary exist :)')</script>";
                        echo "<script>window.open('../admin/books.php', '_self')</script>";
	
		}else{
		mysqli_query($conn, "UPDATE books set title = '$a', authors ='$aa', authors1 ='$author1', authors2 ='$author2', authors3 ='$author3', authors4 ='$author4', edition = '$edition', publication = '$aaa', publisher = '$aaaa', isbn = '$aaaaa', copyright = '$aaaaaa', copies = '$aaaaaaa', category = '$aaaaaaaa', rack = '', colunn = '', row = '',section = '$section',physical = '$physical', notes ='$notes', bookimage = '$bookimage', used = '' where bookid = '$bookid'");


						echo "<script>alert('Updated successfully :)')</script>";
                        echo "<script>window.open('../admin/books.php', '_self')</script>";
	}
}}

?>



?>