<?php


date_default_timezone_set('Asia/Manila');
	 $time = date("h:i A",strtotime("-8 HOURS"));
   $date = date("M-d-Y l",strtotime("-8 HOURS"));
    $times = date("A",strtotime("-8 HOURS"));
?>

<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Enhance Library System</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="vendors/images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="upload/logo.png">
	<link rel="icon" type="image/png" sizes="32x32" href="upload/logo.png">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/style.css">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	
</head>
<body class="login-page" style="background:url(upload/a.jpg);">
	<div class="login-header box-shadow">
		<div class="container-fluid d-flex justify-content-between align-items-center">
			<div class="brand-logo">
				<a href="">
					<img src="upload/logo.png" style="height: 1.4em;width: 1.4em">  <h3 style="margin-left: 0.5em">   Enhance Library System</h3>
				</a>
			</div>
			<div class="login-menu">
				<ul>
					<li><a href="" data-toggle="modal" data-target="#admin"><div class="icon"><img src="vendors/images/person.svg" class="svg" alt=""></div></i></a></li>
				</ul>
			</div>
		</div>
	</div>


	<div class="login-wrap">
		<div class="container">
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-4" style="background-color: #f9f9f9">

					<div id="qr-reader" style="width:calc(100%);"></div>

                    <div id="qr-reader-results"></div>


				</div>


				<div class="col-md-4">

					 <p id="data" style="display: none"></p> 


				</div>
			</div>

		</div>
	</div>




	<div class="modal fade" id="admin" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered">
									<div class="modal-content">
										<div class="modal-header">
											<h4 class="modal-title" id="myLargeModalLabel">Librarian</h4>
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
										</div>
										<div class="modal-body">
											<form method="POST" action="php/login.php">
							
												<div class="input-group custom">
													<input type="text" class="form-control form-control-lg" placeholder="Username" name="username">
													<div class="input-group-append custom">
														<span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
													</div>
												</div>
												<div class="input-group custom">
													<input type="password" class="form-control form-control-lg" placeholder="**********" name="password">
													<div class="input-group-append custom">
														<span class="input-group-text"><i class="dw dw-padlock1"></i></span>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-12">
														<div class="input-group mb-0">
															
																
																<input class="btn btn-primary btn-lg btn-block" type="submit" value="Sign In" name="submit">
															
														</div>
														
													</div>
												</div>
											</form>

										</div>
									</div>
								</div>
							</div>


<script>
    function docReady(fn) {
        // see if DOM is already available
        if (document.readyState === "complete"
            || document.readyState === "interactive") {
            // call on next available tick
            setTimeout(fn, 1);
        } 
        else {
            document.addEventListener("DOMContentLoaded", fn);
        }
    }
    docReady(function () {
        var resultContainer = document.getElementById('qr-reader-results');
        var lastResult, countResults = 0;
        function onScanSuccess(qrCodeMessage) {
               if (qrCodeMessage !== lastResult) {
                 ++countResults;
                 lastResult = qrCodeMessage;
                // resultContainer.innerHTML
                    // += `<div>[${countResults}] - ${qrCodeMessage}</div>`;
                $.ajax({
                    url:'php/in.php?id=id',
                    method:'POST',
                    data:{
                        idscan:qrCodeMessage
                    },
                    error:err=>{
                        console.log(err)
                        alert_toast('An Error Occured.');
                    },

                    success:function(data){

                        $('#data').html(data);

                          document.getElementById('data').style.display = 'block';

                         //    $(document).ready(function() {

                         //        $("#data").fadeOut(30000);

                         //        $("#id").unbind('click').on("click", function () {
                         //            $("#data").fadeTo(1000, 0).slideUp(5000, function(){
                         //            //$(this).remove();
                         //            });   
                         //        }, 5000);
                         // });
                    }
                })
            }
        }
        var html5QrcodeScanner = new Html5QrcodeScanner(
            "qr-reader", { fps: 10, qrbox: 160 });
        html5QrcodeScanner.render(onScanSuccess);
    });

</script> 



	<!-- js -->
	<script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>
	<script src="js/html5-qrcode.js"></script>
	<script src="js/html5-qrcode-scanner.js"></script>
</body>
</html>