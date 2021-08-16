<!-- partial -->
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Basic form elements</h4><br>
                            <?php echo form_open_multipart(); ?>
                            <div class="form-group">
                                <!-- <label>Object Id</label> -->
                                <input type="hidden" class="form-control" name="pendidikan_id" id="pendidikan_id" value="<?= $pendidikan_id; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Nama Lampiran</label>
                                <input type="text" class="form-control" name="nama_lampiran" id="nama_lampiran" required>
                            </div>
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <input type="text" class="form-control" name="deskripsi_lampiran" id="deskripsi_lampiran" required>
                            </div>
                            <div class="form-group">
                                <label>Unggah Dokumen</label><br>
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
                            <button type="submit" class="btn btn-outline-success mr-2"><i class="fa fa-save"></i> Simpan</button>
                            <a type="button" class="btn btn-outline-light" href="<?php echo site_url('Stafflp3m/PelaksanaanLampiran/' . $pendidikan_id); ?>"><i class="fa fa-undo"></i> Kembali</a>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>