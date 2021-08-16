<!-- partial -->
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <?php echo $this->session->flashdata('message'); ?>
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Basic form elements</h4>
                            <form action="<?= base_url('pendidikan/prosesadddokumen'); ?>" method="POST">
                                <div class="form-group">
                                    <label>Form Id</label>
                                    <?php
                                    $no = 1;
                                    foreach ($pendidikan as $row) { ?>
                                        <input type="text" name="pendidikan_id" id="pendidikan_id" class="form-control" value="<?php echo $row->id_pendidikan; ?>" readonly>
                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Aspek</label>
                                    <select class="form-control" name="aspek_id" id="aspek_id">
                                        <option value="">Please Select ...</option>
                                        <?php foreach ($ambilaspek as $asp) : ?>
                                            <option value="<?= $asp['id_aspek_pendidikan']; ?>"><?= $asp['aspek']; ?></option>
                                        <? endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Jenis Dokumen</label>
                                    <select class="form-control" name="dokumen_id" id="dokumen_id">
                                        <option value="">Please Select ...</option>
                                        <?php foreach ($ambildokumen as $adok) : ?>
                                            <option value="<?= $adok['id_dokumen_pendidikan']; ?>"><?= $adok['nama_dokumen']; ?></option>
                                        <? endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Role</label>
                                    <select class="form-control" name="role_id" id="role_id">
                                        <option value="">Please Select ...</option>
                                        <?php foreach ($role as $r) : ?>
                                            <option value="<?= $r['id']; ?>"><?= $r['role']; ?></option>
                                        <? endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Target</label>
                                    <input type="text" name="target" id="target" class="form-control" required>
                                </div>
                                <hr>
                                <button type="submit" class="btn btn-outline-success mr-2"><i class="fa fa-save"></i>Simpan</button>
                                <a type="button" class="btn btn-outline-light" href="<?php echo site_url('pendidikan/detail/' . $row->id_pendidikan); ?>"><i class="fa fa-undo"></i>Kembali</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>