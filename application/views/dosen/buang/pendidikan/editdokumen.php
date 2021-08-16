<!-- partial -->
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Basic form elements</h4>
                            <?php
                            foreach ($dokumen as $row) { ?>
                                <?php echo form_open_multipart(''); ?>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Pilih Objek Id</label>
                                    <input type="text" name="pendidikan_id" id="pendidikan_id" class="form-control" value="<?= $row->object_id_pendidikan; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Aspek</label>
                                    <select class="form-control" name="aspek_id" id="aspek_id">
                                        <?php foreach ($ambilaspek as $asp) : ?>
                                            <option value="<?= $asp['id_aspek_pendidikan']; ?>"><?= $asp['aspek']; ?></option>
                                        <? endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Jenis Dokumen</label>
                                    <select class="form-control" name="dokumen_id" id="dokumen_id">
                                        <?php foreach ($ambildokumen as $adok) : ?>
                                            <option value="<?= $adok['id_dokumen_pendidikan']; ?>"><?= $adok['nama_dokumen']; ?></option>
                                        <? endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Keterangan</label>
                                    <input type="text" name="keterangan_dokumen" id="keterangan_dokumen" class="form-control" value="<?= $row->keterangan_dokumen; ?>" required>
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
                                <button type="submit" class="btn btn-outline-success btn-fw mr-2">
                                    <i class="fa fa-save"></i>
                                    Simpan
                                </button>
                                <a type="button" class="btn btn-outline-danger btn-fw" href="<?php echo site_url('DosenPendidikan/detaildokumen/' . $row->id_transaksi_pendidikan); ?>">
                                    <i class="fa fa-undo"></i>
                                    Kembali
                                </a>
                                <?php echo form_close(); ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>