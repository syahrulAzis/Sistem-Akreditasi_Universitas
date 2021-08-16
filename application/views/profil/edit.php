<!-- partial -->
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Sunting Profil</h4>
                            <?php echo form_open_multipart('profil/edit'); ?>
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control" name="name" id="name" value="<?= $user['name']; ?>">
                                <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" class="form-control" name="address" id="address" value="<?= $user['address']; ?>">
                                <?= form_error('address', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Bio</label>
                                <input type="text" class="form-control" name="bio_user" id="bio_user" value="<?= $user['bio_user']; ?>" placeholder="maksimal 50 karakter">
                                <?= form_error('address', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Nomor Induk</label>
                                <input type="text" class="form-control" name="no" id="no" value="<?= $user['no']; ?>">
                                <?= form_error('no', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" id="email" value="<?= $user['email']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Dibuat</label>
                                <input type="text" class="form-control" name="date_created" id="date_created" value="<?= date('d F Y', $user['date_created']); ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>No Telephone</label>
                                <input type="text" class="form-control" name="phone" id="phone" value="<?= $user['phone']; ?>">
                                <?= form_error('phone', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Fakultas</label>
                                <select class="js-example-basic-single w-100" name="fakultas_id" id="fakultas_id" required>
                                    <?php foreach ($fakultas as $f) : ?>
                                        <option value="<?= $f['id_fakultas']; ?>"><?= $f['nama_fakultas']; ?></option>
                                    <? endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Program Studi</label>
                                <select class="js-example-basic-single w-100" name="prodi_id" id="prodi_id" required>
                                    <?php foreach ($prodi as $p) : ?>
                                        <option value="<?= $p['id_prodi']; ?>"><?= $p['nama_prodi']; ?></option>
                                    <? endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2">Foto</label>
                                <div class="col-sm">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <img src="<?= base_url('unggah/profile/') . $user['image']; ?>" class="img-thumbnail">
                                        </div>
                                        <div class="col-sm-10">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="image" name="image">
                                                <label for="image" class="custom-file-label">Pilih foto</label>
                                                <p><i>* upload dengan format <b>jpg</b></i></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                            <a type="button" class="btn btn-light" href="<?php echo site_url('profil'); ?>">Kembali</a>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>