<!-- partial -->
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Basic form elements</h4>
                            <?php echo form_open_multipart(); ?>
                            <div class="form-group">
                                <label>Form Id</label>
                                <input type="number" name="pendidikan_id" class="form-control" value="<?= $lampiran['pendidikan_id']; ?>" required="required" placeholder="" readonly>
                            </div>
                            <div class="form-group">
                                <label>Nama Lampiran</label>
                                <?php echo form_input('nama_lampiran', $lampiran['nama_lampiran'], 'class="form-control" required="required" placeholder=""'); ?>
                            </div>
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <?php echo form_textarea('deskripsi_lampiran', $lampiran['deskripsi_lampiran'], 'class="form-control" required="required"'); ?>
                            </div>
                            <div class="form-group">
                                <label>File upload</label><br>
                                <div class="col-sm">
                                    <div class="row">
                                        <div class="col-sm">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="file" name="file">
                                                <label for="file" class="custom-file-label">Pilih file</label>
                                                <p><i>* upload dengan format <b>pdf</b></i></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                            <a type="button" class="btn btn-light" href="<?php echo site_url('PeningkatanPendidikan/lampiran/' . $lampiran['pendidikan_id']); ?>">Kembali</a>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>