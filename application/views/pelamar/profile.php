<<<<<<< HEAD
<section>
    <div class="container" data-aos="fade-up" style="margin-top: 6%;">

        <div class="section-title">
            <h2>Profil Pengguna</h2>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-5">
                <div class="row justify-content-around">
                    <div class="col-lg-4"><img src="<?= base_url('assets/img/') . 'logo.jpg'; ?>" class="img-thumbnail"></div>
                    <div class="col-lg-8">
                        <h5><?= $user['nama']; ?></h5>
                        <p><?= $user['email']; ?></p>
                    </div>
                </div>
                <br>
                <div class="col-lg-12">
                    <ul class="nav nav-tabs flex-column">
                        <li class="nav-item">
                            <a class="nav-link active show" data-toggle="tab" href="#tab-1">Data Pribadi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link show" data-toggle="tab" href="#tab-2">Pendidikan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link show" data-toggle="tab" href="#tab-3">Berkas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link show" data-toggle="tab" href="#tab-4">Keluar</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-7 ">
                <h2>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Molestiae iste maxime ullam in quae nulla, blanditiis exercitationem, tempora fugit eaque quod earum id inventore provident aperiam, quo enim sed! Excepturi!</h2>
            </div>
        </div>
    </div>
</section>
=======
<main id="main">
    <section id="specials" class="specials" style="margin-top: 6%">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Profil Pengguna</h2>
            </div>

            <div class="row" data-aos="fade-up" data-aos-delay="100">
                <div class="col-lg-5">
                    <ul class="nav nav-tabs flex-column profile">
                        <li>
                            <div class="row">
                                <div class="col-lg-3"><img src="<?= base_url('assets/img/') . 'default.jpg'; ?>" class="img-thumbnail" style="height: 5rem;"></div>
                                <div class="col-lg-9">
                                    <h5><?= $user['nama']; ?></h5>
                                    <p><?= $user['email']; ?></p>
                                </div>
                            </div>
                            <br>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active show" data-toggle="tab" id="button-1" href="#tab-1">Informasi Pribadi</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" id="button-2" href="#tab-2">Informasi Akademik</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" id="button-3" href="#tab-3">Berkas</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" id="button-4" href="#tab-4">Akun</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" id="button-5" href="#tab-5">Keluar</a>
                        </li>

                    </ul>
                </div>
                <div class="col-lg-7 mt-4 mt-lg-0">
                    <div class="tab-content profile">
                        <div class="tab-pane active show" id="tab-1">
                            <div class="row">
                                <div class="col-lg-10 details order-2 order-lg-1">
                                    <h3>Informasi pribadi</h3>
                                    <!-- <hr> -->
                                    <form action="" method="POST">
                                        <div class="form-group">
                                            <label class="label" for="nama">Nama</label>
                                            <input class="form-control" type="text" id="nama" name="nama" value="<?= form_error('nama') || set_value('nama') ? set_value('nama') : $user['nama']; ?>">
                                            <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                                        </div>

                                        <div class="form-group">
                                            <label class="label" for="email">Email</label>
                                            <input class="form-control" type="text" id="email" name="email" value="<?= $user['email']; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label class="label" for="no_telp">No.Telp/WhatsApp</label>
                                            <input class="form-control" type="text" id="no_telp" name="no_telp" value="<?= form_error('no_telp') || set_value('no_telp') ? set_value('no_telp') : $user['no_telpon']; ?>">
                                            <?= form_error('no_telp', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                        <button class="btn btn-primary float-right" name="submitInfoPribadi" id="submitInfoPribadi" value="submitInfoPribadi">Simpan perubahan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab-2">
                            <div class="row">
                                <div class="col-lg-10 details order-2 order-lg-1">
                                    <h3>Informasi Akademik</h3>
                                    <!-- <hr> -->
                                    <form action="" method="POST" id="infoAkad">
                                        <div class="form-group">
                                            <label class="label" for="universitas">Universitas</label>
                                            <input class="form-control" type="text" id="universitas" name="universitas" value="<?= form_error('universitas') || set_value('universitas') ? set_value('universitas') : $user['universitas']; ?>">
                                            <?= form_error('universitas', '<small class="text-danger">', '</small>'); ?>
                                        </div>

                                        <div class="form-group">
                                            <label class="label" for="nim">Nomor Induk Mahasiswa</label>
                                            <input class="form-control" type="text" id="nim" name="nim" value="<?= form_error('nim') || set_value('nim') ? set_value('nim') : $user['nim']; ?>">
                                            <?= form_error('nim', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label class="label" for="fakultas">Fakultas</label>
                                            <input class="form-control" type="text" id="fakultas" name="fakultas" value="<?= form_error('fakultas') || set_value('fakultas') ? set_value('fakultas') : $user['fakultas']; ?>">
                                            <?= form_error('fakultas', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label class="label" for="prodi">Program Studi</label>
                                            <input class="form-control" type="text" id="prodi" name="prodi" value="<?= form_error('prodi') || set_value('prodi') ? set_value('prodi') : $user['prodi']; ?>">
                                            <?= form_error('prodi', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label class="label" for="semester">Semester</label>
                                            <select class="form-control" id="semester" name="semester">
                                                <?php for ($i = 1; $i <= 14; $i++) : ?>
                                                    <?php if ((set_value('semester') != null && set_value('semester') == $i) || (set_value('semester') == null && $user['semester'] == $i)) : ?>
                                                        <option value="<?= $i; ?>" selected><?= $i; ?></option>
                                                    <?php else : ?>
                                                        <option value="<?= $i; ?>"><?= $i; ?></option>
                                                    <?php endif; ?>
                                                <?php endfor; ?>
                                            </select>
                                        </div>
                                        <button class="btn btn-primary float-right" id="submitInfoAkad" name="submitInfoAkad" value="submitInfoAkad">Simpan perubahan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab-3" style="max-height: 800px;">
                            <div class="row">
                                <div class="col-lg-10 details order-2 order-lg-1">
                                    <h3>Berkas</h3>

                                    <h6>Surat permohonan magang</h6>
                                    <div id="suratUploadDisplay" class="container" style="border-style: dotted; height: fit-content;">
                                        <div class="input-group mb-3 mt-3">
                                            <?= form_open_multipart('pelamar/edit/' . 'suratPermohonan/' . $user['id']) ?>
                                            <p>Pilih berkas Surat Permohonan Magang anda lalu tekan tombol "Unggah surat".</p>
                                            <div class="custom-file mb-3">
                                                <input type="file" class="custom-file-input" id="inputSurat" name="inputSurat">
                                                <label class="custom-file-label" for="inputSurat">Pilih berkas</label>
                                            </div>
                                            <button type="button" class="btn btn-success btn-sm mr-2" id="batal-surat">Batalkan perubahan</button>
                                            <button type="submit" class="btn btn-primary btn-sm mr-2" id="unggah-surat">Unggah surat</button>
                                            </form>
                                        </div>
                                    </div>

                                    <div id="suratNormalDisplay" class="container" style="border-style: dotted; height: fit-content;">
                                        <p class="mt-3"><?= $user['nama_file_surat_permohonan']; ?></p>
                                        <a class="btn btn-primary btn-sm mb-3 mr-2" href="<?= base_url('pelamar/download/') . 'suratPermohonan/' . $user['id']; ?>">Unduh berkas</a>
                                        <button type="button" class="btn btn-success btn-sm mb-3 mr-2" id="ubah-surat">Ubah berkas</button>
                                        <a class="btn btn-danger btn-sm mb-3 mr-2 hapus-berkas" href="<?= base_url('pelamar/delete/')  . 'suratPermohonan/' . $user['id']; ?>">Hapus berkas</a>
                                    </div>

                                    <br>

                                    <h6>Kartu hasil studi</h6>
                                    <div id="khsUploadDisplay" class="container" style="border-style: dotted; height: fit-content;">
                                        <div class="input-group mb-3 mt-3">
                                            <?= form_open_multipart('pelamar/edit/' . 'khs/' . $user['id']) ?>
                                            <p>Pilih berkas Kartu Hasil Studi anda lalu tekan tombol "Unggah KHS".</p>
                                            <div class="custom-file mb-3">
                                                <input type="file" class="custom-file-input" id="inputKhs" name="inputKhs">
                                                <label class="custom-file-label" for="inputKhs">Pilih berkas</label>
                                            </div>
                                            <button type="button" class="btn btn-success btn-sm mr-2" id="batal-khs">Batalkan perubahan</button>
                                            <button type="submit" class="btn btn-primary btn-sm mr-2" id="unggah-khs">Unggah KHS</button>
                                            </form>
                                        </div>
                                    </div>

                                    <div id="khsNormalDisplay" class="container" style="border-style: dotted; height: fit-content;">
                                        <p class="mt-3"><?= $user['nama_file_khs']; ?></p>
                                        <a class="btn btn-primary btn-sm mb-3 mr-2" href="<?= base_url('pelamar/download/') . 'khs/' . $user['id']; ?>">Unduh berkas</a>
                                        <button type="button" class="btn btn-success btn-sm mb-3 mr-2" id="ubah-khs">Ubah berkas</button>
                                        <a class="btn btn-danger btn-sm mb-3 mr-2 hapus-berkas" href="<?= base_url('pelamar/delete/')  . 'khs/' . $user['id']; ?>">Hapus berkas</a>
                                    </div>

                                    <br>

                                    <h6>Curriculum Vitae</h6>
                                    <div id="cvUploadDisplay" class="container" style="border-style: dotted; height: fit-content;">
                                        <div class="input-group mb-3 mt-3">
                                            <?= form_open_multipart('pelamar/edit/' . 'cv/' . $user['id']) ?>
                                            <p>Pilih berkas Curriculum Vitae anda lalu tekan tombol "Unggah CV".</p>
                                            <div class="custom-file mb-3">
                                                <input type="file" class="custom-file-input" id="inputCv" name="inputCv">
                                                <label class="custom-file-label" for="inputCv">Pilih berkas</label>
                                            </div>
                                            <button type="button" class="btn btn-success btn-sm mr-2" id="batal-cv">Batalkan perubahan</button>
                                            <button type="submit" class="btn btn-primary btn-sm mr-2" id="unggah-cv">Unggah CV</button>
                                            </form>
                                        </div>
                                    </div>

                                    <div id="cvNormalDisplay" class="container" style="border-style: dotted; height: fit-content;">
                                        <p class="mt-3"><?= $user['nama_file_cv']; ?></p>
                                        <a class="btn btn-primary btn-sm mb-3 mr-2" href="<?= base_url('pelamar/download/') . 'cv/' . $user['id']; ?>">Unduh berkas</a>
                                        <button type="button" class="btn btn-success btn-sm mb-3 mr-2" id="ubah-cv">Ubah berkas</button>
                                        <a class="btn btn-danger btn-sm mb-3 mr-2 hapus-berkas" href="<?= base_url('pelamar/delete/')  . 'cv/' . $user['id']; ?>">Hapus berkas</a>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="tab-4">
                            <div class="row">
                                <div class="col-lg-8 details order-2 order-lg-1">
                                    <h3>Akun</h3>
                                    <p class="font-italic">Keluar.</p>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="tab-5">
                            <div class="row">
                                <div class="col-lg-8 details order-2 order-lg-1">
                                    <h3>Keluar</h3>
                                    <p class="font-italic">Keluar.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</main>
>>>>>>> e44c7da4aee921af692bac68746d953f160ce100
