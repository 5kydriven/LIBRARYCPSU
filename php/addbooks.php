<?php

include 'db.php';

if (!isset($_FILES['image']['tmp_name'])) {
			echo "";
			}

			else{
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

		if ($row > 0) {
			
						echo "<script>alert('ISBN No alreary exist :)')</script>";
                        echo "<script>window.open('../admin/books.php', '_self')</script>";
	
		}else{
		mysqli_query($conn, "INSERT into books (title,authors,authors1,authors2,authors3,authors4,edition,publication,publisher,isbn,copyright,copies,category,rack,colunn,row,section,physical,notes,bookimage,used) values ('$a','$aa','$author1','$author2','$author3','$author4','$edition','$aaa','$aaaa','$aaaaa','$aaaaaa','$aaaaaaa','$aaaaaaaa','','','','$section','$physical','$notes','$bookimage','')");


						echo "<script>alert('Added successfully :)')</script>";
                        echo "<script>window.open('../admin/books.php', '_self')</script>";
	}
}}}

?>