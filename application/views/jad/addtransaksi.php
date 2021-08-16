<!-- partial -->
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <form action="<?= base_url('jad/addtransaksi'); ?>" method="POST">
                                <h4 class="card-title">Basic form elements</h4>
                                <div class="form-group">
                                    <label>Dokumen</label>
                                    <select class="js-example-basic-single w-100" name="id_dokumen_pendidikan" id="id_dokumen_pendidikan" required>
                                        <option value="">Please Select</option>
                                        <?php foreach ($dokumen as $d) : ?>
                                            <option value="<?= $d['id_dokumen_pendidikan']; ?>"><?= $d['nama_dokumen']; ?></option>
                                        <? endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Jad</label>
                                    <select class="js-example-basic-single w-100" name="id_jad" id="id_jad" required>
                                        <option value="">Please Select</option>
                                        <?php foreach ($jad as $j) : ?>
                                            <option value="<?= $j['id_jad']; ?>"><?= $j['kode_jad']; ?></option>
                                        <? endforeach; ?>
                                    </select>
                                </div>
                                <hr>
                                <button type="submit" class="btn btn-outline-success btn-fw mr-2">
                                    <i class="fa fa-save"></i>
                                    Simpan
                                </button>
                                <a type="button" class="btn btn-outline-danger btn-fw" href="<?php echo site_url('jad/transaksijad'); ?>">
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