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

		if ($row > 1) {
			
						echo "<script>alert('ISBN No alreary exist :)')</script>";
                        echo "<script>window.open('../admin/books.php', '_self')</script>";
	
		}else{
		mysqli_query($conn, "UPDATE books set title = '$title', subtitle='$subtitle',callnum = '$callNum', authors ='$author', state1 = '$state1', state2 = '$state2', state3 = '$state3', edition = '$edition', copies = '$copies', publisher = '$publisher', publisherdate = '$publisherDate', publication = '$publication', physical = '$physical', series = '$series', sub1 = '$sub1', sub2 = '$sub2', sub3 = '$sub3', notes ='$notes', isbn = '$isbn', bookdealer = '$bookDealer', price = '$price', copyright = '$copyright', accnum = '$accountNum', dateres = '$dateRecieve', srcfund = '$srcfund', category = '$category', section = '$section', bookimage = '$bookimage'  where bookid = '$bookid'");


						echo "<script>alert('Updated successfully :)')</script>";
                        echo "<script>window.open('../admin/books.php', '_self')</script>";
	}
}}

?>



?>