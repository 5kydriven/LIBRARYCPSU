<?php

include 'db.php';

	if (isset($_POST['submit'])) {

		$libId = $_POST['idnumber'];
		$name = $_POST['fullname'];
		$mobileNo = $_POST['number'];
		$gender = $_POST['gender'];
		$type = $_POST['type'];
		$address = $_POST['address'];
		$guardian = $_POST['guardian'];


		if ($type == "Student") {
			$yearLvl = $_POST['level'];
			$course = $_POST['course'];
		}else{
			$yearLvl = '';
			$course = '';
		}
		


        $result = mysqli_query($conn, "SELECT * from members where idnumber = '$libId'");
        $row = mysqli_num_rows($result);

            if ($row>0) {
                
                 echo "<script>alert('ID Number already taken :)')</script>";
                 echo "<script>window.open('../admin/members.php', '_self')</script>";

            }else{

            	mysqli_query($conn, "INSERT into members (idnumber,fullname,number,gender,type,yearlevel,course,address,guardian,action) 
									values ('$libId','$name','$mobileNo','$gender','$type','$yearLvl','$course','$address','$guardian','OFFLINE')"
							);


						echo "<script>alert('Added successfully :)')</script>";
                        echo "<script>window.open('../admin/members.php', '_self')</script>";
            }

		
	}

?>