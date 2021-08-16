<!-- partial -->
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <form action="<?= base_url('pendidikan/add'); ?>" method="POST">
                                <h4 class="card-title">Basic form elements</h4>
                                <div class="form-group">
                                    <label>Standar</label>
                                    <select class="js-example-basic-single w-100" name="standar_id" id="standar_id" required>
                                        <option value="">Please Select</option>
                                        <?php foreach ($standar as $sst) : ?>
                                            <option value="<?= $sst['id_standar']; ?>"><?= $sst['no_standar']; ?> (<?= $sst['deskripsi_standar']; ?>)</option>
                                        <? endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <input type="text" name="des_pendidikan" id="des_pendidikan" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Tahun Ajaran</label>
                                    <input type="text" name="tahun_ajaran" id="tahun_ajaran" class="form-control" placeholder="2019-2020" required>
                                </div>
                                <div class="form-group">
                                    <label>Periode</label>
                                    <select class="js-example-basic-single w-100" name="periode" id="periode" required>
                                        <option value="">Please Select</option>
                                        <option value="Ganjil">GANJIL</option>
                                        <option value="Genap">GENAP</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Kegiatan</label>
                                    <select class="js-example-basic-single w-100" name="kegiatan" id="kegiatan" required>
                                        <option value="">Please Select</option>
                                        <option value="UTS">UTS</option>
                                        <option value="UAS">UAS</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Fakultas</label>
                                    <select class="js-example-basic-single w-100" name="fakultas_id" id="fakultas_id" required>
                                        <option value="">Please Select</option>
                                        <?php foreach ($fakultas as $m) : ?>
                                            <option value="<?= $m['id_fakultas']; ?>"><?= $m['nama_fakultas']; ?></option>
                                        <? endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Program Studi</label>
                                    <select class="js-example-basic-single w-100" name="prodi_id" id="prodi_id" required>
                                        <option value="">Please Select</option>
                                        <?php foreach ($prodi as $p) : ?>
                                            <option value="<?= $p['id_prodi']; ?>"><?= $p['nama_prodi']; ?></option>
                                        <? endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="js-example-basic-single w-100" name="is_active_pendidikan" id="is_active_pendidikan" required>
                                        <option value="">Please Select</option>
                                        <option value="0">Nonaktif</option>
                                        <option value="1">Aktif</option>
                                    </select>
                                </div>
                                <hr>
                                <button type="submit" class="btn btn-outline-success btn-fw mr-2">
                                    <i class="fa fa-save"></i>
                                    Simpan
                                </button>
                                <a type="button" class="btn btn-outline-light btn-fw" href="<?php echo site_url('pendidikan'); ?>">
                                    <i class="fa fa-undo"></i>
                                    Kembali
                                </a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>