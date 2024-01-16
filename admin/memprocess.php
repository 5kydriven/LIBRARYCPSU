
				
<?php 
session_start();
include '../php/db.php';

	include 'memhead.php';

	$sqlpenalty= mysqli_query($conn, "SELECT * from allowable");
	$rowp = mysqli_fetch_array($sqlpenalty);
	$penalty = $rowp['penalty'];
	date_default_timezone_set('Asia/Manila');
	$date = date("Y-m-d",strtotime("-8 HOURS"));
	$keys = $_GET['key'];

 ?>
	<!-- <style>
		body {
			overflow: hidden;
		}
	</style> -->


	<div class="container" style="margin-top: 1em;">
		<div class="">

			<div class="card-box ">
					<div class="pd-20">
						<h4 class="text-blue h4">Borrowers Name: 

							<?php 

								$sql=mysqli_query($conn, "SELECT * from members where idnumber='".$keys."'");
								$row=mysqli_fetch_array($sql);

								$pkey = $row['memid'];

								echo "<b style='text-transform:uppercase;color:green'>".$row['fullname']."</b>";


								 ?>
								 	
						 </h4>
						 <h4 class="text-blue h4">Allowable Books to borrow: <?php 

								$sqll=mysqli_query($conn, "SELECT * from allowable");
								$roww=mysqli_fetch_array($sqll);


								echo "<b style='text-transform:uppercase;color:green'>".$roww['allowbooks']."</b>";


								 ?></h4>
								 <h4><a href="../borrower_page.php" class="btn btn-primary">BACK</a></h4>
					</div>




			
					<div class="card-box "><br>
					<div class="pb-20">
						<table class="table nowrap" id="borrow">


							 <?php  
        if (isset($_SESSION['message'])){  ?>

                  <span class="alert alert-warning">Borrowed succesfully</span>

    <?php }

    unset($_SESSION['message']);

    if (isset($_SESSION['nocopy'])){  ?>

                  <span class="alert alert-warning">Books has no copy</span>

    <?php }

    unset($_SESSION['nocopy']);

    if (isset($_SESSION['allowable'])){  ?>

                  <span class="alert alert-warning">You've reach borrowed limit</span>

    <?php }

    unset($_SESSION['allowable']);
    
    ?>
	
							<thead>
								<tr>
									<th>Book Image</th>
									<th>Title</th>
									<th>Authors</th>
									<th>ISBN</th>
									<th>Copies</th>
									<th>Category</th>
									<th class="datatable-nosort">Action</th>
								</tr>
							</thead>
							<tbody>

								<?php

									$sql = mysqli_query($conn, "SELECT * from books");
									while ($row = mysqli_fetch_array($sql)) { ?>

										<tr style="overflow: scroll;width: 520px;text-transform: capitalize;">
 
											<td><?php 

											if ($row['bookimage']=="") {
												echo "<span class='micon dw dw-book' style='font-size:2em;color:limegreen'></span>";
											}else{

											echo '<img class="img" src="'."../upload/".$row['bookimage'].'">' ;
											}
											?>
												
											</td>

											<td><?php echo $row['title'] ?></td>
											<td><?php echo $row['authors'] ?></td>
											<td><?php echo $row['isbn'] ?></td>
											<td><?php echo $row['copies'] ?></td>
											<td><?php echo $row['category'] ?></td>

											<?php

														if ($row['section']=='Reserved') { ?>

															<td><button class="btn btn-primary" disabled>Borrow</button></td>

															<?php
														}else{ ?>



															<td><a href="../php/memborrow.php?bookid=<?php echo $row['bookid']; ?>&memid=<?php echo $keys; ?>&pkey=<?php echo $pkey; ?>" class="btn btn-primary btn-xs">Borrow</a></td>
															<?php


														}

											?>
											
										</tr>

									<?php
								}

								?>

								
								
							</tbody>
						</table>
					</div>
				</div>

	<!-- CSS -->
	<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">							

	<!-- js -->
	<script src="../vendors/scripts/core.js"></script>
	<script src="../vendors/scripts/script.min.js"></script>
	<script src="../vendors/scripts/process.js"></script>
	<script src="../vendors/scripts/layout-settings.js"></script>

	<!-- add sweet alert js & css in footer -->
	<script src="../src/plugins/sweetalert2/sweetalert2.all.js"></script>
	<script src="../src/plugins/sweetalert2/sweet-alert.init.js"></script>
	
	<script src="../js/html5-qrcode.js"></script>
	<script src="../js/html5-qrcode-scanner.js"></script>
	<script src="../src/plugins/datatables/js/jquery.dataTables.min.js"></script>
	<script src="../src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
	<script src="../src/plugins/datatables/js/dataTables.responsive.min.js"></script>
	<script src="../src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
	<!-- buttons for Export datatable -->
	<script src="../src/plugins/datatables/js/dataTables.buttons.min.js"></script>
	<script src="../src/plugins/datatables/js/buttons.bootstrap4.min.js"></script>
	<script src="../src/plugins/datatables/js/buttons.print.min.js"></script>
	<script src="../src/plugins/datatables/js/buttons.html5.min.js"></script>
	<script src="../src/plugins/datatables/js/buttons.flash.min.js"></script>
	<script src="../src/plugins/datatables/js/pdfmake.min.js"></script>
	<script src="../src/plugins/datatables/js/vfs_fonts.js"></script>
	<!-- Datatable Setting js -->
	<script src="../vendors/scripts/datatable-setting.js"></script></body>
	<script>
			$(document).ready( function () {
				$('#borrow').DataTable({
					ordering: true,
					responsive: true,
					scrollY: 270,
					paging: false,
				});
			} );
		</script>
