<!-- partial -->
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Basic form elements</h4><br>
                            <?php echo form_open_multipart(); ?>
                            <div class="form-group">
                                <label>Form Id</label>
                                <input type="text" class="form-control" name="pendidikan_id" id="pendidikan_id" value="<?= $dokumen['pendidikan_id']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Aspek</label>
                                <input type="text" class="form-control" name="aspek" id="aspek" value="<?= $dokumen['aspek']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Dokumen</label>
                                <input type="text" class="form-control" name="nama_dokumen" id="nama_dokumen" value="<?= $dokumen['nama_dokumen']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Diunggah Oleh</label>
                                <input type="text" class="form-control" name="name" id="name" value="<?php
                                                                                                        $id_user = $dokumen['user_id'];
                                                                                                        $this->db->where('id', $id_user);
                                                                                                        $this->db->from('user');
                                                                                                        $q = $this->db->get();

                                                                                                        foreach ($q->Result() as $user) {
                                                                                                            echo $user->name;
                                                                                                        }
                                                                                                        ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>File</label><br>
                                <?php if ($dokumen['file'] == false) {
                                    echo '<a class="form-control" target="_blank" readonly>File tidak ditemukan <i class="fa fa-eye-slash"></i></a>';
                                } else {
                                    echo '<a class="form-control" href="' . base_url('unggah/pendidikan/' . $dokumen['file']) . '" target="_blank" readonly>' . $dokumen['file'] . ' <i class="fa fa-eye"></i></a>';
                                }
                                ?>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select class="js-example-basic-single w-100" name="status_id" id="status_id" required>
                                    <option value="<?= $dokumen['status_id']; ?>"><?= $dokumen['status_id']; ?></option>
                                    <?php foreach ($ambilstatus as $s) : ?>
                                        <option value="<?= $s['id_status_pendidikan']; ?>"><?= $s['nama_status']; ?> <i>(<?= $s['ket_status']; ?>)</i></option>
                                    <? endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Rekomendasi</label>
                                <input type="text" class="form-control" name="keterangan_dokumen" id="keterangan_dokumen" value="<?= $dokumen['keterangan_dokumen']; ?>" required>
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                            <a type="button" class="btn btn-light" href="<?php echo site_url('EvaluasiPendidikan/nilai/' . $dokumen['pendidikan_id']); ?>">Kembali</a>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>