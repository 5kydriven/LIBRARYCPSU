				
<?php include 'header.php'; ?>

	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			
				<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">Returned Books<a href="" onclick="printContent('print')" id="hit" class="btn btn-primary" style="float: right">Print</a></h4>
					</div>
					<div class="pb-20" id="print">
						<table class="display table stripe hover nowrap">
							
							
							<thead>
								<tr>
									<th>ISBN</th>
									<th>Borrowers Name</th>
									<th>Title</th>
									<th>Date Borrowed (Y-M-D)</th>
									<th>Due Date (Y-M-D)</th>
									<th>Date Returned (Y-M-D)</th>
									<th>Penalty</th>
								</tr>
							</thead>
							<tbody>
								<?php

								$sql = mysqli_query($conn,"SELECT * from bookstatus LEFT JOIN books ON bookstatus.booksid = books.bookid LEFT JOIN members ON bookstatus.memid = members.memid where bookstatus.status = 'returned'");
								while ($row = mysqli_fetch_array($sql)) { ?>
									<tr style='text-transform:capitalize'>
										<td><?php echo $row['isbn']; ?></td>

										<td><?php echo "<span style='text-transform:capitalize'>".$row['fullname']."</span>"; ?></td>

										<td><?php echo $row['title']; ?></td>

										<td><?php echo $row['borrowed']; ?></td>

										<td><?php echo $row['duedate']; ?></td>
										<td><?php echo $row['returned']; ?></td>

										<?php
											if ($row['penalty']=='no penalty') { ?>

												<td><?php echo $row['penalty']; ?></td>

											<?php }else{ ?> 

												<td class="alert alert-danger"><?php echo "p " .formatMoney($row['penalty'],true); ?></td>
											<?php }
										?>
										
									</tr>
									
								<?php 
								}

								?>
								
							</tbody>
							
						</table>
					</div>
				</div>

		<?php include 'footer.php'; ?>


    <script>
    function printContent(el) {
        var restorepage = document.body.innerHTML;
        var printcontent = document.getElementById(el).innerHTML;
        document.body.innerHTML = printcontent;
        window.print();
        document.body.innerHTML = restorepage;
    }
    </script>

