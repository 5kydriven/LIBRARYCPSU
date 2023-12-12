
<?php

include 'db.php';

session_start();

$keys=$_GET['key'];

		$a = $_POST['idnumber'];
		$aa = $_POST['fullname'];
		$aaa = $_POST['number'];
		$aaaa = $_POST['gender'];
		$aaaaa = $_POST['type'];
		$aaaaaa = $_POST['level'];
		$aaaaaaa = $_POST['course'];


		$result=mysqli_query($conn,"SELECT * from members WHERE idnumber='$a' ");
		$fetch=mysqli_fetch_array($result);
		$row=mysqli_num_rows($result);




		if ($row > 0){

			if ($fetch['memid']==$keys) {

						//validate number/intiger 0 is not intiger//

					if (!filter_var($aaa, FILTER_VALIDATE_INT) === false) {

						mysqli_query($conn, "UPDATE members set idnumber='$a',fullname='$aa',number='$aaa',gender='$aaaa',type='$aaaaa',yearlevel='$aaaaaa',course='$aaaaaaa' where memid='$keys'");

						mysqli_query($conn, "UPDATE `log` set fullname='$aa',idnumber='$a' where memid='$keys'");
						$_SESSION['edit']="";

							echo "<script>alert('Successfully save changes')</script>";
                     echo "<script>window.open('../admin/members.php', '_self')</script>";
			        }
			        else {
						echo "<script>alert('Invalid Mobile Number')</script>";
                     echo "<script>window.open('../admin/members.php', '_self')</script>";
			        }

			}
	else{

		echo "<script>alert('ID Number already exist')</script>";
                     echo "<script>window.open('../admin/members.php', '_self')</script>";
	}

}

else {	
					//validate number/intiger 0 is not intiger//

					if (!filter_var($aaa, FILTER_VALIDATE_INT) === false) {

						mysqli_query($conn, "UPDATE members set idnumber='$a',fullname='$aa',number='$aaa',gender='$aaaa',type='$aaaaa',yearlevel='$aaaaaa',course='$aaaaaaa' where memid='$keys'");

						mysqli_query($conn, "UPDATE `log` set fullname='$aa',idnumber='$a' where memid='$keys'");
						$_SESSION['edit']="";

							echo "<script>alert('Successfully save changes')</script>";
                     echo "<script>window.open('../admin/members.php', '_self')</script>";
			        }
			        else {
						echo "<script>alert('Invalid Mobile Number')</script>";
                     echo "<script>window.open('../admin/members.php', '_self')</script>";
			        }
}

?>



