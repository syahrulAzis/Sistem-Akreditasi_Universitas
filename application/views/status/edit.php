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
                                    <label>Status</label>
                                    <input type="text" name="nama_status" id="nama_status" class="form-control" value="<?= $status['nama_status']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Keterangan</label>
                                    <?php echo form_textarea('ket_status', $status['ket_status'], 'class="form-control" required="required"'); ?>
                                </div>
                                <hr>
                                <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                                <a type="button" class="btn btn-light" href="<?php echo site_url('status'); ?>">Kembali</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>