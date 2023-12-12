<?php

include 'db.php';

	if (isset($_POST['submit'])) {

		$a = $_POST['idnumber'];
		$aa = $_POST['fullname'];
		$aaa = $_POST['number'];
		$aaaa = $_POST['gender'];
		$aaaaa = $_POST['type'];


		if ($aaaaa == "Faculty") {

			$aaaaaa = '';
		$aaaaaaa = '';
			
		}else{

			$aaaaaa = $_POST['level'];
		$aaaaaaa = $_POST['course'];
		}
		


        $result = mysqli_query($conn, "SELECT * from members where idnumber = '$a'");
        $row = mysqli_num_rows($result);

            if ($row>0) {
                
                 echo "<script>alert('ID Number already taken :)')</script>";
                 echo "<script>window.open('../admin/members.php', '_self')</script>";

            }else{

            	mysqli_query($conn, "INSERT into members (idnumber,fullname,number,gender,type,yearlevel,course,action) values ('$a','$aa','$aaa','$aaaa','$aaaaa','$aaaaaa','$aaaaaaa','OFFLINE')");


						echo "<script>alert('Added successfully :)')</script>";
                        echo "<script>window.open('../admin/members.php', '_self')</script>";
            }

		
	}

?>