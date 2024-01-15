
				
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



	<div class="container" style="margin-top: 2em">
		<div class="">

			<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">Name: 

							<?php 

								$sql=mysqli_query($conn, "SELECT * from members where idnumber='".$keys."'");
								$row=mysqli_fetch_array($sql);

								$pkey = $row['memid'];

								echo "<b style='text-transform:uppercase;color:green'>".$row['fullname']."</b>";


								 ?>
								 	
						 </h4>
						 <h4><a href="../borrower_page.php" class="btn btn-primary">BACK</a></h4>
					
					</div>


					
					<div class="pb-20">
						<table class="table">
							<thead>

								 <?php  
        if (isset($_SESSION['message'])){  ?>

                  <span class="alert alert-warning">Returned succesfully</span><br>

    <?php }

    unset($_SESSION['message']);
    ?>

									<?php

									$query = mysqli_query($conn,"SELECT * from bookstatus LEFT JOIN books ON bookstatus.booksid = books.bookid where memid = '".$pkey."' && status = 'borrowed' ");

									$num = mysqli_num_rows($query);

									if ($num<1) { ?>

										<span class="alert alert-danger">You have no books to return, THANK YOU</span>

										<?php
										
									}else{

									?>
								<tr>
									<th>Title</th>
									<th>Author</th>
									<th>ISBN</th>
									<th>Date Borrowed (Y-M-D)</th>
									<th>Due Date  (Y-M-D)</th>
									<th>Penalty</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>

								<?php

									while ($res = mysqli_fetch_array($query)){
										$bookstatusid = $res['bookstatusid'];

									 ?>
										<tr style="text-transform: capitalize;">
											<td><?php echo $res['title'] ?></td>
											<td><?php echo $res['authors'] ?></td>
											<td><?php echo $res['isbn'] ?></td>
											<td><?php echo $res['borrowed'] ?></td>
											<td><?php echo $due = $res['duedate'] ?></td>

												<?php if($res['penalty']=="no penalty"){ ?>

													<td><?php echo $res['penalty']; ?></td>

												<?php }else {?>

											<td class="alert alert-danger"><?php echo "p " .formatMoney($res['penalty'],true); ?></td>


													<?php
												}

													$earlier = new DateTime($due);
													$later = new DateTime($date);

													$posdif = $earlier->diff($later)->format("%r%a");
													     
													     $penaltyc = $posdif*$penalty;  

													     if ($penaltyc<0) {
													     		
													      } else{
													      	mysqli_query($conn,"UPDATE bookstatus set penalty = '$penaltyc' where memid = '$pkey' and bookstatusid = '$bookstatusid' ");
													      }
													           ?>
											<td><a href="../php/memreturnbook.php?status=<?php echo $res['bookstatusid']; ?>&memid=<?php echo $keys; ?>&pkey=<?php echo $pkey ?>" class="btn btn-warning btn-xs">Return</a></td>



										</tr>

									<?php
}
								}
								?>
							
								
							</tbody>
						</table>
					</div>
				</div>

			
					


