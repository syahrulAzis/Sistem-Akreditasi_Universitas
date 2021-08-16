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
                                    <input type="hidden" name="id" value="<?= $menu['id']; ?>">
                                    <label>Nama Menu</label>
                                    <?php echo form_input('menu', $menu['menu'], 'class="form-control" '); ?>
                                </div>
                                <div class="form-group">
                                    <label>Icon</label>
                                    <?php echo form_input('icon', $menu['icon'], 'class="form-control" '); ?>
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