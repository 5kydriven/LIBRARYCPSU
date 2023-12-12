<?php

include 'db.php';

session_start();

	if (isset($_POST['submit'])) {

		$user=mysqli_real_escape_string($conn, $_POST['username']);
        
		$pass=$_POST['password'];

			$sql=mysqli_query($conn,"SELECT * FROM admin WHERE username='$user' AND password='$pass'");
			$row=mysqli_num_rows($sql);
			$res=mysqli_fetch_array($sql);

				if ($row > 0) {

				session_start();

					$_SESSION['adminid']=$res['adminid'];
					$adminname = $res['name'];
					
					header("location:../admin/index.php");


				}
				else{
					  echo "<script>alert('Invalid username and password')</script>";
                     echo "<script>window.open('../index.php', '_self')</script>";
				}
	}


?>	




