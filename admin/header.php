<?php

include '../php/session.php';


function formatMoney($number, $fractional=false) {
        if ($fractional) {
            $number = sprintf('%.2f', $number);
        }
        while (true) {
            $replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
            if ($replaced != $number) {
                $number = $replaced;
            } else {
                break;
            }
        }
        return $number;
        }

        
?>
<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Library System</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="../vendors/images/apple-touch-icon.png">

	<link rel="icon" type="image/png" sizes="32x32" href="../upload/logo.png">
	<link rel="icon" type="image/png" sizes="32x32" href="../upload/logo.png">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="../vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="../vendors/styles/icon-font.min.css">
	<!-- <link rel="stylesheet" type="text/css" href="../src/plugins/datatables/css/dataTables.bootstrap4.min.css"> -->
	<!-- <link rel="stylesheet" type="text/css" href="../src/plugins/datatables/css/responsive.bootstrap4.min.css"> -->
	<link rel="stylesheet" type="text/css" href="../vendors/styles/style.css">

	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://cdn.datatables.net/v/bs5/jq-3.7.0/jszip-3.10.1/dt-1.13.8/af-2.6.0/b-2.4.2/b-colvis-2.4.2/b-html5-2.4.2/b-print-2.4.2/cr-1.7.0/date-1.5.1/fc-4.3.0/fh-3.4.0/kt-2.11.0/r-2.5.0/rg-1.4.1/rr-1.4.1/sc-2.3.0/sb-1.6.0/sp-2.2.0/sl-1.7.0/sr-1.3.0/datatables.min.css" rel="stylesheet">

	
</head>
<body class="sidebar-light">
	<style type="text/css">
    html{
        scroll-behavior: smooth;
    }
    /* width */
    ::-webkit-scrollbar {
    width: 10px;

    }
    /* Track */
    ::-webkit-scrollbar-track {
    border-radius: 10px;
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
    background: royalblue; 
    border-radius: 0px;
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
    background: royalblue; 
    }


 .img{

    height: 50px;
    width: 50px;
    border-radius: 50%;
  }

	</style>
	<!-- <div class="pre-loader">
		<div class="pre-loader-box">
			<div class="loader-logo"><h3>Loading</h3></div>
			<div class='loader-progress' id="progress_div">
				<div class='bar' id='bar1'></div>
			</div>
			<div class='percent' id='percent1'>0%</div>
			<div class="loading-text">
				Loading...
			</div>
		</div>
	</div> -->

	<div class="header">
		<div class="header-left">
			<!-- <div class="menu-icon dw dw-menu"></div>
			<div class="search-toggle-icon dw dw-search2" data-toggle="header_search"></div>
			<div class="header-search">
				<form>
					<div class="form-group mb-0">
						<i class="dw dw-search2 search-icon"></i>
						<input type="text" class="form-control search-input" placeholder="Search Here">
						<div class="dropdown">
							<a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
								<i class="ion-arrow-down-c"></i>
							</a>
							<div class="dropdown-menu dropdown-menu-right">
								<div class="form-group row">
									<label class="col-sm-12 col-md-2 col-form-label">From</label>
									<div class="col-sm-12 col-md-10">
										<input class="form-control form-control-sm form-control-line" type="text">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-12 col-md-2 col-form-label">To</label>
									<div class="col-sm-12 col-md-10">
										<input class="form-control form-control-sm form-control-line" type="text">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-12 col-md-2 col-form-label">Subject</label>
									<div class="col-sm-12 col-md-10">
										<input class="form-control form-control-sm form-control-line" type="text">
									</div>
								</div>
								<div class="text-right">
									<button class="btn btn-primary">Search</button>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div> -->
		</div>
		<div class="header-right">
			<div class="user-info-dropdown">
				<div class="dropdown">
					<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
						<span class="user-icon">
							<img src="../upload/logo.png" alt="">
						</span>
						<span class="user-name"><?php echo $name; ?></span>
					</a>
					<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list"><!-- 
						<a class="dropdown-item" href="" data-toggle="modal" data-target="#update"><i class="dw dw-user1"></i> Update Profile</a> -->
						<a class="dropdown-item" href="../php/sessiondestroy.php"><i class="dw dw-logout"></i> Log Out</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	
	<div class="left-side-bar">
		<div class="brand-logo">
			<a href="">
				<h3>Library System</h3>
			</a>
			<div class="close-sidebar" data-toggle="left-sidebar-close">
				<i class="ion-close-round"></i>
			</div>
		</div>
		<div class="menu-block customscroll">
			<div class="sidebar-menu">
				<ul id="accordion-menu">
					
					<li>
						<a href="index.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-home"></span><span class="mtext">Dashboard</span>
						</a>
					</li>
					<li>
						<a href="members.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-user"></span><span class="mtext">Members</span>
						</a>
					</li>
					<li>
						<a href="books.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-books"></span><span class="mtext">Books</span>
						</a>
					</li>
					<li>
						<a href="category.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-books"></span><span class="mtext">Books Location</span>
						</a>
					</li>
					<li>
						<a href="userlog.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-list"></span><span class="mtext">User's Log Sheet</span>
						</a>
					</li>
					<li>
						<div class="dropdown-divider"></div>
					</li>
					<li>
						<div class="sidebar-small-cap">Transaction</div>
					</li>
					<!-- <li>
						<a href="borrow.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-book"></span><span class="mtext">Borrow / Return</span>
						</a>
					</li> -->
					<li>
						<a href="borrowedbooks.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-books"></span><span class="mtext">Borrowed Books</span>
						</a>
					</li>
					<li>
						<a href="returnedbooks.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-books"></span><span class="mtext">Returned Books</span>
						</a>
					</li>
					<li>
						<a href="settings.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-settings"></span><span class="mtext">Settings</span>
						</a>
					</li>
				<!-- 	<li>
						<a href="reports.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-print"></span><span class="mtext">Reports</span>
						</a>
					</li> -->
				</ul>
			</div>
		</div>
	</div>


							<div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="mysmallModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-sm modal-dialog-centered">
									<div class="modal-content">
										<div class="modal-header">
											<h4 class="modal-title" id="myLargeModalLabel">Update Profile</h4>
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
										</div>

										<h3>Under Construction</h3>
										<!-- <div class="modal-body">
											<form method="POST" action="../php/addcategory.php">
												<div class="form-group row">
													<div class="col-sm-12">
														<input class="form-control" type="text" placeholder="Category" name="category">
													</div>
												</div>
												
												<input type="submit" class="btn btn-primary pull-right" name="submit" value="Save">
											
											</form>
										</div> -->
									</div>
								</div>
							</div>