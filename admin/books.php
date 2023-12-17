				
<?php include 'header.php'; ?>

	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			
				<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">Books</h4>
						<a class="pull-right btn btn-primary btn-sm" href="	" data-toggle="modal" data-target="#addbook" type="button" style="margin-top: -2em">Add Book</a>
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
											<td><a href="" class="btn btn-primary" data-toggle="modal" data-target="#edit<?php echo $row['bookid'] ?>"><i class="fa fa-edit"></i></a>
											<a href="../php/deletebook.php?bookid=<?php echo $row['bookid'] ?>" class="btn btn-danger" ><i class="fa fa-trash"></i></a></td>
										</tr>



							<div class="modal fade" id="edit<?php echo $row['bookid'] ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered">
									<div class="modal-content">
										<div class="modal-header">
											<h4 class="modal-title" id="myLargeModalLabel">Update Book</h4>
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
										</div>
										<div class="modal-body">
											<form method="POST" action="../php/editbooks.php?bookid=<?php echo $row['bookid'] ?>" enctype="multipart/form-data">
												<div class="form-group row">
													<label class="col-sm-12 col-md-2 col-form-label">Title<i style="color:red;font-size:1.5em;">*</i></label>
													<div class="col-sm-12 col-md-10">
														<input class="form-control" type="text" placeholder="Title" value="<?php echo $row['title'] ?>" name="title" required="" maxlength="50" >
													</div>
												</div>

												<div class="form-group row">
													<label class="col-sm-12 col-md-2 col-form-label">Authors<i style="color:red;font-size:1.5em;">*</i></label>
													<div class="col-sm-12 col-md-10">
														<input class="form-control" placeholder="Authors" type="text" name="authors"  value="<?php echo $row['authors'] ?>">
													</div><br><br>

													<label class="col-sm-12 col-md-2 col-form-label"><i style="color:red;font-size:1.5em;"></i></label>
													<div class="col-sm-12 col-md-10">
														<input class="form-control" placeholder="Author 2" type="text" name="authors1"  value="<?php echo $row['authors1'] ?>">
													</div><br><br>

													<label class="col-sm-12 col-md-2 col-form-label"><i style="color:red;font-size:1.5em;"></i></label>
													<div class="col-sm-12 col-md-10">
														<input class="form-control" placeholder="Author 3" type="text" name="authors2"  value="<?php echo $row['authors2'] ?>">
													</div><br><br>

													<label class="col-sm-12 col-md-2 col-form-label"><i style="color:red;font-size:1.5em;"></i></label>
													<div class="col-sm-12 col-md-10">
														<input class="form-control" placeholder="Author 4" type="text" name="authors3"  value="<?php echo $row['authors3'] ?>">
													</div><br><br>

													<label class="col-sm-12 col-md-2 col-form-label"><i style="color:red;font-size:1.5em;"></i></label>
													<div class="col-sm-12 col-md-10">
														<input class="form-control" placeholder="Author 5" type="text" name="authors4"  value="<?php echo $row['authors4'] ?>">
													</div><br>

												</div>

												<div class="form-group row">
													<label class="col-sm-12 col-md-2 col-form-label">Edition</label>
													<div class="col-sm-12 col-md-10">
														<input class="form-control" placeholder="Edition" type="text" name="edition" value="<?php echo $row['edition'] ?>">
													</div>
												</div>


												<div class="form-group row">
													<label class="col-sm-12 col-md-2 col-form-label">Place of publication</label>
													<div class="col-sm-12 col-md-10">
														<input class="form-control" placeholder="Place of publication" type="text" name="publication" value="<?php echo $row['publication'] ?>">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-12 col-md-2 col-form-label">Publisher</label>
													<div class="col-sm-12 col-md-10">
														<input class="form-control" type="text" placeholder="Publisher" name="publisher" value="<?php echo $row['publisher'] ?>">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-12 col-md-2 col-form-label">ISBN<i style="color:red;font-size:1.5em;">*</i></label>
													<div class="col-sm-12 col-md-10">
														<input class="form-control" type="text" placeholder="ISBN" name="isbn" required="" value="<?php echo $row['isbn'] ?>" maxlength="15" pattern="[0-9 .]+">
													</div> 
												</div>
												
												<div class="form-group row">
													<label class="col-sm-12 col-md-2 col-form-label">Copyright</label>
													<div class="col-sm-12 col-md-10">
														<input class="form-control" placeholder="Copyright" type="text" name="copyright" value="<?php echo $row['copyright'] ?>">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-12 col-md-2 col-form-label">Copies<i style="color:red;font-size:1.5em;">*</i></label>
													<div class="col-sm-12 col-md-10">
														<input class="form-control" placeholder="Copies" type="number" name="copies" required="" value="<?php echo $row['copies'] ?>">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-12 col-md-2 col-form-label">Location<i style="color:red;font-size:1.5em;">*</i></label>
													<div class="col-sm-12 col-md-10">
														<select class="custom-select col-12" name="category" required="">
															<option value="<?php echo $row['category'] ?>"><?php echo $row['category'] ?></option>
															<?php

															$cat = mysqli_query($conn, "SELECT * from category");
															while ($catrow = mysqli_fetch_array($cat)) {
															?>
															
															<option><?php echo $catrow['category']; ?></option>
														<?php } ?>
														</select>
													</div>
												</div>

													<!-- <div class="form-group row">
													<label class="col-sm-12 col-md-2 col-form-label">Used for<i style="color:red;font-size:1.5em;">*</i></label>
													<div class="col-sm-12 col-md-10">
														<select class="custom-select col-12" name="used" required="">
															<option value="<?php //echo $row['used'] ?>"><?php echo $row['used'] ?></option>
															
															<option value="other">Other</option>
															<option value="library">Libray only</option>
														</select>
													</div>
												</div>
 -->
												<div class="form-group row">
													<label class="col-sm-12 col-md-2 col-form-label">Section<i style="color:red;font-size:1.5em;">*</i></label>
													<div class="col-sm-12 col-md-10">
														<select class="custom-select col-12" name="section" required="">
															<option value="<?php echo $row['section'] ?>"><?php echo $row['section'] ?></option>
															
															<option value="Filipinana">Filipinana</option>
															<option value="Reserved">Reserved</option>

															<option value="Reference">Reference</option>
															<option value="Circultion">Circultion</option>

															<option value="Fiction">Fiction</option>
															<option value="Other">Other</option>
														</select>
													</div>
												</div>

												<div class="form-group row">
													<label class="col-sm-12 col-md-2 col-form-label">Physical description</label>
													<div class="col-sm-12 col-md-10">
														<input class="form-control" type="text" name="physical" value="<?php echo $row['physical'] ?>">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-12 col-md-2 col-form-label">Notes</label>
													<div class="col-sm-12 col-md-10">
														<input class="form-control" type="text" name="notes" value="<?php echo $row['notes'] ?>">
													</div>
												</div>

												<!-- <div class="form-group row">
													<label class="col-sm-12 col-md-2 col-form-label">Rack #, Column & Row<i style="color:red;font-size:1.5em;">*</i></label>
													<div class="col-md-4">
														<input class="form-control" type="number" name="rack" placeholder="Rack #" required="" value="<?php// echo $row['rack'] ?>">
													</div>
													<div class="col-md-3">
														<input class="form-control" type="number" name="column" placeholder="Column" required="" value="<?php //echo $row['colunn'] ?>">
													</div>
													<div class="col-md-3">
														<input class="form-control" type="number" name="row" placeholder="Row" required="" value="<?php// echo $row['row'] ?>">
													</div>
												</div>
 -->

												<div class="form-group row">
													<label class="col-sm-12 col-md-2 col-form-label">Book Image</label>
													<div class="col-sm-12 col-md-10">
														<input class="form-control" placeholder="image" type="file" name="image" value="<?php echo $row['bookimage'] ?>">
													</div>
												</div>


												<input type="submit" class="btn btn-primary pull-right" name="submit" value="Save">
											
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



					<div class="modal fade" id="addbook" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered">
									<div class="modal-content">
										<div class="modal-header">
											<h4 class="modal-title" id="myLargeModalLabel">Add Book</h4>
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
										</div>
										<div class="modal-body">
											<form method="POST" action="../php/addbooks.php" enctype="multipart/form-data">
												<div class="form-group row">
													<label class="col-sm-12 col-md-2 col-form-label">Title<i style="color:red;font-size:1.5em;">*</i></label>
													<div class="col-sm-12 col-md-10">
														<input class="form-control" type="text" placeholder="Title" name="title" required="" maxlength="50">
													</div>
												</div>


												<div class="form-group row">
													<label class="col-sm-12 col-md-2 col-form-label">Authors<i style="color:red;font-size:1.5em;">*</i></label>
													<div class="col-sm-12 col-md-10">
														<input class="form-control" placeholder="Author 1" type="text" name="authors" >
													</div><br><br>

													<label class="col-sm-12 col-md-2 col-form-label"><i style="color:red;font-size:1.5em;"></i></label>
													<div class="col-sm-12 col-md-10">
														<input class="form-control" placeholder="Author 2" type="text" name="authors1" >
													</div><br><br>

													<label class="col-sm-12 col-md-2 col-form-label"><i style="color:red;font-size:1.5em;"></i></label>
													<div class="col-sm-12 col-md-10">
														<input class="form-control" placeholder="Author 3" type="text" name="authors2" >
													</div><br><br>

													<label class="col-sm-12 col-md-2 col-form-label"><i style="color:red;font-size:1.5em;"></i></label>
													<div class="col-sm-12 col-md-10">
														<input class="form-control" placeholder="Author 4" type="text" name="authors3" >
													</div><br><br>

													<label class="col-sm-12 col-md-2 col-form-label"><i style="color:red;font-size:1.5em;"></i></label>
													<div class="col-sm-12 col-md-10">
														<input class="form-control" placeholder="Author 5" type="text" name="authors4" >
													</div><br>

												</div>

												<div class="form-group row">
													<label class="col-sm-12 col-md-2 col-form-label">Edition</label>
													<div class="col-sm-12 col-md-10">
														<input class="form-control" placeholder="Edition" type="text" name="edition">
													</div>
												</div>

												<div class="form-group row">
													<label class="col-sm-12 col-md-2 col-form-label">Place of publication</label>
													<div class="col-sm-12 col-md-10">
														<input class="form-control" placeholder="Place of publication" type="text" name="publication">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-12 col-md-2 col-form-label">Publisher</label>
													<div class="col-sm-12 col-md-10">
														<input class="form-control" type="text" placeholder="Publisher" name="publisher">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-12 col-md-2 col-form-label">ISBN<i style="color:red;font-size:1.5em;">*</i></label>
													<div class="col-sm-12 col-md-10">
														<input class="form-control" type="text" placeholder="ISBN" name="isbn" required="" maxlength="15" pattern="[0-9 .]+">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-12 col-md-2 col-form-label">Copyright</label>
													<div class="col-sm-12 col-md-10">
														<input class="form-control" placeholder="Copyright" type="text" name="copyright">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-12 col-md-2 col-form-label">Copies<i style="color:red;font-size:1.5em;">*</i></label>
													<div class="col-sm-12 col-md-10">
														<input class="form-control" placeholder="Copies" type="number" name="copies" required="">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-12 col-md-2 col-form-label">Location<i style="color:red;font-size:1.5em;">*</i></label>
													<div class="col-sm-12 col-md-10">
														<select class="custom-select col-12" name="category" required="" style="text-transform: capitalize;">
															<option selected="">Choose location</option>
															<?php

															$cat = mysqli_query($conn, "SELECT * from category");
															while ($catrow = mysqli_fetch_array($cat)) {
															?>
															
															<option><?php echo $catrow['category']; ?></option>
														<?php } ?>
														</select>
													</div>
												</div>

												<!-- <div class="form-group row">
													<label class="col-sm-12 col-md-2 col-form-label">Used for<i style="color:red;font-size:1.5em;">*</i></label>
													<div class="col-sm-12 col-md-10">
														<select class="custom-select col-12" name="used" required="">
															<option selected="">Choose used for</option>
															<option value="other">Other</option>
															<option value="library">Libray only</option>

														</select>
													</div>
												</div>
 -->

												<div class="form-group row">
													<label class="col-sm-12 col-md-2 col-form-label">Section<i style="color:red;font-size:1.5em;">*</i></label>
													<div class="col-sm-12 col-md-10">
														<select class="custom-select col-12" name="section" required="">
															<option selected="">Choose section</option>
															<option value="Filipinana">Filipinana</option>
															<option value="Reserved">Reserved</option>

															<option value="Reference">Reference</option>
															<option value="Circultion">Circulation</option>

															<option value="Fiction">Fiction</option>
															<option value="Other">Other</option>

														</select>
													</div>
												</div>

<div class="form-group row">
													<label class="col-sm-12 col-md-2 col-form-label">Physical description</label>
													<div class="col-sm-12 col-md-10">
														<input class="form-control" placeholder="Physical description" type="text" name="physical">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-12 col-md-2 col-form-label">Notes</label>
													<div class="col-sm-12 col-md-10">
														<input class="form-control" type="text" placeholder="notes" name="notes">
													</div>
												</div>





												<!-- <div class="form-group row">
													<label class="col-sm-12 col-md-2 col-form-label">Rack #, Column & Row<i style="color:red;font-size:1.5em;">*</i></label>
													<div class="col-md-4">
														<input class="form-control" type="number" name="rack" placeholder="Rack #" >
													</div>
													<div class="col-md-3">
														<input class="form-control" type="number" name="column" placeholder="Column" >
													</div>
													<div class="col-md-3">
														<input class="form-control" type="number" name="row" placeholder="Row" >
													</div>
												</div>

 -->


												<div class="form-group row">
													<label class="col-sm-12 col-md-2 col-form-label">Book Image</label>
													<div class="col-sm-12 col-md-10">
														<input class="form-control" placeholder="image" type="file" name="image">
													</div>
												</div>


												<input type="submit" class="btn btn-primary pull-right" name="submit" value="Save">
											
											</form>
										</div>
									</div>
								</div>
							</div>

		

		<?php include 'footer.php';  ?>



