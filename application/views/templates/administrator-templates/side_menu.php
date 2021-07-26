<!-- side menu -->
<div id="layoutSidenav">
	<div id="layoutSidenav_nav">
		<nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
			<div class="sb-sidenav-menu">
				<div class="nav">
					<div class="sb-sidenav-menu-heading">Daftar Menu Admin Unit</div>
					<a class="nav-link" href="<?= base_url('unitkerja/index'); ?>">
						<div class="sb-nav-link-icon "><i class="fa fa-tasks" aria-hidden="true"></i></div>
						Verifikasi
						<span class="badge bg-danger text-light mx-3">
							12
						</span>
					</a>
					<a class="nav-link" href="<?= base_url('unitkerja/approval'); ?>">
						<div class="sb-nav-link-icon">
							<i class="fa fa-check" aria-hidden="true"></i>
						</div>
						Data yang telah disetujui
					</a>
					<a class="nav-link" href="<?= base_url('unitkerja/rejection'); ?>">
						<div class="sb-nav-link-icon">
							<i class="fas fa-ban"></i>
						</div>
						Data yang tidak disetujui
					</a>

					<div class="sb-sidenav-menu-heading">Daftar Menu Admin Pusat</div>
					<a class="nav-link" href="<?= base_url('pusat/daftarpelamar'); ?>">
						<div class="sb-nav-link-icon "><i class="fa fa-tasks" aria-hidden="true"></i></div>
						Daftar Pelamar
						<span class="badge bg-danger text-light mx-3">
							12
						</span>
					</a>
					<a class="nav-link" href="<?= base_url('pusat/approval'); ?>">
						<div class="sb-nav-link-icon">
							<i class="fa fa-check" aria-hidden="true"></i>
						</div>
						Data yang telah disetujui
					</a>
					<a class="nav-link" href="<?= base_url('pusat/rejection'); ?>">
						<div class="sb-nav-link-icon">
							<i class="fas fa-ban"></i>
						</div>
						Data yang tidak disetujui
					</a>

				</div>

				</div>

		</nav>
	</div>
	<!-- side menu -->