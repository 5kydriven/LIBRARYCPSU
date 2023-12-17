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


      	$title = $_POST['title'];
		$subtitle = $_POST['subTitle'];
		$author = $_POST['authors'];
		$callNum = $_POST['callnum'];
		$state1 = $_POST['state1'];
		$state2 = $_POST['state2'];
		$state3 = $_POST['state3'];
		$sub1 = $_POST['sub1'];					
		$sub2 = $_POST['sub2'];					
		$sub3 = $_POST['sub3'];					
		$dateRecieve = $_POST['dateRes'];
		$edition = $_POST['edition'];
		$srcfund = $_POST['srcfund'];
		$publication = $_POST['publication'];
		$publisher = $_POST['publisher'];
		$publisherDate = $_POST['publisherDate'];
		$isbn = $_POST['isbn'];
		$copyright = $_POST['copyright'];
		$copies = $_POST['copies'];
		$price = $_POST['price'];
		$bookDealer = $_POST['dealer'];
		$accountNum = $_POST['accnum'];					
		$category = $_POST['category'];
		$section = $_POST['section'];
		$physical = $_POST['physical'];
		$series = $_POST['series'];
		$notes = $_POST['notes'];
		

		$sql = mysqli_query($conn, "SELECT * from books where isbn = $isbn ");
		$row = mysqli_num_rows($sql);

		if ($row > 0) {
			
						echo "<script>alert('ISBN No alreary exist :)')</script>";
                        echo "<script>window.open('../admin/books.php', '_self')</script>";
	
		}else{
		mysqli_query($conn, "INSERT into books (title,subtitle,callnum,authors,state1,state2,state3,edition,copies,publisher,publisherdate,publication,physical,series,sub1,sub2,sub3,notes,isbn,bookdealer,price,copyright,accnum,dateres,srcfund,category,section,bookimage) values ('$title','$subtitle','$callNum','$author','$state1','$state2','$state3','$edition','$copies','$publisher','$publisherDate','$publication','$physical','$series','$sub1','$sub2','$sub3','$notes','$isbn','$bookDealer','$price','$copyright','$accountNum','$dateRecieve','$srcfund','$category','$section','$bookimage')");


						echo "<script>alert('Added successfully :)')</script>";
                        echo "<script>window.open('../admin/books.php', '_self')</script>";
	}
}}}

?>