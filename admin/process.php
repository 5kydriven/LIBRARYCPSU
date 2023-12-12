
				
<?php 

	include 'header.php';

	$sqlpenalty= mysqli_query($conn, "SELECT * from allowable");
	$rowp = mysqli_fetch_array($sqlpenalty);
	$penalty = $rowp['penalty'];
	date_default_timezone_set('Asia/Manila');
	$date = date("Y-m-d",strtotime("-8 HOURS"));
	$keys = $_GET['key'];

 ?>

	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">

			<div class="card-box mb-30">
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
					</div>
					<div class="pb-20">
						<table class="table">
							<thead>
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

									$query = mysqli_query($conn,"SELECT * from bookstatus LEFT JOIN books ON bookstatus.booksid = books.bookid where memid = '".$pkey."' && status = 'borrowed' ");
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
											<td><a href="../php/returnbook.php?status=<?php echo $res['bookstatusid']; ?>&memid=<?php echo $keys; ?>&pkey=<?php echo $pkey ?>" class="btn btn-warning btn-xs">Return</a></td>



										</tr>

									<?php

								}
								?>
							
								
							</tbody>
						</table>
					</div>
				</div>

			
					<div class="card-box mb-30"><br>
					<div class="pb-20">
						<table class="data-table table nowrap">
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
											<td><a href="../php/borrowbook.php?bookid=<?php echo $row['bookid']; ?>&memid=<?php echo $keys; ?>&pkey=<?php echo $pkey; ?>" class="btn btn-primary btn-xs">Borrow</a></td>
										</tr>

									<?php
								}

								?>

								
								
							</tbody>
						</table>
					</div>
				</div>


		<?php include 'footer.php'; ?>

