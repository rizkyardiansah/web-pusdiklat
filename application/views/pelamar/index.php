  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container position-relative text-center text-lg-left" data-aos="zoom-in" data-aos-delay="100">
      <div class="row">
        <div class="col-lg-8">
          <h1>Selamat datang di <span>Pusdiklat Perpusnas</span></h1>
          <h2>Silahkan klik tombol dibawah untuk daftar magang</h2>

          <div class="btns">
            <a href="#specials" class="btn-menu animated fadeInUp scrollto">Daftar magang</a>
          </div>
        </div>

      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">
    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Alur pendaftaran</h2>
          <p>Alur pendaftaran peserta magang</p>
        </div>

        <div class="row">

          <div class="col-lg-2">
            <div class="box" data-aos="zoom-in" data-aos-delay="100">
              <span>01</span>
              <h4 style="font-size:100%">Mengakses website pusdiklat</h4>

            </div>
          </div>

          <div class="col-lg-2 mt-2 mt-lg-0">
            <div style="height: 93%" class="box" data-aos="zoom-in" data-aos-delay="200">
              <span>02</span>
              <h4 style="font-size:100%">Memilih unit kerja yang diinginkan</h4>

            </div>
          </div>

          <div class="col-lg-2 mt-2 mt-lg-0">
            <div class="box" data-aos="zoom-in" data-aos-delay="300">
              <span>03</span>
              <h4 style="font-size:100%">Mengisi form pendaftaran</h4>

            </div>
          </div>
          <div class="col-lg-2 mt-2 mt-lg-0">
            <div style="height: 93%" class="box" data-aos="zoom-in" data-aos-delay="200">
              <span>04</span>
              <h4 style="font-size:100%">Melengkapi dokumen</h4>

            </div>
          </div>

          <div class="col-lg-2 mt-2 mt-lg-0">
            <div class="box" data-aos="zoom-in" data-aos-delay="300">
              <span>05</span>
              <h4 style="font-size:100%">Menunggu balasan email</h4>

            </div>
          </div>

          <div class="col-lg-2 mt-2 mt-lg-0">
            <div style="height: 93%" class="box" data-aos="zoom-in" data-aos-delay="300">
              <span>06</span>
              <h4 style="font-size:100%">Mengikuti magang sesuai jadwal</h4>

            </div>
          </div>

        </div>

      </div>
    </section><!-- End Why Us Section -->

    <!-- ======= Specials Section ======= -->
    <section id="specials" class="specials" style="overflow: visible;">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Tempat magang</h2>
          <p>Daftar unit kerja</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-3" style="height: 450px; overflow-x: hidden; overflow-y: auto;">
            <ul class="nav nav-tabs flex-column">

              <?php foreach ($unit_kerja as $unit) : ?>
                <li class="nav-item">
                  <a class="nav-link <?= ($unit['id'] == 1) ? "active" : ""; ?> show" data-toggle="tab" href="#tab-<?= $unit['id']; ?>"><?= $unit['nama']; ?></a>
                </li>
              <?php endforeach; ?>

            </ul>
          </div>
          <div class="col-lg-9 mt-4 mt-lg-0">
            <div class="tab-content">

              <?php foreach ($unit_kerja as $unit) : ?>
                <div class="tab-pane <?= ($unit['id'] == 1) ? "active" : ""; ?> show" id="tab-<?= $unit['id']; ?>">
                  <div class="row">
                    <div class="col-lg-8 details order-2 order-lg-1">
                      <h3><?= $unit['nama']; ?></h3>
                      <p class="font-italic"><?= $unit['keterangan']; ?></p>
                    </div>
                    <div class="col-lg-4 text-lg-left order-1 order-lg-2">
                      <!-- <h5>Kuota yang tersedia</h5>
                      <p>10 orang.</p> -->
                      <?php if ($dataLengkap == FALSE) : ?>
                        <h5 class="text-danger">Data anda belum lengkap.</h5>
                        <a class="btn rounded-pill btn-secondary disabled" role="button" style="width: 60%;  color: #000; font-weight: bold;" href="#">Daftar</a>
                      <?php elseif (in_array($unit['id'], $unitTerdaftar)) : ?>
                        <h5 class="text-success">Anda telah melamar pada unit kerja ini.</h5>
                        <a class="btn rounded-pill btn-secondary disabled" role="button" style="width: 60%;  color: #000; font-weight: bold;" href="#">Daftar</a>
                      <?php else : ?>
                        <a class="btn rounded-pill btn-primary" style="width: 60%;  color: #000; font-weight: bold;" href="<?= base_url('pelamar/daftar/') . $unit['id']; ?>">Daftar</a>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>

            </div>
          </div>
        </div>

      </div>
    </section><!-- End Specials Section -->
  </main><!-- End #main -->