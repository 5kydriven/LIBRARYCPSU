<?php include 'header.php'; ?>

	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			
			<div class="title pb-20">
				<h2 class="h3 mb-0">Dashboard</h2>
			</div>
												<!-- <?php


												//	$date = date("Y-m-d",strtotime("-2 HOURS"));
												//$due = "2021-09-14";

												//	$earlier = new DateTime($due);
												//	$later = new DateTime($date);

												//	echo $posdif = $earlier->diff($later)->format("%r%a");
												//	     
												//	  if ($posdif == '1') {
												//	  	 echo "have penalty";
												//	  }elseif($posdif == '-1'){
												//	  	echo "1 day left";
												//	  }elseif($posdif == '0'){
												//	  	echo "duedate today";
												//	  }else{
												//	  }
												//	     ?>-->
													  

			<div class="row pb-10">
				<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">
						<div class="d-flex flex-wrap">
							<div class="widget-data">
								<div class="weight-700 font-24 text-dark"><?php $sql = mysqli_query($conn, "select * from members"); echo $row = mysqli_num_rows($sql); ?></div>
								<div class="font-14 text-secondary weight-500">Members</div>
							</div>
							<div class="widget-icon">
								<div class="icon" data-color="#00eccf"><i class="icon-copy dw dw-user"></i></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">
						<div class="d-flex flex-wrap">
							<div class="widget-data">
								<div class="weight-700 font-24 text-dark"><?php $sqll = mysqli_query($conn, "select * from books"); echo mysqli_num_rows($sqll); ?></div>
								<div class="font-14 text-secondary weight-500">Total Books</div>
							</div>
							<div class="widget-icon">
								<div class="icon" data-color="#ff5b5b"><span class="icon-copy ti-book"></span></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">
						<div class="d-flex flex-wrap">
							<div class="widget-data">
								<div class="weight-700 font-24 text-dark"><?php $sqlll = mysqli_query($conn, "SELECT * from bookstatus where status = 'borrowed'"); echo $row = mysqli_num_rows($sqlll); ?></div>
								<div class="font-14 text-secondary weight-500">Borrowed Books</div>
							</div>
							<div class="widget-icon">
								<div class="icon"><i class="icon-copy fa fa-book" aria-hidden="true"></i></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">
						<div class="d-flex flex-wrap">
							<div class="widget-data">
								<div class="weight-700 font-24 text-dark"><?php $sqllll = mysqli_query($conn, "SELECT * from bookstatus where status = 'returned'"); echo mysqli_num_rows($sqllll); ?></div>
								<div class="font-14 text-secondary weight-500">Returned Books</div>
							</div>
							<div class="widget-icon">
								<div class="icon" data-color="#09cc06"><i class="icon-copy fa fa-book" aria-hidden="true"></i></div>
							</div>
						</div>
					</div>
				</div><div class="col-lg-12">
						<div class="card-box mb-30">
							<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
								<ol class="carousel-indicators">
									<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
									<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
									<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
								</ol>
								<div class="carousel-inner">
									<div class="carousel-item active">
										<img class="d-block w-100" src="../vendors/images/img3.jpg" alt="First slide">
									</div>
									<div class="carousel-item">
										<img class="d-block w-100" src="../vendors/images/img4.jpg" alt="Second slide">
									</div>
									<div class="carousel-item">
										<img class="d-block w-100" src="../vendors/images/img5.jpg" alt="Third slide">
									</div>
								</div>
								<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
									<span class="carousel-control-prev-icon" aria-hidden="true"></span>
									<span class="sr-only">Previous</span>
								</a>
								<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
									<span class="carousel-control-next-icon" aria-hidden="true"></span>
									<span class="sr-only">Next</span>
								</a>
							</div>
							<div class="collapse collapse-box" id="carousel3">
								<div class="code-box">
									<div class="clearfix">
										<a href="javascript:;" class="btn btn-primary btn-sm code-copy pull-left"  data-clipboard-target="#copy-carousel3"><i class="fa fa-clipboard"></i> Copy Code</a>
										<a href="#carousel3" class="btn btn-primary btn-sm pull-right" rel="content-y"  data-toggle="collapse" role="button"><i class="fa fa-eye-slash"></i> Hide Code</a>
									</div>
								</div>
							</div>
						</div>
					</div>
			</div>

		<?php include 'footer.php'; ?>