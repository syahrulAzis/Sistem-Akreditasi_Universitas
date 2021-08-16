<!-- partial -->
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Basic form elements</h4>
                            <form action="<?= base_url('aspek/add'); ?>" method="POST">
                                <div class="form-group">
                                    <label>Matrik Penilaian</label>
                                    <select class="js-example-basic-single w-100" name="penilaian_id" id="penilaian_id" required>
                                        <option value="">Please Select ...</option>
                                        <?php foreach ($matrik as $m) : ?>
                                            <option value="<?= $m['id_penilaian']; ?>"><?= $m['kode_magterik_penilaian_borang']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Standar</label>
                                    <select class="js-example-basic-single w-100" name="standar_id" id="standar_id" required>
                                        <option value="">Please Select ...</option>
                                        <?php foreach ($standar as $s) : ?>
                                            <option value="<?= $s['id_standar']; ?>"><?= $s['no_standar']; ?> (<?= $s['deskripsi_standar']; ?>)</option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Program Study</label>
                                    <select class="js-example-basic-single w-100" name="prodi_id" id="prodi_id" required>
                                        <option value="">Please Select ...</option>
                                        <?php foreach ($prodi as $k) : ?>
                                            <option value="<?= $k['id_prodi']; ?>"><?= $k['nama_prodi']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Turunan</label>
                                    <?php echo form_input('turunan', null, 'class="form-control" required="required"'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Semester</label>
                                    <?php echo form_input('semester', null, 'class="form-control" Placeholder ="Ganjil/Genap" required="required"'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Tahun Akademik</label>
                                    <?php echo form_input('tahun', null, 'class="form-control" required="required"'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Aspek</label>
                                    <?php echo form_textarea('aspek', null, 'class="form-control" required="required"'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Indikator</label>
                                    <?php echo form_textarea('indikator', null, 'class="form-control" required="required"'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Bobot</label>
                                    <?php echo form_input('bobot', null, 'class="form-control"  Placeholder ="Masukan Angka Desimal" required="required"'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Target</label>
                                    <input type="number" name="target_aspek" id="target_aspek" class="form-control" required>
                                </div>
                                <hr>
                                <button type="submit" class="btn btn-outline-success mr-2"><i class="fa fa-save"></i> Simpan</button>
                                <a type="button" class="btn btn-outline-danger" href="<?php echo site_url('aspek'); ?>"><i class="fa fa-undo"></i> Kembali</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>