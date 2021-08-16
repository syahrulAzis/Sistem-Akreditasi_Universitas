<!-- Forgot Password -->

<div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>


    <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">

        <div class="container-fluid">
            <div class="d-flex align-items-center">
                <div class="site-logo mr-auto w-25"><a href="<?= base_url('auth') ?>">LP3M UBP</a></div>

                <div class="mx-auto text-center">
                    <nav class="site-navigation position-relative text-right" role="navigation">
                        <ul class="site-menu main-menu js-clone-nav mx-auto d-none d-lg-block  m-0 p-0">
                            <li><a href="#home-section" class="nav-link">Beranda</a></li>
                            <li><a href="#courses-section" class="nav-link">Kegiatan</a></li>
                            <li><a href="#programs-section" class="nav-link">Program</a></li>
                            <li><a href="#teachers-section" class="nav-link">Pengajar</a></li>
                        </ul>
                    </nav>
                </div>

                <div class="ml-auto w-25">
                    <nav class="site-navigation position-relative text-right" role="navigation">
                        <ul class="site-menu main-menu site-menu-dark js-clone-nav mr-auto d-none d-lg-block m-0 p-0">
                            <li class="cta"><a href="#contact-section" class="nav-link"><span>Hubungi Kami</span></a></li>
                        </ul>
                    </nav>
                    <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black float-right"><span class="icon-menu h3"></span></a>
                </div>
            </div>
        </div>

    </header>

    <div class="intro-section" id="home-section">

        <div class="slide-1" style="background-image: url('<?php echo base_url(); ?>assets/images/oneschool/slider_1.jpg');" data-stellar-background-ratio="0.5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="row align-items-center">
                            <div class="col-lg-6 mb-4">
                                <h1 data-aos="fade-up" data-aos-delay="100">Hai, selamat datang</h1>
                                <p class="mb-4" data-aos="fade-up" data-aos-delay="200">Lembaga Pengembangan Pendidikan dan Penjaminan Mutu Universitas Buana Perjuangan Karawang.</p>
                                <p data-aos="fade-up" data-aos-delay="300"><a href="<?= site_url('auth'); ?>" class="btn btn-primary py-3 px-5 btn-pill">MASUK</a></p>

                            </div>
                            <!-- Form Login-->

                            <div class="col-lg-5 ml-auto" data-aos="fade-up" data-aos-delay="500">
                                <?= $this->session->flashdata('pesan'); ?>
                                <form action="<?= base_url('auth/forgotpassword'); ?>" method="POST" class="form-box">
                                    <h3 class="h4 text-black mb-4">Lupa kata sandi ?</h3>

                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                                            </div>
                                            <input type="text" name="email" class="form-control" placeholder="Masukan Email kamu" value="<?= set_value('email'); ?>">
                                        </div>
                                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary btn-pill mt-3" type="submit">RESET</button>
                                    </div>

                                </form>
                            </div>

                            <!-- Akhir Form Login-->
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>



    <div class="site-section courses-title" id="courses-section">
        <div class="container">
            <div class="row mb-5 justify-content-center">
                <div class="col-lg-7 text-center" data-aos="fade-up" data-aos-delay="">
                    <h2 class="section-title">Kegiatan</h2>
                    <p style="color:white;">Berikut merupakan kegiatan yang telah terlaksana guna mendukung mutu pendidikan di Indonesia</p>
                </div>
            </div>
        </div>
    </div>
    <div class="site-section courses-entry-wrap" data-aos="fade-up" data-aos-delay="100">
        <div class="container">
            <div class="row">

                <div class="owl-carousel col-12 nonloop-block-14">

                    <?php
                    $no = 1;
                    foreach ($kegiatan as $k) { ?>
                        <div class="course bg-white h-100 align-self-stretch">
                            <figure class="m-0">
                                <a href="course-single.html"><img src="<?php echo base_url(); ?>unggah/kegiatan/<?php echo $k['file']; ?>" alt="Image" class="img-fluid"></a>
                            </figure>
                            <div class="course-inner-text py-4 px-4">
                                <span class="course-price"></span>
                                <div class="meta"><span class="fa fa-clock-o"></span><?php echo $k['waktu_kegiatan']; ?></div>
                                <h3><a href="<?php echo site_url('auth/blog/' . $k['link_blog']); ?>"><?php echo $k['judul_kegiatan']; ?></a></h3>
                                <p><?php echo $k['des_kegiatan']; ?></p>
                            </div>
                            <div class="d-flex border-top stats">
                                <div class="py-3 px-4"><span class="fa fa-users"></span> <?php echo $k['peserta_kegiatan']; ?> Orang</div>
                                <div class="py-3 px-4 w-25 ml-auto border-left"><span class="fa fa-comment"></span> 0</div>
                            </div>
                        </div>
                    <?php } ?>

                </div>



            </div>
            <div class="row justify-content-center">
                <div class="col-7 text-center">
                    <button class="customPrevBtn btn btn-primary m-1">Sebelumnya</button>
                    <button class="customNextBtn btn btn-primary m-1">Selanjutnya</button>
                </div>
            </div>
        </div>
    </div>


    <div class="site-section" id="programs-section">
        <div class="container">
            <div class="row mb-5 justify-content-center">
                <div class="col-lg-7 text-center" data-aos="fade-up" data-aos-delay="">
                    <h2 class="section-title">Program Kami</h2>
                    <p>Kami memiliki berbagai program untuk meningkatkan kualitas pendidikan dan menjamin mutu untuk keberlangsungan pendidikan</p>
                </div>
            </div>
            <div class="row mb-5 align-items-center">
                <div class="col-lg-7 mb-5" data-aos="fade-up" data-aos-delay="100">
                    <img src="<?php echo base_url(); ?>assets/images/oneschool/undraw_youtube_tutorial.svg" alt="Image" class="img-fluid">
                </div>
                <div class="col-lg-4 ml-auto" data-aos="fade-up" data-aos-delay="200">
                    <h2 class="text-black mb-4">Pendidikan berbasis daring</h2>
                    <p class="mb-4">Penggunaan media daring untuk pembelajaran yang lebih fleksibel.</p>

                    <div class="d-flex align-items-center custom-icon-wrap mb-3">
                        <span class="custom-icon-inner mr-3"><span class="icon fa  fa-play-circle"></span></span>
                        <div>
                            <h3 class="m-0">22,931 Jam sudah ditonton</h3>
                        </div>
                    </div>

                    <div class="d-flex align-items-center custom-icon-wrap">
                        <span class="custom-icon-inner mr-3"><span class="icon fa fa-upload"></span></span>
                        <div>
                            <h3 class="m-0">150 Vidio diunggah setiap minggunya</h3>
                        </div>
                    </div>

                </div>
            </div>

            <div class="row mb-5 align-items-center">
                <div class="col-lg-7 mb-5 order-1 order-lg-2" data-aos="fade-up" data-aos-delay="100">
                    <img src="<?php echo base_url(); ?>assets/images/oneschool/undraw_teaching.svg" alt="Image" class="img-fluid">
                </div>
                <div class="col-lg-4 mr-auto order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
                    <h2 class="text-black mb-4">Strategi pembelajaran terbaik</h2>
                    <p class="mb-4">Proses belajar yang menarik untuk memudahkan dalam pemahaman.</p>

                    <div class="d-flex align-items-center custom-icon-wrap mb-3">
                        <span class="custom-icon-inner mr-3"><span class="icon fa fa-mortar-board"></span></span>
                        <div>
                            <h3 class="m-0">2,000 Lulusan Terbaik Setiap Tahun</h3>
                        </div>
                    </div>

                    <div class="d-flex align-items-center custom-icon-wrap">
                        <span class="custom-icon-inner mr-3"><span class="icon fa fa-trophy"></span></span>
                        <div>
                            <h3 class="m-0">150 Penghargaan Lebih</h3>
                        </div>
                    </div>

                </div>
            </div>

            <div class="row mb-5 align-items-center">
                <div class="col-lg-7 mb-5" data-aos="fade-up" data-aos-delay="100">
                    <img src="<?php echo base_url(); ?>assets/images/oneschool/undraw_teacher.svg" alt="Image" class="img-fluid">
                </div>
                <div class="col-lg-4 ml-auto" data-aos="fade-up" data-aos-delay="200">
                    <h2 class="text-black mb-4">Pendidikan berbasis kompetensi</h2>
                    <p class="mb-4">Dosen dan guru besar dari universitas ternama dan kerjasama perusahan multi nasional.</p>

                    <div class="d-flex align-items-center custom-icon-wrap mb-3">
                        <span class="custom-icon-inner mr-3"><span class="icon fa fa-institution"></span></span>
                        <div>
                            <h3 class="m-0">2,931 Tenaga Pendidik</h3>
                        </div>
                    </div>

                    <div class="d-flex align-items-center custom-icon-wrap">
                        <span class="custom-icon-inner mr-3"><span class="icon fa fa-cubes"></span></span>
                        <div>
                            <h3 class="m-0">150 Perusahaan Kerjasama</h3>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <div class="site-section" id="teachers-section">
        <div class="container">

            <div class="row mb-5 justify-content-center">
                <div class="col-lg-7 mb-5 text-center" data-aos="fade-up" data-aos-delay="">
                    <h2 class="section-title">Pengajar</h2>
                    <p class="mb-5">Tingkatkan keahlianmu dengan pembelajaran yang lebik atraktif bersama pengajar yang lebih berpengalaman</p>
                </div>
            </div>

            <div class="row">

                <div class="owl-carousel col-12 nonloop-block-14">

                    <?php
                    $no = 1;
                    foreach ($pengajar as $p) { ?>
                        <div class="teacher text-center">
                            <img src="<?php echo base_url(); ?>unggah/profile/<?php echo $p['image']; ?>" alt="Image" class="img-fluid w-50 rounded-circle mx-auto mb-4">
                            <div class="py-2">
                                <h3 class="text-black"><?php echo $p['name']; ?></h3>
                                <p class="position">DOSEN
                                    <?php
                                    $idp = $p['prodi_id'];
                                    $this->db->from('prodi');
                                    $this->db->where('id_prodi', $idp);
                                    $query = $this->db->get();

                                    if ($query->num_rows() > 0) {
                                        foreach ($query->result() as $na) {
                                            echo $na->nama_prodi;
                                        }
                                    } else {
                                        echo 'null';
                                    }
                                    ?>
                                </p>
                                <p><?php echo $p['bio_user']; ?>.</p>
                            </div>
                        </div>

                    <?php } ?>

                </div>

            </div>
            <div class="row justify-content-center">
                <div class="col-7 text-center">
                    <button class="customPrevBtn btn btn-primary m-1">Prev</button>
                    <button class="customNextBtn btn btn-primary m-1">Next</button>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section bg-image overlay" style="background-image: url('<?php echo base_url(); ?>assets/images/oneschool/slider_1.jpg');">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-8 text-center testimony">
                    <img src="<?php echo base_url(); ?>assets/images/ilhamhadi.JPG" alt="Image" class="img-fluid w-25 mb-4 rounded-circle">
                    <h3 class="mb-4">Ilham Masykuri Hadi</h3>
                    <blockquote>
                        <p>&ldquo; Lebih baik tidak tidur dari pada mengulang tahun depan &rdquo;</p>
                    </blockquote>
                </div>
            </div>
        </div>
    </div>


    <div class="site-section bg-light" id="contact-section">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-md-7">

                    <h2 class="section-title mb-3">Hubungi Kami</h2>
                    <p class="mb-5">Jangan ragu, temukan jawaban dari pertanyaanmu dengan menghubungi kami.</p>

                    <form action="<?= base_url('auth/layanan_pelanggan'); ?>" method="post" data-aos="fade">
                        <div class="form-group row">
                            <div class="col-md-6 mb-3 mb-lg-0">
                                <input type="text" name="nama_depan" id="nama_depan" class="form-control" placeholder="Nama depan">
                                <?= form_error('nama_depan', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="nama_belakang" id="nama_belakang" class="form-control" placeholder="Nama belakang">
                                <?= form_error('nama_belakang', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input type="text" name="subjek" id="subjek" class="form-control" placeholder="Subjek">
                                <?= form_error('subjek', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <textarea class="form-control" name="pesan" id="pesan" cols="30" rows="10" placeholder="Tulis pesan kamu disini..."></textarea>
                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">

                                <input type="submit" class="btn btn-primary py-3 px-5 btn-block btn-pill" value="Kirim Pesan">
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>


    <footer class="footer-section bg-white">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-12">
                    <div class="border-top pt-5">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        <p class="footer-text">Copyright ©<?php echo date('Y'); ?> All rights reserved | Created by <a href="https://www.instagram.com/_ilhamhadi/" target="_blank"><i class="fa fa-instagram"></i> Ilhamhadi</a></p>
                        <p>
                            <a href="<?= site_url('auth/tnc'); ?>">Syarat & Ketentuan</a>
                        </p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </div>
                </div>

            </div>
        </div>
    </footer>

</div> <!-- .site-wrap -->