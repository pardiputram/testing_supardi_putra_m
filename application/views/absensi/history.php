<style>
	.p {
		border: 2px solid black;
	}
</style>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$('a[href^="#"]').on('click', function(event) {
			var targets = $(this).attr('href');

			if (targets.match(/detail.*/)) {
				var newurl = targets.split("|");
				var date = newurl[1];
				var piket = newurl[2];
				document.cookie = "date=" + date;
				$.ajax({
					url: "<?php echo site_url('absensi/detail_history') ?>",

					data: {
						'date': date,
						'piket': piket
					},
					cache: false,
					success: function(data) {
						$("#demo").html(data);
					}
				});

			}
			$('.resume' + piket).toggle();

		});
	});
</script>

<div class="content-wrapper">

	<div class="container-fluid">
		<h4 class="my-1">History Absensi</h4>
		<div class="card mb-4">

			<div class="card-header">
				<div class="float-center d-inline">
					<form class="well form-search" style="text-align:left;padding: 5px" name="search">
						<div class="row" style="background-color: #f5f5f5;border-radius: 5px">
							<div class='col-sm-2'>
								<div class='form-group'>
									<label class="control-label" style="font-size:13px;">Pilih Tanggal</label>
									<div class="controls">
										<input id="tgl" name="tgl" class="form-control" placeholder="ID LAPOR" type="date" tabindex="1" autocomplete="off" value="<?php echo @$param['register'] ?>">
									</div>
								</div>
							</div>
							<div class="col-md-2">
								<div class='form-group'>
									<label class="control-label" for="example-daterange1">&nbsp;</label>
									<div class="input-group">
										<button class="btn btn-sm btn-primary" type="submit" name="submit" value="submit" tabindex="9" style="margin-left: 10px"><i class="fa fa-arrow-right"></i> Cari</button>
									</div>
								</div>
							</div>
						</div>
					</form>
					<div class="form-group p">
						<div class="form-group row">
							<label for="inputEmail3" class="col-sm-2 col-form-label">Total Piket Hadir </label>
							<?php $hadir = '#detail|' . $histori[0]->tgl_piket . '| 1'; ?>
							<div class="col-sm-4"><label style="margin-top: 8px;">
									: &nbsp;<a href="<?php echo $hadir ?>" id="inputEmail3"><?php echo $histori[0]->hadir ?></a>
								</label>
							</div>
							<label for="inputEmail3" class="col-sm-2 col-form-label">Total Lepas Piket </label>
							<?php $lepas = '#detail|' . $histori[0]->tgl_piket . '| 3'; ?>
							<div class="col-sm-4"><label style="margin-top: 8px;">
									: &nbsp;<a href="<?php echo $lepas ?>" id="inputEmail3"><?php echo $histori[0]->lepas ?></a>
								</label>
							</div>
						</div>
						<div class="form-group row">
							<label for="inputEmail3" class="col-sm-2 col-form-label">Total Cadangan Hadir </label>
							<?php $cadangan = '#detail|' . $histori[0]->tgl_piket . '| 2'; ?>
							<div class="col-sm-4"><label style="margin-top: 8px;">
									: &nbsp;<a href="<?php echo $cadangan ?>" id="inputEmail3"><?php echo $histori[0]->cadangan ?></a>
								</label>
							</div>
							<label for="inputEmail3" class="col-sm-2 col-form-label">Total Izin/sakit/dll Piket </label>
							<?php $izin = '#detail|' . $histori[0]->tgl_piket . '| 4'; ?>
							<div class="col-sm-4"><label style="margin-top: 8px;">
									: &nbsp;<a href="<?php echo $izin ?>" id="inputEmail3"><?php echo $histori[0]->tidak_hadir ?></a>
								</label>
							</div>
						</div>
					</div>

				</div>
				<div class="resume" id="detail">
					<div id='demo'></div>
				</div>
			</div>


		</div>
	</div>


</div>