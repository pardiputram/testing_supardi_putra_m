<?php if ($piket == '1') {
	$name = 'Total Hadir Piket';
} elseif ($piket == '2') {
	$name = 'Total Cadangan Piket';
} elseif ($piket == '3') {
	$name = 'Total Lepas Piket';
} else {
	$name = 'Total Ijin/Sakit/dll';
} ?>
<label>
	<?php echo $name ?>
</label>
<table class="table table-bordered table-striped" id="mytable">
	<thead class="thead-dark">
		<tr>
			<th scope="col">No</th>
			<th scope="col">Nama</th>
			<th scope="col">Jabatan</th>
			<th scope="col">Group Piket</th>
			<th scope="col">Ket. Ijin/Sakit/ dll</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$no = 1;
		$a = 1;
		foreach ($data as $r) { ?>
			<tr>
				<td>
					<?php echo $no++ ?>
				</td>
				<td>
					<?php echo $r->nama ?>
				</td>

				<td>
					<?php echo $r->jabatan ?>
				</td>
				<td>
					<?php echo $r->jadwal_piket ?>
				</td>
				<td>
					<?php if ($r->ket == '' or $r->ket == NULL) {
						echo '-';
					} else {
						echo $r->ket;
					}
					?>
				</td>



			</tr>
		<?php
		} ?>
	</tbody>
</table>
<link rel="stylesheet" href="<?php echo base_url('assets/plugins') ?>/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo base_url('assets/plugins') ?>/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo base_url('assets/plugins') ?>/datatables-buttons/css/buttons.bootstrap4.min.css">
<script src="<?php echo base_url('assets/plugins') ?>/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('assets/plugins') ?>/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url('assets/plugins') ?>/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url('assets/plugins') ?>/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url('assets/plugins') ?>/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url('assets/plugins') ?>/datatables-buttons/js/buttons.bootstrap4.min.js"></script>

<script src="<?php echo base_url('assets/plugins') ?>/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url('assets/plugins') ?>/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url('assets/plugins') ?>/datatables-buttons/js/buttons.colVis.min.js"></script>
<script>
	$(document).ready(function() {

		let table = new DataTable('#mytable');
	});
</script>