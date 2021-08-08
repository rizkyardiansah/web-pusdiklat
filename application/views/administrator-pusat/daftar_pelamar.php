		<!-- side content -->
		<div id="layoutSidenav_content">
			<main>
				<div class="container-fluid px-4">
					<h1 class="mt-4">Menu Cetak Surat</h1>
					<ol class="breadcrumb mb-4">
						<li class="breadcrumb-item active"></li>
					</ol>
					
					<!-- Data Table -->
					<div class="row">
						<div class="col-md-12">
							<table class="table table-hover">
								<thead>
									<tr>
										<th scope="col">No</th>
										<th scope="col">Tanggal Pengajuan</th>
										<th scope="col">Nama Lengkap</th>
										<th scope="col">Instansi</th>
										<th scope="col" class="text-center">Unit Kerja</th>
										<th scope="col">Kelengkapan Berkas</th>
										<th scope="col">Status</th>
										<th scope="col" class="text-center">Aksi</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<th scope="row">1</th>
										<td>12 Agustus 2021</td>
										<td>Jacob</td>
										<td>Thornton</td>
										<td>Pusat Pendidikan dan Pelatihan</td>
										<td>
											Berkas CV.pdf
											<br>
											Berkas khs.pdf
											<br>
											Nama surat magang.pdf
										</td>
										<td><span class="badge bg-success  text-white">Disetujui</span></td>
										</td>
										<td colspan='2' class="text-center">
											<a class="btn btn-sm  btn-danger" type="button" href="<?= base_url('pusat/formsurat') ?>"><i aria-hidden="true"></i>
												Form Surat
											</a>
											<div class="dropdown show dropleft">
												<a class="btn btn-light dropdown-toggle" href="<?= base_url("root/pdf/")  ?>" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													<img src="<?= base_url("assets/img/printer.png"); ?>" width="25" data-toggle="tooltip" title="Cetak Surat">
												</a>
											<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
												<a class="dropdown-item" href="<?= base_url("root/pdf/") ?>" class="btn btn-sm" target="_blank">Disetujui</a>
												<a class="dropdown-item" href="<?= base_url("root/pdf2/")?>" class="btn btn-sm" target="_blank">Ditolak</a>
											</div>
											</div>
										</td>
									</tr>
									<tr>
										<th scope="row">2</th>
										<td>12 Agustus 2021</td>
										<td>Jacob</td>
										<td>Thornton</td>
										<td>Pusat Pembinaan Perpustakawan</td>
										<td>
											Berkas CV.pdf
											<br>
											Berkas khs.pdf
											<br>
											Nama surat magang.pdf
										</td>
										<td><span class="badge bg-success  text-white">Disetujui</span></td>
										</td>
										<td colspan='2' class="text-center">
											<a class="btn btn-sm  btn-danger" type="button" href="<?= base_url('pusat/formsurat') ?>"><i aria-hidden="true"></i>
												Form Surat
											</a>
											<div class="dropdown show dropleft">
												<a class="btn btn-light dropdown-toggle" href="<?= base_url("root/pdf/")  ?>" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													<img src="<?= base_url("assets/img/printer.png"); ?>" width="25" data-toggle="tooltip" title="Cetak Surat">
												</a>
											<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
												<a class="dropdown-item" href="<?= base_url("root/pdf/") ?>" class="btn btn-sm" target="_blank">Disetujui</a>
												<a class="dropdown-item" href="<?= base_url("root/pdf2/")?>" class="btn btn-sm" target="_blank">Ditolak</a>
											</div>
											</div>
										</td>
									</tr>
									<tr>
										<th scope="row">3</th>
										<td>12 Agustus 2021</td>
										<td>Jacob</td>
										<td>Thornton</td>
										<td>Pusat Analisis Perpustakaan dan Pengembangan Budaya Baca</td>
										<td>
											Berkas CV.pdf
											<br>
											Berkas khs.pdf
											<br>
											Nama surat magang.pdf
										</td>
										<td><span class="badge bg-danger  text-white">Ditolak</span></td>
										</td>
										<td colspan='2' class="text-center">
											<a class="btn btn-sm  btn-danger" type="button" href="<?= base_url('pusat/formsurat') ?>"><i aria-hidden="true"></i>
												Form Surat
											</a>
											<div class="dropdown show dropleft">
												<a class="btn btn-light dropdown-toggle" href="<?= base_url("root/pdf/")  ?>" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													<img src="<?= base_url("assets/img/printer.png"); ?>" width="25" data-toggle="tooltip" title="Cetak Surat">
												</a>
											<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
												<a class="dropdown-item" href="<?= base_url("root/pdf/") ?>" class="btn btn-sm" target="_blank">Disetujui</a>
												<a class="dropdown-item" href="<?= base_url("root/pdf2/")?>" class="btn btn-sm" target="_blank">Ditolak</a>
											</div>
											</div>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<!-- pagination section -->
					<div class="row">
						<nav aria-label="Page navigation example">
							<ul class="pagination">
								<li class="page-item">
									<a class="page-link" href="#" aria-label="Previous">
										<span aria-hidden="true">&laquo;</span>
										<span class="sr-only">Previous</span>
									</a>
								</li>
								<li class="page-item"><a class="page-link" href="#">1</a></li>
								<li class="page-item"><a class="page-link" href="#">2</a></li>
								<li class="page-item"><a class="page-link" href="#">3</a></li>
								<li class="page-item">
									<a class="page-link" href="#" aria-label="Next">
										<span aria-hidden="true">&raquo;</span>
										<span class="sr-only">Next</span>
									</a>
								</li>
							</ul>
						</nav>
					</div>
				</div>
			</main>
			<footer class="py-4 bg-light mt-auto">
				<div class="container-fluid px-4">
					<div class="d-flex align-items-center justify-content-between small text-center">
						<div>Sistem Informasi Permagangan Perpusnas</div>
					</div>
				</div>
			</footer>
		</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>