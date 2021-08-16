<!-- partial -->
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Detail Pesan</h4><br>
                            <?php echo form_open_multipart(); ?>
                            <div class="form-group row">
                                <div class="col-md-6 mb-3 mb-lg-0">
                                    <label>Nama Depan</label>
                                    <input type="text" name="nama_depan" id="nama_depan" class="form-control" value="<?= $p['nama_depan']; ?>" readonly>
                                    <?= form_error('nama_depan', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="col-md-6">
                                    <label>Nama Belakang</label>
                                    <input type="text" name="nama_belakang" id="nama_belakang" class="form-control" value="<?= $p['nama_belakang']; ?>" readonly>
                                    <?= form_error('nama_belakang', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label>Subjek</label>
                                    <input type="text" name="subjek" id="subjek" class="form-control" value="<?= $p['subjek']; ?>" readonly>
                                    <?= form_error('subjek', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label>Email</label>
                                    <input type="email" name="email" id="email" class="form-control" value="<?= $p['email']; ?>" readonly>
                                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label>Isi Pesan</label>
                                    <?php echo form_textarea('pesan', $p['pesan'], 'class="form-control" readonly'); ?>
                                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label>Status Pesan</label>
                                    <select class="js-example-basic-single w-100" name="status_pesan" id="status_pesan">
                                        <option value="">Pleace update message ...</option>
                                        <option value="Sudah dibalas">Sudah dibalas</option>
                                        <option value="Kendala Teknis">Kendala Teknis</option>
                                        <option value="Tidak Selesai">Tidak Selesai</option>
                                    </select>
                                    <?= form_error('status_pesan', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                            <a type="button" class="btn btn-light" href="<?php echo site_url('user/layananpengguna'); ?>">Kembali</a>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>