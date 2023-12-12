				
<?php include 'header.php'; ?>

	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			
				<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">Books (<?php echo $key = $_GET['key'] ?>)
						<a href="category.php" class="btn btn-primary" style="float:right;">Back</a></h4>
					</div>

					<div class="pb-20">

							<table class="data-table table nowrap">
							<thead>
								<tr>
									<th>Book Image</th>
									<th>Section</th>
									<th>Title</th>
									<th>Authors</th>
									<th>Publication</th>
									<th>Publisher</th>
									<th>ISBN</th>
									<th>Copyright</th>
									<th>Copies</th>
									<th>Physical Description</th>
									<th>Notes</th>
									<th>Location</th>
								</tr>
							</thead>
							<tbody>

								<?php

									$sql = mysqli_query($conn, "SELECT * from books where category = '$key'");
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

											<td><?php echo $row['section'] ?></td>
											<!-- <td><?php //echo $row['rack']." , ".$row['colunn']." and ".$row['row'] ?></td> -->

											<td><?php echo $row['title'] ?></td>

											<td><?php echo $row['authors'].", ".$row['authors1'].", ".$row['authors2'].", ".$row['authors3'].", ".$row['authors4'] ?></td>
											<td><?php echo $row['publication'] ?></td>
											<td><?php echo $row['publisher'] ?></td>
											<td><?php echo $row['isbn'] ?></td>
											<td><?php echo $row['copyright'] ?></td>
											<td><?php echo $row['copies'] ?></td>
											<td><?php echo $row['physical'] ?></td>
											<td><?php echo $row['notes'] ?></td>
											<td><?php echo $row['category'] ?></td>
										</tr>




									<?php
								}

								?>

								
								
							</tbody>
						</table>
						
					</div>
				</div>







		<?php include 'footer.php'; ?>

