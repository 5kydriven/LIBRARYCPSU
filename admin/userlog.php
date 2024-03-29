<?php include 'header.php'; ?>
	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			
				<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">User's Log Sheet
							<a href="../php/excelExport.php?dt=logs" class="btn btn-success ml-1" style="float: right" id="2excel">Excel</a>
							<!-- <a href="" onclick="printContent('print')" id="hit" class="btn btn-primary" style="float: right">Print</a> -->
						</h4>
					</div>
					<div class="pb-20" id="print">
						<table class="display table stripe nowrap" id="log">
							<thead>
								<tr>
									<th>Date (Y-M-D)</th>
									<th>Time In</th>
									<th>Time out</th>
									<th>Name</th>
									<th>College/Year</th>
									<th>Type</th>
								</tr>
							</thead>
							<tbody>
								
								<?php

								$sql = mysqli_query($conn, "SELECT * FROM log ORDER BY logid DESC");
								while($row = mysqli_fetch_array($sql)){ ?>

									<tr>
										<td><?php echo $row['date'] ?></td>
										<td><?php echo $row['timein'] ?></td>
										<td><?php echo $row['timeout'] ?></td>
										<td><?php echo "<span style='text-transform:capitalize;'>" .$row['fullname']."</span>" ?></td>
										<td><?php echo $row['course'] ?></td>
										<td><?php echo $row['type'] ?></td>
									</tr>

								<?php
								}

								?>

							</tbody>
						</table>
					</div>
				</div>
				<!-- <script>
					

					function printContent(el) {
						var restorepage = document.body.innerHTML;
						var printcontent = document.getElementById(el).innerHTML;
						document.body.innerHTML = printcontent;
						window.print();
						document.body.innerHTML = restorepage;
					}
    			</script> -->

		<?php include 'footer.php'; ?>

			
		    
