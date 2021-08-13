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
										<label for="input">Nama Pelamar</label>
										<input type="text" class="form-control" id="nama" placeholder="Nama Lengkap" readonly>
									</div>
								</div>
								<div class="form-group">
									<label for="input">Program Studi</label>
									<input type="text" name="prodi" class="form-control" id="prodi" placeholder="Program Studi" readonly>
								</div>
								<div class="form-group">
									<label for="input">Fakultas</label>
									<input type="text" name="fakultas" class="form-control" id="fakultas" placeholder="Fakultas" readonly>
								</div>
                                <div class="form-group">
									<label for="input">Universitas</label>
									<input type="text" name="universitas" class="form-control" id="Univesitas" placeholder="Universitas" readonly>
								</div>
								<div class="form-group ">
									<label for="input">Nomor Telepon / WhatsApp</label>
									<input type="text" name="no_telepon" class="form-control" placeholder="Nomor Telepon" id="no_telepon" readonly>
								</div>
								<div class="form-group">
									<label for="input">Unit Kerja</label>
									<input type="text" name="id_unit" class="form-control" placeholder="Unit Kerja" id="id_unit" readonly>
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
											<label for="input">Nomor Surat Permohonan</label>
											<input type="text" class="form-control" id="no_surat_permohonan" placeholder="No Surat Permohonan">
										</div>
										<div class="col-md-6">
											<label for="input">Hal</label>
											<input type="text" class="form-control" id="hal_surat" placeholder="Tanggal Permohonan">
										</div>
									</div>
								</div>
                                <div class="form-group">
									<div class="row">
                                        <div class="col-md-6">
											<label for="input">Nomor Surat Balasan</label>
											<input type="text" class="form-control" id="no_surat_balasan" placeholder="No Surat Permohonan">
										</div>
										<div class="col-md-6">
											<label for="input">Jumlah Lampiran</label>
											<input type="text" class="form-control" id="jumlah_lampiran" placeholder="Tanggal Permohonan">
										</div>
									</div>
								</div>
                                <div class="form-group">
                                    <div class="form-group">
											<label for="input">Kepada</label>
											<input type="text" class="form-control" id="kepada" placeholder="Kepada Yth">	
									</div>
								</div>
								<div class="form-group ">
									<div class="form-group">
										<label for="input" class="mx-2">Alasan Diterima/Ditolak</label>
										<textarea class="form-control" aria-label="With textarea"  name="alasan" >asdasdasdasdasdasdas </textarea>
									</div>
								</div>
                                <div class="form-group">
									<div class="row">
                                        <div class="col-md-6">
											<label for="input">Tanggal Surat Permohonan</label>
											<input type="date" class="form-control" id="tanggal_surat_permohonan" placeholder="Tanggal Surat Permohonan">
										</div>
										<div class="col-md-6">
											<label for="input">Jangka Waktu Magang</label>
											<input type="text" class="form-control" id="jangka_waktu" placeholder="per bulan">
										</div>
									</div>
								</div>
									<div class="row">
						                <div class="form-group">
							                <div class=" text-black mb-4">
                                                <label for="input">Tembusan</label>
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
