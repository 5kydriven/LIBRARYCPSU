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
	<link rel="stylesheet" type="text/css" href="../src/plugins/datatables/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="../src/plugins/datatables/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="../vendors/styles/style.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
	<link href="../vendors/styles/bootsrap.css" rel="stylesheet">		
	<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
	<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
	<script src="../js/bootsrap.js"></script>	
	
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
	

	<div class="header">
		<div class="header-left">
			
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