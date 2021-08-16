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
                                <label>No Butir Matrik</label>
                                <?php echo form_input('no_butir_matrik', null, 'class="form-control" required="required" placeholder=""'); ?>
                            </div>
                            <div class="form-group">
                                <label>Kode Elemen Penilaian</label>
                                <?php echo form_input('kode_elemen_penilaian', null, 'class="form-control" required="required" placeholder=""'); ?>
                            </div>
                            <div class="form-group">
                                <label>Elemen Penilaian</label>
                                <?php echo form_input('elemen_penilaian', null, 'class="form-control" required="required" placeholder=""'); ?>
                            </div>
                            <div class="form-group">
                                <label>Kode Indikator</label>
                                <?php echo form_input('kode_indikator', null, 'class="form-control" required="required" placeholder=""'); ?>
                            </div>
                            <div class="form-group">
                                <label>Indikator Penilaian</label>
                                <?php echo form_textarea('indikator_penilaian', null, 'class="form-control" required="required"'); ?>
                            </div>
                            <div class="form-group">
                                <label>Kode Magterik Penilaian Borang</label>
                                <?php echo form_input('kode_magterik_penilaian_borang', null, 'class="form-control" required="required" placeholder=""'); ?>
                            </div>
                            <div class="form-group">
                                <label>Kode Ringkasan Standar</label>
                                <?php echo form_input('kode_ringkasan_standar', null, 'class="form-control" required="required" placeholder=""'); ?>
                            </div>
                            <div class="form-group">
                                <label>Nomor Dokumen</label>
                                <?php echo form_input('nomor_dokumen', null, 'class="form-control" required="required" placeholder=""'); ?>
                            </div>
                            <div class="form-group">
                                <label>Standar Pendidikan</label>
                                <?php echo form_input('standar_pendidikan', null, 'class="form-control" required="required" placeholder=""'); ?>
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-outline-success mr-2"><i class="fa fa-save"></i> Simpan</button>
                            <a type="button" class="btn btn-outline-danger" href="<?php echo site_url('MatrikPenilaian'); ?>"><i class="fa fa-undo"></i> Kembali</a>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>