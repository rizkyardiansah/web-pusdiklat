		<!-- side content -->
		<div id="layoutSidenav_content" class="content-menu">
			<main>
				<div class="container-fluid px-4">
					<h1 class="mt-4">Menu Persetujuan</h1>
					<ol class="breadcrumb mb-4">
						<li class="breadcrumb-item active">Data yang telah disetujui</li>
					</ol>
					<div class="row">
						<div class="col-md-12">
							<table class="table table-hover">
								<thead>
									<tr>
										<th scope="col">No</th>
										<th scope="col" class="text-center">Tanggal Pengajuan</th>
										<th scope="col">Nama Lengkap</th>
										<th scope="col">Instansi</th>
										<th scope="col">Kelengkapan Berkas</th>
										<th scope="col">Status</th>
										<th scope="col" class="text-center">Tanggal Persetujuan</th>
										<th scope="col">Keterangan</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($approval as $dataApprovement) :
									?>
										<tr>
											<td><?= $no++; ?></td>
											<td><?= $dataApprovement['tanggal_permohonan']; ?></td>
											<td><?= $dataApprovement['nama_pelamar']; ?></td>
											<td><?= $dataApprovement['nama_unit']; ?></td>
											<td>
												<?= $dataApprovement['nama_file_surat_permohonan']; ?>
												<br>
												<?= $dataApprovement['nama_file_khs']; ?>
												<br>
												<?= $dataApprovement['nama_file_cv']; ?>
											</td>
											<td>
												<span class="badge bg-success text-black">
													<?= $dataApprovement['status']; ?>
												</span>
											</td>

											<td><?= $dataApprovement['tanggal_persetujuan']; ?></td>
											<td><?= $dataApprovement['ket']; ?></td>
										</tr>
									<?php endforeach; ?>
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

		</div>