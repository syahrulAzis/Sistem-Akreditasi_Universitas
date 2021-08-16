<!-- partial -->
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Basic form elements</h4>
                            <form action="<?= base_url('menu/add'); ?>" method="POST">
                                <div class="form-group">
                                    <label>Nama Menu</label>
                                    <input type="text" name="menu" id="menu" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Icon</label>
                                    <input type="text" name="icon" id="icon" class="form-control" required>
                                </div>
                                <hr>
                                <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                                <a type="button" class="btn btn-light" href="<?php echo site_url('menu'); ?>">Kembali</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>