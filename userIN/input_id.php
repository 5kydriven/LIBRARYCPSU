<?php


date_default_timezone_set('Asia/Manila');
	$time = date("h:i A",strtotime("-8 HOURS"));
	$date = date("M-d-Y l",strtotime("-8 HOURS"));
    $times = date("A",strtotime("-8 HOURS"));

	if($time == "08:00 PM"){
		$select_log = mysqli_query($conn, "SELECT * FROM `log` WHERE timeout = ''") or die("query failed");
		$row_log = mysqli_fetch_assoc($select_log);
		$id_number = $row_log['idnumber'];
		$insert_to_log = mysqli_query($conn, "UPDATE `log` SET `timeout` = '$time' WHERE idnumber = '$id_number' ")or die("update failed");

	} else{

	}
?>

<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Enhance Library System</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="../vendors/images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="../upload/logo.png">
	<link rel="icon" type="image/png" sizes="32x32" href="../upload/logo.png">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="../vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="../vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="../vendors/styles/style.css">
	<link rel="stylesheet" type="text/css" href="../vendors/styles/style2.css">


	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
</head>
<body class="login-page" style="background:url(../upload/a.jpg);">
	<div class="login-header box-shadow">
		<div class="container-fluid d-flex justify-content-between align-items-center">
			<div class="brand-logo">
				<a href="">
					<img src="../upload/logo.png" style="height: 3.4em;width: 3.4em">  <h3 style="margin-left: 0.5em">   Enhance Library System</h3>
				</a>
			</div>
		</div>
	</div>


	<div class="login-wrap">
		<div class="container">
			<div class="row">
				<div class="col-md-2">
				</div>
				<div class="col-md-4"  style="margin-left: 30px">
					<div class="idForm" style="background-color: #f9f9f9">
                        <label for="">Enter Your ID No.</label>
						<form id="input-form" action="../php/logInput.php" method="POST">
							<input type="text" placeholder="ex. (CPSU-LRC-0000)" name="idNum" id="id-number"><br><br>
							<button name="submit" >Submit</button>
                            <a href="index.php" class="option"> Scan QR </a>
						</form>
					</div>
                    
				</div>
				
				<div class="col-md-4">
					<p id="data" >
                        <?php if(isset($_GET['message'])){
                            echo $_GET['message'];
                        } else{

                        }?>
                    </p> 
				</div>
			</div>
		</div>
	</div>
	



	<script>
			$("#input-form").submit(function(event) {
				event.preventDefault();
				var idNum = $("#id-number").val();
				$("#data").load("../php/log.php", {
					idNum: idNum
				});
			});
	</script> 
</body>
</html>