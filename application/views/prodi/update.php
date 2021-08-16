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
                                <input type="hidden" name="id" value="<?= $prodi['id_prodi']; ?>">
                                <div class="form-group">
                                    <label>Fakultas</label>
                                    <select class="js-example-basic-single w-100" name="fakultas_id" id="fakultas_id" required>
                                        <?php foreach ($fakultas as $f) : ?>
                                            <option value="<?= $f['id_fakultas']; ?>"><?= $f['nama_fakultas']; ?></option>
                                        <? endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Nama Program Studi</label>
                                    <?php echo form_input('nama_prodi', $prodi['nama_prodi'], 'class="form-control" '); ?>
                                </div>
                                <hr>
                                <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                                <a type="button" class="btn btn-light" href="<?php echo site_url('prodi'); ?>">Kembali</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>