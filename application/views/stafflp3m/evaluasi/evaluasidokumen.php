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
                                <!-- <label>Object Id</label> -->
                                <input type="hidden" class="form-control" name="pendidikan_id" id="pendidikan_id" value="<?= $dokumen['pendidikan_id']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <!-- <label>Dokumen Id</label> -->
                                <input type="hidden" class="form-control" name="transaksi_pendidikan_id" id="transaksi_pendidikan_id" value="<?= $dokumen['id_transaksi_pendidikan']; ?>" readonly>
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
                                <label>Target</label>
                                <input type="text" class="form-control" name="target" id="target" value="<?= $dokumen['target']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>File</label>
                                <table class="table" border="1">
                                    <thead>
                                        <tr>
                                            <th>Nama Dokumen</th>
                                            <th>Nilai</th>
                                            <th>Diunggah Oleh</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($listdoc as $ld) { ?>
                                            <tr>
                                                <td>
                                                    <?php //echo $ld['file']; 
                                                    ?>
                                                    <p><a href="<?php echo base_url('unggah/pendidikan/' . $ld['file']); ?>" target="_blank"><?php echo $ld['file']; ?></a></p>
                                                </td>
                                                <td>
                                                    <?= $ld['nilai']; ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    $id_user = $ld['user_id'];

                                                    $this->db->where('id', $id_user);
                                                    $this->db->from('user');
                                                    $q = $this->db->get();

                                                    foreach ($q->result() as $user) {
                                                        echo $user->name;
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
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
                                <label>Capaian</label>
                                <input type="number" class="form-control" name="capaian" id="capaian" value="<?= $dokumen['capaian']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Akar Masalah</label>
                                <input type="text" class="form-control" name="akar_masalah" id="akar_masalah" value="<?= $dokumen['akar_masalah']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Tindakan Koreksi</label>
                                <input type="text" class="form-control" name="keterangan_dokumen" id="keterangan_dokumen" value="<?= $dokumen['keterangan_dokumen']; ?>" required>
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-outline-success mr-2"><i class="fa fa-save"></i> Simpan</button>
                            <a type="button" class="btn btn-outline-light" href="<?php echo site_url('Stafflp3m/DetailPendidikanEvaluasi/' . $dokumen['pendidikan_id']); ?>"><i class="fa fa-undo"></i> Kembali</a>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>