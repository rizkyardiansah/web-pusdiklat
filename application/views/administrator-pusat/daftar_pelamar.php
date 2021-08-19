		<!-- side content -->
		<div id="layoutSidenav_content">
			<main>
				<div class="container-fluid px-4">
					<h1 class="mt-4">Menu Penyuratan</h1>
					<p> Daftar status pelamar yang telah disetujui dan ditolak</p>
					<form class="d-none d-md-inline-block form-inline ms-auto me-4 me-md-3 my-2 my-md-0" action="<?= base_url('pusat/index') ?>" method='post'>
						<div class="row d-flex">
							<div class="col-md-6 mr-auto p-2">
								<div class="input-group ">
									<input class="form-control" name="pelamar" type="text" placeholder="Cari Nama Pelamar" aria-label="Search for..." aria-describedby="btnNavbarSearch" />
									<button class="btn btn-success " id="btnNavbarSearch" type="submit"><i class="fas fa-search"></i></button>
								</div>
							</div>
							<div class="col-md-6 mr-auto p-2">
								<div class="input-group">
									<input type="month" name="tanggal_permohonan" class="form-control">
									<div class="input-group-append px-2">
										<button class="btn btn-secondary" type="submit">Lihat Data</button>
									</div>
								</div>
							</div>
					</form>
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
										<th scope="col" class="text-center">Status</th>
										<th scope="col" class="text-center">Keterangan</th>
										<th scope="col" class="text-center">Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($permohonan as $data_verifikasi) : ?>
										<tr>
											<td><?= $no++; ?></td>
											<td><?= indo_date($data_verifikasi['tanggal_permohonan']); ?></td>
											<td><?= $data_verifikasi['nama_pelamar']; ?></td>
											<td><?= $data_verifikasi['universitas']; ?></td>
											<td><?= $data_verifikasi['nama_unit']; ?></td>
											<td>
												<a href="<?= base_url('pusat/downloadKelengkapanBerkas/') . 'suratPermohonan/' . $data_verifikasi['id_permohonan']; ?>" target="_blank"><?= $data_verifikasi['nama_file_surat_permohonan']; ?></a>
												<br>
												<a href="<?= base_url('pusat/downloadKelengkapanBerkas/') . 'khs/' . $data_verifikasi['id_permohonan']; ?>" target="_blank"><?= $data_verifikasi['nama_file_khs']; ?></a>
												<br>
												<a href="<?= base_url('pusat/downloadKelengkapanBerkas/') . 'cv/' . $data_verifikasi['id_permohonan']; ?>" target="_blank"><?= $data_verifikasi['nama_file_cv']; ?></a>
											</td>
											<td>
												<?php if ($data_verifikasi['status'] == 'Ditolak') { ?>
													<span class="badge bg-danger text-white mx-3">
														<?= $data_verifikasi['status']; ?>
													</span>
												<?php } else { ?>
													<span class="badge bg-success text-white mx-3">
														<?= $data_verifikasi['status']; ?>
													</span>
												<?php } ?>
											</td>
											<td> <?= $data_verifikasi['ket']; ?> </td>
											<td class="text-center">
												<?php if ($data_verifikasi['no_surat_balasan'] == null) : ?>
													<a class="btn btn-sm  btn-danger outer" type="button" href="<?= base_url('pusat/formsurat/' . $data_verifikasi['id_permohonan']); ?>" data-diperiksa="true"><i aria-hidden="true"></i>
														Form Surat
													</a>
												<?php endif; ?>
												<?php if ($data_verifikasi['status'] == 'Ditolak') { ?>
													<div class="form-group">
														<div class="form-group">
															<a class="btn btn-light " href="<?= base_url("pusat/downloadSuratDitolak/" . $data_verifikasi['id_surat_balasan'])  ?>" role="button" target="_blank">
																<i class="fas fa-print"></i>
															</a>

														<?php } else { ?>
															<a class="btn btn-light " href="<?= base_url("pusat/downloadSuratDisetujui/" . $data_verifikasi['id_surat_balasan'])  ?>" role="button" target="_blank">
																<i class="fas fa-print"></i>
															</a>
														<?php } ?>
														<?php
														if ($data_verifikasi['is_uploaded'] === 'FALSE') :
														?>
															<button type="button" class="btn btn-warning btn-upload-show" value="<?= $data_verifikasi['id_surat_balasan'] ?>">
																<i class="fas fa-upload"></i>
															</button>
															<form action="<?= base_url('pusat/uploadsurat/' . $data_verifikasi['id_surat_balasan']); ?>" method="POST">
																<div class="form-group form-upload">
																	<input class="form-control-file " type="file" id="surat_permohonan" name="surat_permohonan">
																	<?= form_error('surat_permohonan', '<small class="text-danger">', '</small>'); ?>
																	<button type="submit" class="btn btn-light btn-sm btn-upload">
																		Upload
																	</button>
																</div>
															</form>
														<?php endif; ?>
											</td>
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