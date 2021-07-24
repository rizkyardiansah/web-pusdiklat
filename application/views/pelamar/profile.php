<main id="main">
    <section id="specials" class="specials" style="margin-top: 6%">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Profil Pengguna</h2>
            </div>

            <div class="row" data-aos="fade-up" data-aos-delay="100">
                <div class="col-lg-5">
                    <ul class="nav nav-tabs flex-column">
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
                            <a class="nav-link active show" data-toggle="tab" href="#tab-1">Informasi Pribadi</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tab-2">Informasi Akademik</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tab-3">Berkas</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tab-4">Akun</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tab-5">Keluar</a>
                        </li>

                    </ul>
                </div>
                <div class="col-lg-7 mt-4 mt-lg-0">
                    <div class="tab-content">
                        <div class="tab-pane active show" id="tab-1">
                            <div class="row">
                                <div class="col-lg-10 details order-2 order-lg-1">
                                    <h3>Informasi pribadi</h3>
                                    <!-- <hr> -->
                                    <form action="" method="POST">
                                        <div class="form-group">
                                            <label class="label" for="nama">Nama</label>
                                            <input class="form-control" type="text" id="nama" name="nama" value="<?= $user['nama']; ?>">
                                        </div>

                                        <div class="form-group">
                                            <label class="label" for="email">Email</label>
                                            <input class="form-control" type="text" id="email" name="email" value="<?= $user['email']; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label class="label" for="no_telp">No.Telp/WhatsApp</label>
                                            <input class="form-control" type="text" id="no_telp" name="no_telp" value="<?= $user['no_telpon']; ?>">
                                        </div>
                                        <button class="btn btn-primary float-right">Simpan perubahan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab-2">
                            <div class="row">
                                <div class="col-lg-8 details order-2 order-lg-1">
                                    <h3>Informasi Akademik</h3>
                                    <!-- <hr> -->
                                    <form action="" method="POST">
                                        <div class="form-group">
                                            <label class="label" for="universitas">Universitas</label>
                                            <input class="form-control" type="text" id="universitas" name="universitas" value="<?= $user['universitas']; ?>">
                                        </div>

                                        <div class="form-group">
                                            <label class="label" for="nim">Nomor Induk Mahasiswa</label>
                                            <input class="form-control" type="text" id="nim" name="nim" value="<?= $user['nim']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label class="label" for="fakultas">Fakultas</label>
                                            <input class="form-control" type="text" id="fakultas" name="fakultas" value="<?= $user['fakultas']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label class="label" for="prodi">Program Studi</label>
                                            <input class="form-control" type="text" id="prodi" name="prodi" value="<?= $user['prodi']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label class="label" for="semester">Semester</label>
                                            <select class="form-control" id="semester" name="semester">
                                                <?php for ($i = 1; $i <= 14; $i++) : ?>
                                                    <?php if ($user['semester'] == $i) : ?>
                                                        <option value="<?= $i; ?>" selected><?= $i; ?></option>
                                                    <?php else : ?>
                                                        <option value="<?= $i; ?>"><?= $i; ?></option>
                                                    <?php endif; ?>
                                                <?php endfor; ?>
                                            </select>
                                        </div>
                                        <button class="btn btn-primary float-right">Simpan perubahan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab-3" style="height: 550px;">
                            <div class="row">
                                <div class="col-lg-8 details order-2 order-lg-1">
                                    <h3>Berkas</h3>
                                    <form action="" method="POST">
                                        <h6>Surat permohonan magang</h6>
                                        <div class="container" style="border-style: dotted; height: 30%">
                                            <p class="mt-2">SuratPermohonanMagang.pdf</p>
                                            <button type="button" class="btn btn-primary btn-sm mb-2">Ubah berkas</button>
                                        </div>

                                        <br>

                                        <h6>Kartu hasil studi</h6>
                                        <div class="container" style="border-style: dotted; height: 30%">
                                            <p class="mt-2">KHS.pdf</p>
                                            <button type="button" class="btn btn-primary btn-sm mb-2">Ubah berkas</button>
                                        </div>

                                        <br>

                                        <h6>Curriculum Vitae</h6>
                                        <div class="container" style="border-style: dotted; height: 30%">
                                            <p class="mt-2">CV.pdf</p>
                                            <button type="button" class="btn btn-primary btn-sm mb-2">Ubah berkas</button>
                                        </div>

                                        <button class="btn btn-primary float-right mt-2">Simpan perubahan</button>
                                    </form>
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