<?php $this->load->view('template/block_header') ?>

<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center text-center error-page bg-primary">
            <div class="row flex-grow">
                <div class="col-lg-7 mx-auto text-white">
                    <div class="row align-items-center d-flex flex-row">
                        <div class="col-lg-6 text-lg-right pr-lg-4">
                            <h1 class="display-1 mb-0 text-white">403</h1>
                        </div>
                        <div class="col-lg-6 error-page-divider text-lg-left pl-lg-4">
                            <h2 class="text-white">MAAF!</h2>
                            <h3 class="font-weight-light text-white">Akses tidak diijinkan.</h3>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-12 text-center mt-xl-2">
                            <a type="button" class="btn btn-light btn-rounded btn-fw" href="<?= site_url('profil'); ?>">Kembali ke beranda</a>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="container">
                            <div class="row text-center">
                                <div class="col-md-12">
                                    <div class="pt-5">
                                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                        <p class="footer-text">Copyright ©<?php echo date('Y'); ?> All rights reserved | Created by <a href="https://www.instagram.com/_ilhamhadi/" target="_blank"><i class="fa fa-instagram"></i> Ilhamhadi</a></p>
                                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>