<aside class="main-sidebar sidebar-dark-primary elevation-4">

	<a href="<?php echo base_url() ?>" class="brand-link">
		<img src="<?php echo base_url('assets/template/dist') ?>/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
		<span class="brand-text font-weight-light">PARDI</span>
	</a>

	<div class="sidebar">

		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="info">
				<a href="#" class="d-block"><?php echo $this->session->userdata('nama') ?></a>
			</div>
		</div>


		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

				<?php if ($this->session->userdata('posisi') == '1') : ?>
					<li class="nav-item">
						<a href="<?php echo base_url('index.php/absensi/index') ?>" class="nav-link <?php if ($this->uri->segment("2") == 'index') {
																										echo 'active';
																									} ?>">
							<i class="nav-icon fas fa-edit"></i>
							Input Absensi
						</a>
					</li>


				<?php elseif ($this->session->userdata('posisi') == '2') : ?>
					<li class="nav-item">
						<a href="<?php echo base_url('index.php/absensi/history') ?>" class="nav-link <?php if ($this->uri->segment("2") == 'history') {
																											echo 'active';
																										} ?>">
							<i class="nav-icon fas fa-edit"></i>
							History Absensi
						</a>
					</li>
				<?php endif; ?>
				<li class="nav-item">
					<a href="<?php echo base_url('index.php/user/index') ?>" class="nav-link <?php if ($this->uri->segment("1") == 'user') {
																									echo 'active';
																								} ?>">
						<i class="nav-icon fas fa-edit"></i>
						User
					</a>
				</li>
			</ul>
		</nav>

	</div>

</aside>