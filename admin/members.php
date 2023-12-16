				
<?php include 'header.php'; 

include '../phpqrcode/qrlib.php'; ?>

	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			
				<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">Members</h4>



						<a class="pull-right btn btn-primary btn-sm" href="	" data-toggle="modal" data-target="#addmember" type="button" style="margin-top: -2em">Add Member</a>


						

					</div>

					<div class="pb-20">
						<table class="data-table table stripe hover nowrap">
							<thead>
								<tr>
									<th></th>
									<th class="table-plus datatable-nosort">ID Number</th>
									<th>Fullname</th>
									<th>Contact</th>
									<th>Gender</th>
									<th>Type</th>
									<th>Course</th>
									<th>Year Level</th>
									<th class="datatable-nosort">Action</th>
								</tr>
							</thead>
							<tbody>


								<?php

									$sql = mysqli_query($conn, "SELECT * from members");
									while ($row = mysqli_fetch_array($sql)) { ?>

										<tr style="text-transform: capitalize;">
											<td><?php 

											echo '<div class="col-xs-4" >';

					                           $dir = '../qrcode/'; 

					                              $idnumber = $row['idnumber'];
					                              $name =  $row['fullname'].$row['idnumber'];

					                                  QRcode::png($idnumber, $dir.''.$name.'.png', QR_ECLEVEL_L, 5);

					                                  echo '<img class="imggg" src="../qrcode/'. @$name.'.png" style="height:50px;width:50px">';
					                                  echo '</div>';

					                        echo '<div class="col-xs-4" >'; ?></td>

											<td><?php echo $row['idnumber'] ?></td>
											<td><?php echo $row['fullname'] ?></td>






											<td><?php echo $row['number'] ?></td>
											<td><?php echo $row['gender'] ?></td>
											<td><?php echo $row['type'] ?></td>
											<td><?php echo $row['course'] ?></td>
											<td><?php echo $row['yearlevel'] ?></td>
											<td><a href="" data-toggle="modal" data-target="#edit<?php echo $row['memid'] ?>" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>

											<a href="../php/dload.php?file=<?php echo $name ?>.png" class="btn btn-success btn-sm"><span class="fa fa-download"></span></a>

										</td>
										</tr>





						<div class="modal fade" id="edit<?php echo $row['memid'] ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered">
									<div class="modal-content">
										<div class="modal-header">
											<h4 class="modal-title" id="myLargeModalLabel">Edit Member</h4>
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
										</div>
										<div class="modal-body">
											<form method="POST" action="../php/editmember.php?key=<?php echo $row['memid'] ?>">
												<div class="form-group row">
													<label class="col-sm-12 col-md-2 col-form-label">I.D Number<i style="color:red;font-size:1.5em;">*</i></label>
													<div class="col-sm-12 col-md-10">
														<input class="form-control" type="text"  name="idnumber" required="" readonly="" value="<?php echo $idnumber; ?>" placeholder="<?php echo $idnumber; ?>">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-12 col-md-2 col-form-label">Fullname<i style="color:red;font-size:1.5em;">*</i></label>
													<div class="col-sm-12 col-md-10">
														<input class="form-control" placeholder="Fullname" type="text" name="fullname" required="" value="<?php echo $row['fullname'] ?>">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-12 col-md-2 col-form-label">Mobile Number<i style="color:red;font-size:1.5em;">*</i></label>
													<div class="col-sm-12 col-md-10">
														<input class="form-control" type="text" maxlength="10" pattern="[0-9 .]+" name="number" placeholder="Ex.  907000000" required="" value="<?php echo $row['number'] ?>">

													</div>
													

												</div>
												<div class="form-group row">
													<label class="col-sm-12 col-md-2 col-form-label">Gender<i style="color:red;font-size:1.5em;">*</i></label>
													<div class="col-sm-12 col-md-10">
														<select class="custom-select col-12" name="gender" required="">
															<option value="<?php echo $row['gender'] ?>"><?php echo $row['gender'] ?></option>
															<option>Male</option>
															<option>Female</option>
														</select>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-12 col-md-2 col-form-label">Type<i style="color:red;font-size:1.5em;">*</i></label>
													<div class="col-sm-12 col-md-10">
														<select class="custom-select col-12" name="type" required="">
															<option value="<?php echo $row['type'] ?>"><?php echo $row['type'] ?></option>
															<option>Student</option>
															<option>Faculty</option>
														</select>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-12 col-md-2 col-form-label">Year Level<i style="color:red;font-size:1.5em;">*</i></label>
													<div class="col-sm-12 col-md-10">
														<select class="custom-select col-12" name="level" required="">
															<option value="<?php echo $row['yearlevel'] ?>"><?php echo $row['yearlevel'] ?></option>
															<option>I</option>
															<option>II</option>
															<option>III</option>
															<option>IV</option>
															<option>Faculty</option>
														</select>
													</div>
												</div>
											<div class="form-group row">
													<label class="col-sm-12 col-md-2 col-form-label">Course<i style="color:red;font-size:1.5em;">*</i></label>
													<div class="col-sm-12 col-md-10">
														<select class="custom-select col-12" name="course" required="">
															<option value="<?php echo $row['course'] ?>"><?php echo $row['yearlevel'] ?></option>
															<option>BSIT</option>
															<option>BSCRIM</option>
															<option>BSHM</option>
															<option>BEED</option>
															<option>BSED</option>
														</select>
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



							<div class="modal fade" id="addmember" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered">
									<div class="modal-content">
										<div class="modal-header">
											<h4 class="modal-title" id="myLargeModalLabel">Add Member</h4>
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
										</div>
										<div class="modal-body">
											<form method="POST" action="../php/addmember.php">
												<div class="form-group row">

													<?php

													error_reporting(0);

														$sqla = mysqli_query($conn, "SELECT * from members ");
														$rowa = mysqli_fetch_array($sqla);
														$rowss = mysqli_num_rows($sqla);

														

														if ($rowss=0) {
														$idnumbers = 1;
														}else{
															$rowss = mysqli_num_rows($sqla);
														 $idnumbers = $rowss+1;
														}

													 ?>


													<label class="col-sm-12 col-md-2 col-form-label">I.D Number<i style="color:red;font-size:1.5em;">*</i></label>
													<div class="col-sm-12 col-md-10">
														<input class="form-control" type="text"  name="idnumber" required="" readonly="" value="CPSU-LRC-000<?php echo $idnumbers; ?>" placeholder="CPSU-LRC-000<?php echo $idnumbers; ?>">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-12 col-md-2 col-form-label">Fullname<i style="color:red;font-size:1.5em;">*</i></label>
													<div class="col-sm-12 col-md-10">
														<input class="form-control" placeholder="Fullname" type="text" name="fullname" required="">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-12 col-md-2 col-form-label">Mobile Number<i style="color:red;font-size:1.5em;">*</i></label>
													<div class="col-sm-12 col-md-10">
														<input class="form-control" type="text" maxlength="10" pattern="[0-9 .]+" name="number" placeholder="Ex.  907000000" required="">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-12 col-md-2 col-form-label">Gender<i style="color:red;font-size:1.5em;">*</i></label>
													<div class="col-sm-12 col-md-10">
														<select class="custom-select col-12" name="gender" required="">
															<option selected="">Choose gender.</option>
															<option>Male</option>
															<option>Female</option>
														</select>
													</div>
												</div>



												<div class="form-group row">
													<label class="col-sm-12 col-md-2 col-form-label">Type<i style="color:red;font-size:1.5em;">*</i></label>
													<div class="col-sm-12 col-md-10">
														<select class="custom-select col-12" name="type" required="" onchange="yesnoCheck(this)">
															<option selected="">Choose type.</option>
															<option value="Student">Student</option>
															<option value="Faculty">Faculty</option>
														</select>
													</div>
												</div>





												<div class="form-group row" id="ifYes" style="display: none">
													<label class="col-md-2 col-form-label"></label>
													<div class="col-md-10" style="margin-left: 5.2em">
														<select class="custom-select col-12" name="level">
															<option selected="">Choose year level.</option>
															<option>I</option>
															<option>II</option>
															<option>III</option>
															<option>IV</option>
														</select>
													</div>
												</div>
												<div class="form-group row" id="ifYess" style="display: none">
													<label class="col-md-2 col-form-label"></label>
													<div class="col-md-10" style="margin-left: 5.2em">
														<select class="custom-select col-12" name="course">
															<option selected="">Choose course.</option>
															<option>BSIT</option>
															<option>BSCRIM</option>
															<option>BSHM</option>
															<option>BEED</option>
															<option>BSED</option>
														</select>
													</div>
												</div>
												

<script type="text/javascript">
    

function yesnoCheck(that) {

    if (that.value == "Student") {

      
        document.getElementById("ifYes").style.display = "block";

        document.getElementById("ifYess").style.display = "block";
    }

     else if (that.value == "Faculty") {

      
      
        document.getElementById("ifYes").style.display = "none";

        document.getElementById("ifYess").style.display = "none";
      
    }


}

</script>

												<input type="submit" class="btn btn-primary pull-right" name="submit" value="Save">
											
											</form>
										</div>
									</div>
								</div>
							</div>




		<?php include 'footer.php'; ?>

