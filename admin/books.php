				
<?php include 'header.php'; ?>
	<script src="../js/table2excel-books.js"></script>
	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			
				<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">Books</h4>
						<a href="../php/download_excel.php?books" class="btn btn-success ml-1" style="float: right; margin-top: -1.8em; padding: 5px 20px" id="2excel">Excel</a><a class="pull-right btn btn-primary btn-sm" href="	" data-toggle="modal" data-target="#addbook" type="button" style="margin-top: -2em">Add Book</a>
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

										<tr style="overflow: scroll; width: 520px; text-transform: capitalize;">
 
											<td><?php 

											if ($row['bookimage']=="") {
												echo "<span class='micon dw dw-book' style='font-size:2em;color:limegreen'></span>";
											}else{

											echo '<img class="img" src="'."../upload/".$row['bookimage'].'">' ;
											}
											?>
												
											</td>

											<td><?php echo $row['section'] ?></td>
											

											<td><?php echo $row['title'] ?></td>

											<td><?php echo $row['authors'] ?></td>
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

<!-- update book -->
								<div class="modal-dialog modal-dialog-centered modal-lg">
									<div class="modal-content container-fluid">
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

												<div class="row">
													<label class="col-sm-12 col-md col-form-label">Sub Title</label>
													<div class="col-sm-12 col-md-10 mb-1">
														<input class="form-control" type="text" placeholder="Sub Title" name="subTitle" maxlength="50" value="<?php echo $row['subtitle']?>">
													</div>
												</div>

												<div class="row">
													<label class="col-sm col-form-label">Call No.<i style="color:red;font-size:1em;">*</i></label>
													<div class="col-sm-12 col-md-10 mb-1">
														<input class="form-control" type="number" placeholder="Call Number" name="callnum" required="" maxlength="50" value="<?php echo $row['callnum']?>">
													</div>
												</div>

												<div class="form-group row">
													<label class="col-sm-12 col-md-2 col-form-label">Author<i style="color:red;font-size:1.5em;">*</i></label>
													<div class="col-sm-12 col-md-10">
														<input class="form-control" placeholder="Authors" type="text" name="authors"  value="<?php echo $row['authors'] ?>">
													</div>										
												</div>

												<div class="form-group row">													
													<label class="col-sm-12 col-md-12 col-form-label">Other Statement of Responsibility</label>													
															<label class="col col-form-label "><i style="color:red;font-size:1.5em;"></i></label>
															<div class="col-sm-12 col-md-10 mb-1">
																<input class="form-control" placeholder="1. " type="text" name="state1" value="<?php echo $row['state1']?>">
															</div>
													
															<label class="col-sm-12 col-md-2 col-form-label"><i style="color:red;font-size:1.5em;"></i></label>
															<div class="col-sm-12 col-md-10 mb-1">
																<input class="form-control" placeholder="2. " type="text" name="state2" value="<?php echo $row['state2']?>">
															</div>
													
															<label class="col-sm-12 col-md-2 col-form-label"><i style="color:red;font-size:1.5em;"></i></label>
															<div class="col-sm-12 col-md-10">
																<input class="form-control" placeholder="3. " type="text" name="state3" value="<?php echo $row['state3']?>">
															</div>
												</div>												

												<div class="form-group row">
													<label class="col-sm-12 col-md-2 col-form-label">Edition</label>
													<div class="col-sm-12 col-md-10">
														<input class="form-control" placeholder="Edition" type="text" name="edition" value="<?php echo $row['edition'] ?>">
													</div>
												</div>

												<div class="form-group row">
													<label class="col-sm-12 col-md-2 col-form-label">Copies<i style="color:red;font-size:1.5em;">*</i></label>
													<div class="col-sm-12 col-md-10">
														<input class="form-control" placeholder="Copies" type="number" name="copies" required="" value="<?php echo $row['copies'] ?>">
													</div>
												</div>												

												<div class="form-group row">
													<label class="col-sm-12 col-md-2 col-form-label">Publisher</label>
													<div class="col-sm-12 col-md-7">
														<input class="form-control" type="text" placeholder="Publisher" name="publisher" value="<?php echo $row['publisher'] ?>">
													</div>
													<div class="col-sm col">
														<input class="form-control" type="date" name="publisherDate" value="<?php echo $row['publisherdate']?>">
													</div>
												</div>

												<div class="form-group row">
													<label class="col-sm-12 col-md-2 col-form-label">Place of publication</label>
													<div class="col-sm-12 col-md-10">
														<input class="form-control" placeholder="Place of publication" type="text" name="publication" value="<?php echo $row['publication'] ?>">
													</div>
												</div>

												<div class="form-group row">
													<label class="col-sm-12 col-md-2 col-form-label">Physical description</label>
													<div class="col-sm-12 col-md-10">
														<input class="form-control" type="text" name="physical" value="<?php echo $row['physical'] ?>">
													</div>
												</div>					
												
												<div class="form-group row">
													<label class="col-sm-12 col-md-2 col-form-label">Series</label>
													<div class="col-sm-12 col-md-10">
														<input class="form-control" placeholder="Series" type="text" name="series" value="<?php echo $row['series']?>">
													</div>
												</div>

												<div class="form-group row">
													<label class="col-sm-12 col-md-2 col-form-label">Subject</label>
													<div class="col-sm-12 col-md-10 mb-1">
														<input class="form-control" placeholder="1. " type="text" name="sub1" value="<?php echo $row['sub1']?>">
													</div>

													<label class="col-sm-12 col-md-2 col-form-label"><i style="color:red;font-size:1.5em;"></i></label>
													<div class="col-sm-12 col-md-10 mb-1">
														<input class="form-control" placeholder="2. " type="text" name="sub2" value="<?php echo $row['sub2']?>">
													</div>

													<label class="col-sm-12 col-md-2 col-form-label"><i style="color:red;font-size:1.5em;"></i></label>
													<div class="col-sm-12 col-md-10 mb-1">
														<input class="form-control" placeholder="3. " type="text" name="sub3" value="<?php echo $row['sub3']?>">
													</div>
												</div>

												<div class="form-group row">
													<label class="col-sm-12 col-md-2 col-form-label">Note</label>
													<div class="col-sm-12 col-md-10">
														<input class="form-control" type="text" name="notes" value="<?php echo $row['notes'] ?>">
													</div>
												</div>
									
												<div class="form-group row">
													<label class="col-sm-12 col-md-2 col-form-label">ISBN<i style="color:red;font-size:1.5em;">*</i></label>
													<div class="col-sm-12 col-md-10">
														<input class="form-control" type="text" placeholder="ISBN" name="isbn" required="" value="<?php echo $row['isbn'] ?>" maxlength="15" pattern="[0-9 .]+">
													</div> 
												</div>

												<div class="form-group row">
													<label class="col-sm-12 col-md-2 col-form-label">Book Dealer</label>
													<div class="col-sm-12 col-md-10">
														<input class="form-control" placeholder="Book Dealer" type="text" name="dealer" value="<?php echo $row['bookdealer']?>">
													</div>
												</div>

												<div class="form-group row">
													<label class="col-sm-12 col-md-2 col-form-label">Price</label>
													<div class="col-sm-12 col-md-10">
														<input class="form-control" placeholder="price" type="number" name="price" value="<?php echo $row['price']?>">
													</div>
												</div>
												
												<div class="form-group row">
													<label class="col-sm-12 col-md-2 col-form-label">Copyright</label>
													<div class="col-sm-12 col-md-10">
														<input class="form-control" placeholder="Copyright" type="text" name="copyright" value="<?php echo $row['copyright'] ?>">
													</div>
												</div>

												<div class="form-group row">
													<label class="col-sm-12 col-md col-form-label">Account No.</label>
													<div class="col-sm-12 col-md-10">
														<input class="form-control" placeholder="Account Number" type="number" name="accnum" value="<?php echo $row['accnum']?>">
													</div>
												</div>

												<div class="form-group row">
													<label class="col-sm-12 col-md-auto col-form-label">Date Recieved<i style="color:red;font-size:1em;">*</i></label>
													<div class="col-sm-12 col-md">
														<input class="form-control" type="date" name="dateRes" required="" value="<?php echo $row['dateres']?>">
													</div>
												</div>

												<div class="form-group row">
													<label class="col-sm-12 col-md-auto col-form-label">Source of Fund</label>
													<div class="col-sm-12 col-md">
														<input class="form-control" placeholder="Source of Fund" type="text" name="srcfund" value="<?php echo $row['srcfund']?>">
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
								<?php } ?>
		
							</tbody>
						</table>
					</div>
				</div>


<!-- Add book -->
					<div class="modal fade " id="addbook" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered modal-lg">
									<div class="modal-content container-fluid">
										<div class="modal-header">
											<h4 class="modal-title" id="myLargeModalLabel">Add Book</h4>
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
										</div>
										<div class="modal-body">
											<form method="POST" action="../php/addbooks.php" enctype="multipart/form-data">
												
												<div class="row">
													<label class="col-sm-12 col-md col-form-label">Title<i style="color:red;font-size:1em;">*</i></label>
													<div class="col-sm-12 col-md-10 mb-1">
														<input class="form-control" type="text" placeholder="Title" name="title" required="" maxlength="50">
													</div>
												</div>

												<div class="row">
													<label class="col-sm-12 col-md col-form-label">Sub Title</label>
													<div class="col-sm-12 col-md-10 mb-1">
														<input class="form-control" type="text" placeholder="Sub Title" name="subTitle" maxlength="50">
													</div>
												</div>

												<div class="row">
													<label class="col-sm col-form-label">Call No.<i style="color:red;font-size:1em;">*</i></label>
													<div class="col-sm-12 col-md-10 mb-1">
														<input class="form-control" type="number" placeholder="Call Number" name="callnum" required="" maxlength="50">
													</div>
												</div>

												<div class="row">
													<label class="col-sm-12 col-md col-form-label">Author<i style="color:red;font-size:1em;">*</i></label>
													<div class="col-sm-12 col-md-10 mb-1">
														<input class="form-control" placeholder="Author" type="text" name="authors" >
													</div><br><br>
													
												</div>

												<div class="form-group row">													
													<label class="col-sm-12 col-md-12 col-form-label">Other Statement of Responsibility</label>

													
															<label class="col col-form-label "><i style="color:red;font-size:1.5em;"></i></label>
															<div class="col-sm-12 col-md-10 mb-1">
																<input class="form-control" placeholder="1. " type="text" name="state1" >
															</div>
													
															<label class="col-sm-12 col-md-2 col-form-label"><i style="color:red;font-size:1.5em;"></i></label>
															<div class="col-sm-12 col-md-10 mb-1">
																<input class="form-control" placeholder="2. " type="text" name="state2" >
															</div>
													
															<label class="col-sm-12 col-md-2 col-form-label"><i style="color:red;font-size:1.5em;"></i></label>
															<div class="col-sm-12 col-md-10">
																<input class="form-control" placeholder="3. " type="text" name="state3" >
															</div>

												</div>														

												<div class="form-group row">
													<label class="col-sm-12 col-md-2 col-form-label">Edition</label>
													<div class="col-sm-12 col-md-10">
														<input class="form-control" placeholder="Edition" type="text" name="edition">
													</div>
												</div>

												<div class="form-group row">
													<label class="col-sm-12 col-md-2 col-form-label">Copies<i style="color:red;font-size:1em;">*</i></label>
													<div class="col-sm-12 col-md-10">
														<input class="form-control" placeholder="Copies" type="number" name="copies" required="">
													</div>
												</div>

												<div class="form-group row">
													<label class="col-sm-12 col-md-2 col-form-label">Publisher</label>
													<div class="col-sm-12 col-md-7">
														<input class="form-control" type="text" placeholder="Publisher" name="publisher">
													</div>
													
													<div class="col-sm col">
														<input class="form-control" type="date" name="publisherDate">
													</div>
												</div>												

												<div class="form-group row">
													<label class="col-sm-12 col-md-auto col-form-label">Place of publication</label>
													<div class="col-sm-12 col-md">
														<input class="form-control" placeholder="Place of publication" type="text" name="publication">
													</div>
												</div>

												<div class="form-group row">
													<label class="col-sm-12 col-md-auto col-form-label">Physical description</label>
													<div class="col-sm-12 col-md">
														<input class="form-control" placeholder="Physical description" type="text" name="physical">
													</div>
												</div>												

												<div class="form-group row">
													<label class="col-sm-12 col-md-2 col-form-label">Series</label>
													<div class="col-sm-12 col-md-10">
														<input class="form-control" placeholder="Series" type="text" name="series">
													</div>
												</div>

												<div class="form-group row">
													<label class="col-sm-12 col-md-2 col-form-label">Subject</label>
													<div class="col-sm-12 col-md-10 mb-1">
														<input class="form-control" placeholder="1. " type="text" name="sub1" >
													</div>

													<label class="col-sm-12 col-md-2 col-form-label"><i style="color:red;font-size:1.5em;"></i></label>
													<div class="col-sm-12 col-md-10 mb-1">
														<input class="form-control" placeholder="2. " type="text" name="sub2" >
													</div>

													<label class="col-sm-12 col-md-2 col-form-label"><i style="color:red;font-size:1.5em;"></i></label>
													<div class="col-sm-12 col-md-10 mb-1">
														<input class="form-control" placeholder="3. " type="text" name="sub3" >
													</div>

												</div>

												<div class="form-group row">
													<label class="col-sm-12 col-md-2 col-form-label">Note</label>
													<div class="col-sm-12 col-md-10">
														<input class="form-control" type="text" placeholder="notes" name="notes">
													</div>
												</div>
												
												<div class="form-group row">
													<label class="col-sm-12 col-md-2 col-form-label">ISBN<i style="color:red;font-size:1em;">*</i></label>
													<div class="col-sm-12 col-md-10">
														<input class="form-control" type="text" placeholder="ISBN" name="isbn" required="" maxlength="15" pattern="[0-9 .]+">
													</div>
												</div>												

												<div class="form-group row">
													<label class="col-sm-12 col-md-2 col-form-label">Book Dealer</label>
													<div class="col-sm-12 col-md-10">
														<input class="form-control" placeholder="Book Dealer" type="text" name="dealer">
													</div>
												</div>

												<div class="form-group row">
													<label class="col-sm-12 col-md-2 col-form-label">Price</label>
													<div class="col-sm-12 col-md-10">
														<input class="form-control" placeholder="price" type="number" name="price">
													</div>
												</div>

												<div class="form-group row">
													<label class="col-sm-12 col-md-2 col-form-label">Copyright</label>
													<div class="col-sm-12 col-md-10">
														<input class="form-control" placeholder="Copyright" type="text" name="copyright">
													</div>
												</div>
												
												<div class="form-group row">
													<label class="col-sm-12 col-md col-form-label">Account No.</label>
													<div class="col-sm-12 col-md-10">
														<input class="form-control" placeholder="Account Number" type="number" name="accnum">
													</div>
												</div>

												<div class="form-group row">
													<label class="col-sm-12 col-md-auto col-form-label">Date Recieved<i style="color:red;font-size:1em;">*</i></label>
													<div class="col-sm-12 col-md">
														<input class="form-control" type="date" name="dateRes" required="">
													</div>
												</div>

												<div class="form-group row">
													<label class="col-sm-12 col-md-auto col-form-label">Source of Fund</label>
													<div class="col-sm-12 col-md">
														<input class="form-control" placeholder="Source of Fund" type="text" name="srcfund">
													</div>
												</div>
												

												<div class="form-group row">
													<label class="col-sm-12 col-md-2 col-form-label">Location<i style="color:red;font-size:1em;">*</i></label>
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

												<div class="form-group row">
													<label class="col-sm-12 col-md-2 col-form-label">Section<i style="color:red;font-size:1em;">*</i></label>
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
		<script>
			
		</script>
		

		<?php include 'footer.php';  ?>
		


