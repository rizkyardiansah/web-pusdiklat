<main id="main">
    <!-- sweetalert2 -->
    <?php if ($this->session->flashdata('flash')) : ?>
        <div id="flashdata" data-title="<?= $this->session->flashdata('flash')['title']; ?>" data-text="<?= $this->session->flashdata('flash')['text']; ?>" data-icon="<?= $this->session->flashdata('flash')['icon']; ?>"></div>
    <?php unset($_SESSION['flash']);
    endif; ?>

    <section>
        <div class="container" data-aos="fade-up" style="margin-top: 6%;">

            <div class="section-title">
                <h2>Pendaftaran Magang</h2>
                <p><?= $unit_kerja['nama']; ?></p>
            </div>

            <div class="row" data-aos="fade-up" data-aos-delay="100">
                <div class="col-lg-9 ">

                    <?= form_open_multipart('pelamar/daftar/' . $unit_kerja['id']) ?>
                    <div class="row justify-content-around">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="label" for="nama">Nama Lengkap</label>
                                <input class="form-control" type="text" id="nama" name="nama" value="<?= form_error('nama') || set_value('nama') ? set_value('nama') : $user['nama']; ?>">
                                <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="label" for="universitas">Universitas</label>
                                <input class="form-control" type="text" id="universitas" name="universitas" value="<?= form_error('universitas') || set_value('universitas') ? set_value('universitas') : $user['universitas']; ?>">
                                <?= form_error('universitas', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-around">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="label" for="nim">Nomor Induk Mahasiswa</label>
                                <input class="form-control" type="text" id="nim" name="nim" value="<?= form_error('nim') || set_value('nim') ? set_value('nim') : $user['nim']; ?>">
                                <?= form_error('nim', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="label" for="semester">Semester</label>
                                <select class="form-control" id="semester" name="semester">
                                    <option disabled selected>--PILIH--</option>
                                    <?php for ($i = 1; $i <= 14; $i++) : ?>
                                        <?php if ((set_value('semester') != null && set_value('semester') == $i) || (set_value('semester') == null && $user['semester'] == $i)) : ?>
                                            <option value="<?= $i; ?>" selected><?= $i; ?></option>
                                        <?php else : ?>
                                            <option value="<?= $i; ?>"><?= $i; ?></option>
                                        <?php endif; ?>
                                    <?php endfor; ?>
                                </select>
                                <?= form_error('semester', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-around">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="label" for="fakultas">Fakultas</label>
                                <input class="form-control" type="text" id="fakultas" name="fakultas" value="<?= form_error('fakultas') || set_value('fakultas') ? set_value('fakultas') : $user['fakultas']; ?>">
                                <?= form_error('fakultas', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="label" for="prodi">Program Studi</label>
                                <input class="form-control" type="text" id="prodi" name="prodi" value="<?= form_error('prodi') || set_value('prodi') ? set_value('prodi') : $user['prodi']; ?>">
                                <?= form_error('prodi', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-around">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="label" for="no_telp">No.Telp/WhatsApp</label>
                                <input class="form-control" type="text" id="no_telp" name="no_telp" value="<?= form_error('no_telp') || set_value('no_telp') ? set_value('no_telp') : $user['no_telpon']; ?>">
                                <?= form_error('no_telp', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="label" for="email">Email</label>
                                <input class="form-control" type="text" id="email" name="email" value="<?= $user['email']; ?>" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="label" for="unit_kerja">Unit Kerja</label>
                        <input class="form-control" type="text" id="unit_kerja" name="unit_kerja" value="<?= $unit_kerja['nama']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label class="label" for="no_surat">Nomor Surat Permohonan Magang</label>
                        <input class="form-control" type="text" id="no_surat" name="no_surat" value="<?= form_error('no_surat') || set_value('no_surat') ? set_value('no_surat') : $user['no_surat_permohonan']; ?>">
                        <?= form_error('no_surat', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="row justify-content-around">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="label" for="surat_permohonan">Surat Permohonan Magang</label>
                                <input class="form-control-file" type="file" id="surat_permohonan" name="surat_permohonan">
                                <?= form_error('surat_permohonan', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="label" for="khs">Kartu Hasil Studi</label>
                                <input class="form-control-file" type="file" id="khs" name="khs">
                                <?= form_error('khs', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="label" for="cv">Curriculum Vitae</label>
                                <input class="form-control-file" type="file" id="cv" name="cv">
                                <?= form_error('cv', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                    </div>
                    <small>Ketentuan file:</small>
                    <ul>
                        <li><small>Bertipe data PDF</small></li>
                        <li><small>Berukuran kurang dari 2 MB</small></li>
                    </ul>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="pernyataan" name="pernyataan">
                        <label class="form-check-label" for="pernyataan">
                            Saya menyatakan bahwa data yang saya masukan merupakan data yang faktual dan saya akan bertanggung jawab apabila terjadi ketidaksesuaian pada data saya
                        </label>
                        <?= form_error('pernyataan', '<small class="text-danger">', '</small>'); ?>

                    </div>
                    <div class="row justify-content-end mt-2">
                        <a class="btn btn-light ml-2" href="<?= base_url('pelamar/index') . "#specials"; ?>">Pilih Unit Kerja Lain</a>
                        <button class="btn btn-primary ml-2" name="submitDaftar" value="submit" type="submit">Kirim Lamaran</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>