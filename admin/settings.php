				
<?php include 'header.php'; ?>

	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="row">
				<div class="col-sm-12">
					<div class="card-box mb-30">
						<div class="pd-20">
							<h4 class="text-blue h4">Settings</h4>
						</div>
						<div class="pb-20">
							<table class="table">
								<thead>
									<tr>
										<th>Allowed Books per User</th>
										<th>Allowable Days </th>
										<th>Penalty per Day</th>
										<th>Action</th>

									</tr>
								</thead>
								<tbody>
									<?php
										$sql = mysqli_query($conn, "SELECT * from allowable");
										while ($row = mysqli_fetch_array($sql)) { ?>
											<tr>
												<td><?php echo $row['allowbooks']; ?></td>
												<td><?php echo $row['allowdays']; ?></td>
												<td><?php echo "P ".formatMoney($row['penalty'],true); ?></td>
												<td><a href="" data-toggle="modal" data-target="#edit<?php echo $row['allowid'] ?>" class="btn btn-primary"><i class="fa fa-pencil"></td>

											</tr>



									<div class="modal fade" id="edit<?php echo $row['allowid'] ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
												<div class="modal-dialog modal-sm modal-dialog-centered">
													<div class="modal-content">
														<div class="modal-header">
															<h4 class="modal-title" id="myLargeModalLabel">Edit Settings</h4>
															<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
														</div>
														<div class="modal-body">
															<form action="../php/editsettings.php?key=<?php echo $row['allowid'] ?>"  method="post">
																
																<div class="form-group row">
																	<div class="col-sm-12">
																		<label>Allowed books per user</label>
																		<input class="form-control" type="text" name="books" value="<?php echo $row['allowbooks'] ?>" >
																	</div>
																</div>
																<div class="form-group row">
																	<div class="col-sm-12">
																		<label>Allowable days</label>
																		<input class="form-control"  type="text" name="days" value="<?php echo $row['allowdays'] ?>">
																	</div>
																</div>
																<div class="form-group row">
																	<div class="col-sm-12">
																		<label>Penalty</label>
																		<input class="form-control" type="text" name="penalty" value="<?php echo $row['penalty'] ?>">
																	</div>
																</div>
															
																<input type="submit" class="btn btn-primary pull-right" name="editsave" value="Save">
															
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
				</div>
			</div>
			
				

		<?php include 'footer.php'; ?>

