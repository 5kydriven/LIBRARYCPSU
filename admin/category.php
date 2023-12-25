				
<?php include 'header.php'; ?>

	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			
				<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">Books Location</h4>
						<a class="pull-right btn btn-primary btn-sm" href="	" data-toggle="modal" data-target="#addcategory" type="button" style="margin-top: -2em">Add Location</a>

					</div>

					<div class="pb-20">
						<table class="display table nowrap">
							<thead>
								<tr>
									
									<th>Location</th>
									<th class="datatable-nosort">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php

								$sql = mysqli_query($conn, "SELECT * from category");
								while ($row = mysqli_fetch_array($sql)) { ?>
									<tr style="text-transform: capitalize;">
										
										<td><?php echo $row['category']; ?></td>
										<td>

											<a href="viewbooks.php?key=<?php echo $row['category']; ?>"  class="btn btn-sm btn-info"><i class="fa fa-book"></i></a>  


											<a href="../php/deletecategory.php?key=<?php echo $row['cateid']; ?>"  class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>  
											
											<a href="" data-toggle="modal" data-target="#edit<?php echo $row['cateid'] ?>" class="btn btn-sm btn-primary"><i class="fa fa-pencil">
										</i></a></td>
									</tr>


									<div class="modal fade" id="edit<?php echo $row['cateid'] ?>" tabindex="-1" role="dialog" aria-labelledby="mysmallModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-sm modal-dialog-centered">
									<div class="modal-content">
										<div class="modal-header">
											<h4 class="modal-title" id="myLargeModalLabel">Edit Location</h4>
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
										</div>
										<div class="modal-body">
											<form method="POST" action="../php/editcategory.php?key=<?php echo $row['cateid'] ?>">
												<div class="form-group row">
													<div class="col-sm-12">
														<input class="form-control" type="text" placeholder="Category" value="<?php echo $row['category'] ?>" name="category">
													</div>
												</div>
												
												<input type="submit" class="btn btn-primary pull-right" name="submit" value="Save Changes">
											
											</form>
										</div>
									</div>
								</div>
							</div>
									
								<?php
								}

								?>
								
							</tbody>
						</table>
					</div>
				</div>



							<div class="modal fade" id="addcategory" tabindex="-1" role="dialog" aria-labelledby="mysmallModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-sm modal-dialog-centered">
									<div class="modal-content">
										<div class="modal-header">
											<h4 class="modal-title" id="myLargeModalLabel">Add Location</h4>
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
										</div>
										<div class="modal-body">
											<form method="POST" action="../php/addcategory.php">
												<div class="form-group row">
													<div class="col-sm-12">
														<input class="form-control" type="text" placeholder="Location" name="category">
													</div>
												</div>
												
												<input type="submit" class="btn btn-primary pull-right" name="submit" value="Save">
											
											</form>
										</div>
									</div>
								</div>
							</div>




		<?php include 'footer.php'; ?>

