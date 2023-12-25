	
</div>
</div>
	<script>
		new DataTable('table.display', {
			paging: false,
    		responsive: {
				details: {
					renderer: function (api, rowIdx, columns) {
						let data = columns.map((col, i) => {
							return col.hidden
								? '<tr data-dt-row="' +
										col.rowIndex +
										'" data-dt-column="' +
										col.columnIndex +
										'">' +
										'<td>' +
										col.title +
										':' +
										'</td> ' +
										'<td>' +
										col.data +
										'</td>' +
										'</tr>'
								: '';
						}).join('');
		
						let table = document.createElement('table');
						table.innerHTML = data;
		
						return data ? table : false;
					}
				}
    		},
			scrollY: 270
});
	</script>
	<!-- <div class="footer-wrap pd-20 mb-20 card-box">
		Enhance Library System with SMS Notification for CPSU San Carlos Campus
	</div> -->
		
	<!-- js -->
	<script src="../vendors/scripts/core.js"></script>
	<script src="../vendors/scripts/script.min.js"></script>
	<script src="../vendors/scripts/process.js"></script>
	<script src="../vendors/scripts/layout-settings.js"></script>

	<!-- add sweet alert js & css in footer -->
	<script src="../src/plugins/sweetalert2/sweetalert2.all.js"></script>
	<script src="../src/plugins/sweetalert2/sweet-alert.init.js"></script>
	
	<script src="../js/html5-qrcode.js"></script>
	<script src="../js/html5-qrcode-scanner.js"></script>
	<script src="../src/plugins/datatables/js/jquery.dataTables.min.js"></script>
	<script src="../src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
	<script src="../src/plugins/datatables/js/dataTables.responsive.min.js"></script>
	<script src="../src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
	<!-- buttons for Export datatable -->
	<script src="../src/plugins/datatables/js/dataTables.buttons.min.js"></script>
	<script src="../src/plugins/datatables/js/buttons.bootstrap4.min.js"></script>
	<script src="../src/plugins/datatables/js/buttons.print.min.js"></script>
	<script src="../src/plugins/datatables/js/buttons.html5.min.js"></script>
	<script src="../src/plugins/datatables/js/buttons.flash.min.js"></script>
	<script src="../src/plugins/datatables/js/pdfmake.min.js"></script>
	<script src="../src/plugins/datatables/js/vfs_fonts.js"></script>
	<!-- Datatable Setting js -->
	<script src="../vendors/scripts/datatable-setting.js"></script>
</body>
</html>

