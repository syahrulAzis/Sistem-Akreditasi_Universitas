<!-- partial -->
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <?php echo $this->session->flashdata('pesan'); ?>
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Sunting Sandi</h4>
                            <form action="<?= base_url('profil/changepassword'); ?>" method="POST">
                                <div class="form-group">
                                    <label>Sandi Lama</label>
                                    <input type="password" class="form-control" name="password" id="password" value="">
                                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Sandi Baru</label>
                                    <input type="password" class="form-control" name="password1" id="password1" value="">
                                    <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Ulangi Sandi Baru</label>
                                    <input type="password" class="form-control" name="password2" id="password2" value="">
                                    <?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <hr>
                                <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                                <a type="button" class="btn btn-light" href="<?php echo site_url('profil'); ?>">Kembali</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>