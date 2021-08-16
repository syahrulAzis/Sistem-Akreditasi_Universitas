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
                                <label>Judul Kegiatan</label>
                                <?php echo form_input('judul_kegiatan', null, 'class="form-control" required="required" placeholder=""'); ?>
                            </div>
                            <div class="form-group">
                                <label>Link</label>
                                <?php echo form_input('link_blog', null, 'class="form-control" required="required" placeholder="Jangan gunakan spasi"'); ?>
                            </div>
                            <div class="form-group">
                                <label>Deskripsi Singkat</label>
                                <?php echo form_input('des_kegiatan', null, 'class="form-control" placeholder="maksimal 30 karakter" required="required"'); ?>
                            </div>
                            <div class="form-group">
                                <label>Jumlah Peserta</label>
                                <input type="number" name="peserta_kegiatan" class="form-control" required="required" placeholder="">
                            </div>
                            <div class="form-group">
                                <label>Artikel</label>
                                <?php echo form_textarea('artikel_kegiatan', null, 'class="form-control" required="required"'); ?>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Pembuatan</label>
                                <input type="date" name="waktu_kegiatan" class="form-control" required="required" placeholder="15-01-2020">
                            </div>
                            <div class="form-group">
                                <label>File upload</label><br>
                                <div class="col-sm">
                                    <div class="row">
                                        <div class="col-sm">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="file" name="file">
                                                <label for="file" class="custom-file-label">Pilih file</label>
                                                <p>
                                                    <i>* upload dengan format <b>jpg</b> ukuran gambar <b>800x600</b>
                                                    </i>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                            <a type="button" class="btn btn-light" href="<?php echo site_url('standar'); ?>">Kembali</a>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>