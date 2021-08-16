<!-- partial -->
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Basic form elements</h4>
                            <form action="<?= base_url('pendidikan/addborang'); ?>" method="POST">
                                <div class="form-group">
                                    <label>Kode Borang</label>
                                    <?php echo form_input('kode_borang', null, 'class="form-control" required="required"'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Keterangan Borang</label>
                                    <?php echo form_textarea('ket_kborang', null, 'class="form-control" required="required"'); ?>
                                </div>
                                <hr>
                                <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                                <a type="button" class="btn btn-light" href="<?php echo site_url('pendidikan/getborang'); ?>">Kembali</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>