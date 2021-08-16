<!-- partial -->
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <?php echo $this->session->flashdata('pesan'); ?>
            <div class="row profile-page">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="jumbotron text-gray">
                                <div class="d-md-flex justify-left-around">
                                    <div class="profile-info d-flex align-items-center">
                                        <img class="rounded-circle img-lg" src="<?php echo base_url('unggah/profile/') . $user['image']; ?>" alt="profile">
                                        <div class="wrapper pl-4">
                                            <h3 class="profile-user-name"><?= $user['name']; ?></h3>
                                            <div class="wrapper d-flex align-items-center">
                                                <p class="profile-user-designation">Anggota sejak <?= date('d F Y', $user['date_created']); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-0 grid-margin stretch-card d-flex justify-content-center">
                                <div class="media">
                                    <i class="fa fa-quote-left icon-lg text-info d-flex align-self-start mr-3"></i>
                                    <blockquote>
                                        <h1 class="display-4">
                                            <?php
                                            if ($user['bio_user'] == null) {
                                                echo 'jangan lupa lengkapi profil kamu ;)';
                                            } else {
                                                echo $user['bio_user'];
                                            }
                                            ?>
                                        </h1>
                                    </blockquote>
                                </div>
                            </div>
                            <div class="profile-body px-0">
                                <ul class="nav tab-switch" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="user-profile-info-tab" data-toggle="pill" href="#user-profile-info" role="tab" aria-controls="user-profile-info" aria-selected="true">Profil</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="user-profile-activity-tab" data-toggle="pill" href="#user-profile-activity" role="tab" aria-controls="user-profile-activity" aria-selected="false">Aktifitas</a>
                                    </li>
                                </ul>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="tab-content tab-body" id="profile-log-switch">
                                            <div class="tab-pane fade show active pr-3" id="user-profile-info" role="tabpanel" aria-labelledby="user-profile-info-tab">
                                                <table class="table table-borderless w-100 mt-4">
                                                    <?php
                                                    $no = 1;
                                                    foreach ($profil as $row) { ?>
                                                        <tr>
                                                            <td><strong>No Induk :</strong> <?= $row->no; ?></td>
                                                            <td><strong>Hak Akses :</strong> <?= $row->role; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Nama :</strong> <?= $row->name; ?></td>
                                                            <td><strong>Program Studi :</strong> <?= $row->nama_prodi; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Alamat :</strong> <?= $row->address; ?></td>
                                                            <td><strong>Fakultas :</strong> <?= $row->nama_fakultas; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Telephone :</strong> <?= $row->phone; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Email :</strong> <?= $row->email; ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                </table>
                                                <div class="row mt-5 pb-4 border-bottom pt-4 border-top">
                                                    <blockquote class="blockquote blockquote-primary w-100">
                                                        <p>Kamu masuk dengan alamat <?php echo $ip_address; ?> melalui peramban <?php echo $browser . ' - ' . $browser_version; ?> dengan sistem operasi <?php echo $os; ?>.</p>
                                                        <footer class="blockquote-footer">Seluruh perubahan akan dicatat dalam <cite title="Source Title">System log</cite></footer>
                                                    </blockquote>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="user-profile-activity" role="tabpanel" aria-labelledby="user-profile-activity-tab">
                                                <div class="row">
                                                    <div class="col-12 table-responsive">
                                                        <table id="order-listing" class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th></th>
                                                                    <th>Pesan</th>
                                                                    <th>Waktu</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $no = 1;
                                                                foreach ($log as $l) { ?>
                                                                    <tr>
                                                                        <td><i class="fa fa-dot-circle-o"></i></td>
                                                                        <td>
                                                                            <div class="event-alert"><?php echo $l['message']; ?></div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="event-info"><?php echo $l['log_timestamp']; ?></div>
                                                                        </td>
                                                                    </tr>
                                                                <?php } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- main-panel ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="../../vendors/js/vendor.bundle.base.js"></script>
<script src="../../vendors/js/vendor.bundle.addons.js"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="../../js/template.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="../../js/form-addons.js"></script>
<!-- End custom js for this page-->