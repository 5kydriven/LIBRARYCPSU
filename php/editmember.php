
<?php

include 'db.php';

session_start();

$keys=$_GET['key'];

		$libId = $_POST['idnumber'];
		$name = $_POST['fullname'];
		$mobileNo = $_POST['number'];
		$gender = $_POST['gender'];
		$type = $_POST['type'];
		$year = $_POST['level'];
		$course = $_POST['course'];
		$address = $_POST['address'];
		$guardian = $_POST['guardian'];

		$result=mysqli_query($conn,"SELECT * from members WHERE idnumber='$libId' ");
		$fetch=mysqli_fetch_array($result);
		$row=mysqli_num_rows($result);




		if ($row > 0){

			if ($fetch['memid']==$keys) {

						//validate number/intiger 0 is not intiger//

					if (!filter_var($mobileNo, FILTER_VALIDATE_INT) === false) {

						mysqli_query($conn, "UPDATE members set idnumber='$libId',fullname='$name',number='$mobileNo',gender='$gender',type='$type',yearlevel='$year',course='$course',address='$address',guardian='$guardian' where memid='$keys'");

						mysqli_query($conn, "UPDATE `log` set fullname='$name',idnumber='$libId' where memid='$keys'");
						$_SESSION['edit']="";

						echo "<script>alert('Successfully save changes')</script>";
                     	echo "<script>window.open('../admin/members.php', '_self')</script>";
			        }
			        else {
						echo "<script>alert('Invalid Mobile Number')</script>";
                     	echo "<script>window.open('../admin/members.php', '_self')</script>";
			        }

			} else {
				echo "<script>alert('ID Number already exist')</script>";
                echo "<script>window.open('../admin/members.php', '_self')</script>";
			}

		} else {	
					//validate number/intiger 0 is not intiger//

					if (!filter_var($mobileNo, FILTER_VALIDATE_INT) === false) {

						mysqli_query($conn, "UPDATE members set idnumber='$libId',fullname='$name',number='$mobileNo',gender='$gender',type='$type',yearlevel='$year',course='$course',address='$address',guardian='$guardian' where memid='$keys'");

						mysqli_query($conn, "UPDATE `log` set fullname='$name',idnumber='$libId' where memid='$keys'");
						$_SESSION['edit']="";

						echo "<script>alert('Successfully save changes')</script>";
                     	echo "<script>window.open('../admin/members.php', '_self')</script>";
			        } else {
						echo "<script>alert('Invalid Mobile Number')</script>";
                     	echo "<script>window.open('../admin/members.php', '_self')</script>";
			        }
		}

?>



