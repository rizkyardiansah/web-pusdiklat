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
