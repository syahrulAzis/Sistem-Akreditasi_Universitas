<!-- partial -->
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Basic form elements</h4>
                            <form action="" method="POST">
                                <div class="form-group">
                                    <input type="hidden" name="id_kborang" value="<?= $borang['id_kborang']; ?>">
                                    <label>Kode Borang</label>
                                    <?php echo form_input('kode_borang', $borang['kode_borang'], 'class="form-control" required="required"'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Keterangan Borang</label>
                                    <?php echo form_textarea('ket_kborang', $borang['ket_kborang'], 'class="form-control" required="required"'); ?>
                                </div>
                                <hr>
                                <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                                <a type="button" class="btn btn-light" href="<?php echo site_url('borang'); ?>">Kembali</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>