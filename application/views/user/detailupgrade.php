<!-- partial -->
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Detail Pengajuan Peningkatan Akun</h4>
                            <?php echo form_open_multipart(); ?>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" name="user_email" id="user_email" value="<?= $userupgrade['user_email']; ?>" readonly>
                                <?= form_error('user_email', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Pesan</label>
                                <input type="text" class="form-control" name="pesan" id="pesan" value="<?= $userupgrade['pesan']; ?>" readonly>
                                <?= form_error('pesan', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label>User Id</label>
                                <input type="text" class="form-control" name="user_id" id="user_id" value="<?= $userupgrade['user_id']; ?>" readonly>
                                <?= form_error('user_id', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Dibuat</label>
                                <input type="text" class="form-control" name="waktu" id="waktu" value="<?= $userupgrade['waktu']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Izin</label>
                                <input type="text" class="form-control" name="role_id" id="role_id" value="<?= $userupgrade['role_id']; ?>" readonly>
                                <?= form_error('role_id', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <input type="text" class="form-control" name="status" id="status" value="<?= $userupgrade['status']; ?>">
                                <?= form_error('status', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2">Foto</label>
                                <div class="col-sm">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <a href="<?= base_url('unggah/upgrade/') . $userupgrade['file']; ?>" target="_blank">
                                                <img src="<?= base_url('unggah/upgrade/') . $userupgrade['file']; ?>" class="img-thumbnail">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                            <a type="button" class="btn btn-light" href="<?php echo site_url('user/requestuser'); ?>">Kembali</a>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>