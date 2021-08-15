		<!-- side content -->
		<div id="layoutSidenav_content">
			<main>
				<div class="container-fluid px-4">
					<h1 class="mt-4">Menu Penyuratan</h1>
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
										<th scope="col" class="text-center">Status</th>
										<th scope="col" class="text-center">Keterangan</th>
										<th scope="col" class="text-center">Aksi</th>
										<th scope="col" class="text-center">Upload Surat Jawaban</th>
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
												<?= $data_verifikasi['nama_file_surat_permohonan']; ?>
												<br>
												<?= $data_verifikasi['nama_file_khs']; ?>
												<br>
												<?= $data_verifikasi['nama_file_cv']; ?>
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
												<?php if ($data_verifikasi['id_surat_balasan'] == null) : ?>
													<a class="btn btn-sm  btn-danger outer" type="button" href="<?= base_url('pusat/formsurat/' . $data_verifikasi['id_permohonan']); ?>" data-diperiksa="true"><i aria-hidden="true"></i>
														Form Surat
													</a>
												<?php endif; ?>
												<?php if($data_verifikasi['status'] == 'Ditolak'){ ?>
													<div class="text-center">
														<a class="btn btn-light " href="<?= base_url("pusat/downloadSuratDitolak/" . $data_verifikasi['id_surat_balasan'])  ?>" role="button" target="_blank">
															<i class="fas fa-print"></i>
														</a>
													</div>
												<?php } else { ?>
														<a class="btn btn-light " href="<?= base_url("pusat/downloadSuratDisetujui/" . $data_verifikasi['id_surat_balasan'])  ?>" role="button" target="_blank">
															<i class="fas fa-print"></i>
														</a>
													</div>
													<?php } ?>
											</td>
											<td>
												<div class="text-left">
													<div class="col-lg-8">
														<div class="form-group">
															<input class="form-control-file" type="file" id="surat_permohonan" name="surat_permohonan">
															<?= form_error('surat_permohonan', '<small class="text-danger">', '</small>'); ?>
														</div>
													</div>
												</div>
												<div >
													<a class="btn btn-light" >
														Upload
													</a>
												</div> 
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
			<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
