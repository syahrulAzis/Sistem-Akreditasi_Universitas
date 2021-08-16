<!-- partial -->
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Tambah Pengguna</h4>
                            <form action="<?= base_url('user/add'); ?>" method="POST">
                                <?php echo form_open_multipart('user/add'); ?>
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" class="form-control" name="name" id="name">
                                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email" id="email">
                                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Kata Sandi</label>
                                    <input type="password" class="form-control" name="password1" id="password1">
                                    <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Ulangi Kata Sandi</label>
                                    <input type="password" class="form-control" name="password2" id="password2">
                                    <?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Fakultas</label>
                                    <select class="js-example-basic-single w-100" name="fakultas_id" id="fakultas_id" required>
                                        <option value="">No Selected</option>
                                        <?php foreach ($fakultas as $f) : ?>
                                            <option value="<?= $f['id_fakultas']; ?>"><?= $f['nama_fakultas']; ?></option>
                                        <? endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Program Studi</label>
                                    <select class="js-example-basic-single w-100" name="prodi_id" id="prodi_id" required>
                                        <option value="">No Selected</option>
                                        <?php
                                        foreach ($prodi as $p) : ?>
                                            <option value="<?= $p['id_prodi']; ?>"><?= $p['nama_prodi']; ?></option>
                                        <? endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Izin</label>
                                    <select class="js-example-basic-single w-100" name="role_id" id="role_id" required>
                                        <?php foreach ($role as $r) : ?>
                                            <option value="<?= $r['id']; ?>"><?= $r['role']; ?></option>
                                        <? endforeach; ?>
                                    </select>
                                </div>
                                <hr>
                                <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                                <a type="button" class="btn btn-light" href="<?php echo site_url('user'); ?>">Kembali</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
