<!-- partial -->
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Tingkatkan Akun</h4>
                            <?php echo form_open_multipart('profil/upgrade'); ?>
                            <div class="form-group">
                                <label>Tingkatkan ke :</label>
                                <select class="js-example-basic-single w-100" name="role_id" id="role_id" required>
                                    <?php foreach ($role as $r) : ?>
                                        <option value="<?= $r['id']; ?>"><?= $r['role']; ?></option>
                                    <? endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Pesan</label>
                                <input type="text" class="form-control" name="pesan" id="pesan">
                                <?= form_error('pesan', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label>User ID :</label>
                                <input type="text" class="form-control" name="user_id" id="user_id" value="<?= $user['id']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Email :</label>
                                <input type="text" class="form-control" name="user_email" id="user_email" value="<?= $user['email']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2">Foto</label>
                                <div class="col-sm">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <img src="<?= base_url('unggah/upgrade/verify.png'); ?>" class="img-thumbnail">
                                        </div>
                                        <div class="col-sm-10">
                                            <div class="custom-file">
                                                <?php echo form_upload('image', null, 'id="image" class="custom-file-input"'); ?>
                                                <label for="file" class="custom-file-label">Pilih foto</label>
                                                <p><i>* upload kartu identitas dengan format <b>jpg</b></i></p>
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