<!-- side content -->
<div id="layoutSidenav_content">
	<main>
		<div class="container-fluid px-4 mb-3">
			<h1 class="mt-4">Form Surat</h1>
			<ol class="breadcrumb mb-4">
				<li class="breadcrumb-item active"></li>
			</ol>
			<form method="" action>
				<div class="row">
					<div class="col-md-6">
						<div class="card">
							<div class="card-header">
								DATA PELAMAR
							</div>
							<div class="card-body">
								<div class="row">
									<div class="form-group">
										<label for="nama">Nama Pelamar</label>
										<input type="text" class="form-control" id="nama" placeholder="Nama Lengkap" readonly>
									</div>
								</div>
								<div class="form-group">
									<label for="inputAddress">Program Studi</label>
									<input type="text" name="prodi" class="form-control" id="inputAddress" placeholder="Program Studi" readonly>
								</div>
								<div class="form-group">
									<label for="inputAddress2">Fakultas</label>
									<input type="text" name="fakultas" class="form-control" id="inputAddress2" placeholder="Fakultas" readonly>
								</div>
                                <div class="form-group">
									<label for="instansi">Instansi</label>
									<input type="text" name="fakultas" class="form-control" id="instansi" placeholder="Instansi" readonly>
								</div>
								<div class="form-group ">
									<label for="inputCity">Nomor Telepon / WhatsApp</label>
									<input type="text" class="form-control" placeholder="Nomor Telepon" id="inputCity" readonly>
								</div>
								<div class="form-group">
									<label for="inputState">Unit Kerja</label>
									<input type="text" class="form-control" placeholder="Unit Kerja" id="inputCity" readonly>
								</div>
                            </div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="card">
							<div class="card-header">
								DATA SURAT
							</div>
							<div class="card-body">
                                    <div class="form-group">
									<div class="row">
										<div class="col-md-6">
											<label for="no_surat_permohonan">Nomor Surat Permohonan</label>
											<input type="text" class="form-control" id="no_surat_permohonan" placeholder="No Surat Permohonan">
										</div>
										<div class="col-md-6">
											<label for="hal_surat">Hal</label>
											<input type="text" class="form-control" id="hal_surat" placeholder="Tanggal Permohonan">
										</div>
									</div>
								</div>
                                <div class="form-group">
									<div class="row">
                                        <div class="col-md-6">
											<label for="no_surat_balasan">Nomor Surat Balasan</label>
											<input type="text" class="form-control" id="no_surat_balasan" placeholder="No Surat Permohonan">
										</div>
										<div class="col-md-6">
											<label for="jumlah_lampiran">Jumlah Lampiran</label>
											<input type="text" class="form-control" id="jumlah_lampiran" placeholder="Tanggal Permohonan">
										</div>
									</div>
								</div>
                                <div class="form-group">
                                    <div class="form-group">
											<label for="kepada">Kepada</label>
											<input type="text" class="form-control" id="kepada" placeholder="Kepada Yth">	
									</div>
								</div>
                                <div class="form-group">
									<div class="row">
                                        <div class="col-md-6">
											<label for="tanggal_surat_permohonan">Tanggal Surat Permohonan</label>
											<input type="date" class="form-control" id="tanggal_surat_permohonan" placeholder="Tanggal Surat Permohonan">
										</div>
										<div class="col-md-6">
											<label for="jangka_waktu">Jangka Waktu Magang</label>
											<input type="text" class="form-control" id="jangka_waktu" placeholder="per bulan">
										</div>
									</div>
								</div>
									<div class="row">
						                <div class="form-group">
							                <div class=" text-black mb-4">
                                                <label for="tembusan">Tembusan</label>
                                                <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="tembusan1" id="tembusan1">
                                                    <option selected>Kepala Perpustakan Nasional RI</option>
                                                    <option value="1">Sekretaris Utama Perpustakaan Nasional RI</option>
                                                    <option value="2">Deputi Bidang Pengembangan Bahan Pustaka dan Jasa Informasi</option>
                                                    <option value="3">Deputi Bidang Pengembangan Sumber Daya Perpustakaan</option>
                                                    <option value="4"> </option>
                                                </select>
                                                <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="tembusan2" id="tembusan2">>
                                                    <option selected>Sekretaris Utama Perpustakaan Nasional RI</option>
                                                    <option value="1">Kepala Perpustakan Nasional RI</option>
                                                    <option value="2">Deputi Bidang Pengembangan Bahan Pustaka dan Jasa Informasi</option>
                                                    <option value="3">Deputi Bidang Pengembangan Sumber Daya Perpustakaan</option>
                                                    <option value="4"> </option>
                                                </select>
                                                <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="tembusan3" id="tembusan3">>
                                                    <option selected> </option>
                                                    <option value="1">Kepala Perpustakan Nasional RI</option>
                                                    <option value="2">Sekretaris Utama Perpustakaan Nasional RI</option>
                                                    <option value="3">Deputi Bidang Pengembangan Bahan Pustaka dan Jasa Informasi</option>
                                                    <option value="4">Deputi Bidang Pengembangan Sumber Daya Perpustakaan</option>
                                                </select>
                                                <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="tembusan4" id="tembusan4">>
                                                    <option selected></option>
                                                    <option value="1">Kepala Perpustakan Nasional RI</option>
                                                    <option value="2">Sekretaris Utama Perpustakaan Nasional RI</option>
                                                    <option value="3">Deputi Bidang Pengembangan Bahan Pustaka dan Jasa Informasi</option>
                                                    <option value="4">Deputi Bidang Pengembangan Sumber Daya Perpustakaan</option>
                                                </select>
							                    <input type="text" name="tembusan5" class="form-control" id="tembusan5" placeholder="Tembusan 5">
							                </div>
                                            <div class="row">
                                                <div class="form-group col-md-6 ">
                                                    <a class="btn btn-primary col-md-6" type="button" href="<?= base_url('pusat/index') ?>"><i aria-hidden="true"></i>
												        Kembali
											        </a>
									            </div>
                                                <div class="form-group col-md-6 text-end justify-content-center">
										            <button type="submit" class="btn btn-primary col-md-6">Submit</button>
									            </div>
                                            </div>
						                </div>
                                    </div>
								</div>
							</div>
						</div>
					</div>
			</form>
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
