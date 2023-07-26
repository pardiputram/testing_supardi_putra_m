<div class="content-wrapper">

	<div class="container-fluid">
		<h4 class="my-1">Input Absensi</h4>
		<div class="card mb-4">
			<div class="card-header">
				<div class="float-left">
					<p>- Group Piket -</p>
					<p> A : Hadir Piket</p>
					<p> B : Cadangan Piket</p>
					<p> C : Lepas Piket</p>
				</div>
				<div class="float-right">
					<?php echo date('d F Y', strtotime(date('Y-06-23'))); ?>
				</div>
			</div>

			<?php $suces = $this->uri->segment('3');
			if ($suces != NULL) {
				$successs = base64_decode($suces);
			} else {
				$successs = NULL;
			}

			if ($successs == 'sukses') {
				echo '<div class="alert alert-success alert-dismissable">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							<h4><i class="fa fa-check text-success"></i> Success</h4> Data Absensi Hari Ini Telah Di Submit !!!.
						</div>';
			} else { ?>
				<div class="card-body">
					<?php echo form_open('index.php/absensi/insert/', 'class="form-horizontal" id="form-validation" '); ?>
					<table class="table table-bordered table-striped" id="mytable">
						<thead class="thead-dark">
							<tr>
								<th scope="col">No</th>
								<th scope="col">Nama</th>
								<th scope="col">Jabatan</th>
								<th scope="col">Status Piket</th>
								<th scope="col">Ket. Ijin/Sakit/ dll</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 1;
							$a = 1;
							foreach ($absensi->result() as $r) { ?>
								<tr>
									<td><?php echo $no++ ?></td>
									<td><input type="hidden" id="idanggota" name="id[<?php echo $a; ?>]" value="<?php echo $r->idx ?>"><input type="hidden" id="idanggota" name="nama[<?php echo $a; ?>]" value="<?php echo $r->nama ?>"><?php echo $r->nama ?></td>

									<td><input type="hidden" id="jabatan" name="jabatan[<?php echo $a; ?>]" value="<?php echo $r->jabatan ?>"><?php echo $r->jabatan ?></td>

									<td>
										<script>
											function ChooseContact<?php echo $a ?>(data) {
												if ($("#piket<?php echo $a ?>").val() == "1") {
													document.getElementById("ket<?php echo $a ?>").disabled = true;
												} else if ($("#piket<?php echo $a ?>").val() == "2") {
													document.getElementById("ket<?php echo $a ?>").disabled = true;
												} else if ($("#piket<?php echo $a ?>").val() == "3") {
													document.getElementById("ket<?php echo $a ?>").disabled = true;
												} else if ($("#piket<?php echo $a ?>").val() == "4") {
													document.getElementById("ket<?php echo $a ?>").disabled = false;

												}

											}
										</script>
										<select name="piket[<?php echo $a; ?>]" required id="piket<?php echo $a ?>" onchange="ChooseContact<?php echo $a ?>(this)" class="form-control" data-placeholder="Pilih Piket" style="width: 100%">
											<option value="">--
												Pilih Piket --</option>
											<?php
											$se_id = $this->db->query("SELECT tb_dropdown_piket.id_piket,nama,GROUP_CONCAT(tgl_piket) as tgl_piket from tb_dropdown_piket 
										LEFT JOIN tb_piket on tb_piket.id_piket=tb_dropdown_piket.id_piket
										GROUP BY nama ORDER BY tb_dropdown_piket.id_piket ASC");
											foreach ($se_id->result() as $k) {
												if (preg_match(date('Y-06-23'), $k->tgl_piket)) {
													echo "<option value='" . $k->id_piket . " selected' >" . $k->nama . "</option>";
												} elseif ($r->piket == $k->id_piket) {
													echo "<option value='" . $k->id_piket . "' selected>" . $k->nama . "</option>";
												} else {
													echo "<option value='" . $k->id_piket . "' >" . $k->nama . "</option>";
												}
											} ?>
										</select>

									</td>
									<td>
										<input type="text" id="ket<?php echo $a ?>" name="ket[<?php echo $a++; ?>]" class="form-control" disabled placeholder="Keterangan" autocomplete="off">
									</td>

								</tr>
							<?php
							} ?>
						</tbody>
					</table>
					<div class="modal-footer">

						<button type="submit" class="btn btn-ms btn-primary" name="submit" value="submit" id="addpelanggan-btn"><span class="fas fa-plus mr-1"></span>Simpan</button>
					</div>

				<?php }
				?>

				</div>
		</div>
	</div>


</div>
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