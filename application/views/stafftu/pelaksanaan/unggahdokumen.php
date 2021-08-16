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
                                <label>File Terunggah</label>
                                <style>
                                    table,
                                    td,
                                    th {
                                        border: 1px solid #ddd;
                                        text-align: left;
                                    }

                                    table {
                                        border-collapse: collapse;
                                        width: 100%;
                                    }

                                    th,
                                    td {
                                        padding: 15px;
                                    }
                                </style>
                                <table class="table" border="1">
                                    <thead>
                                        <tr>
                                            <th>Nama Dokumen</th>
                                            <th>Nilai</th>
                                            <th>Diunggah Oleh</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($listdoc as $ld) { ?>
                                            <tr>
                                                <td>
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
                                                <td>
                                                    <a type="button" class="btn btn-outline-danger" href="<?php echo site_url('Stafftu/RemoveDokumen/' . $ld['id_file']); ?>" onclick="return confirm('Apakah kamu yakin ?')"><i class="fa fa-trash"></i> Hapus</a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="form-group">
                                <label>Unggah Dokumen</label><br>
                                <div class="col-sm">
                                    <div class="row">
                                        <div class="col-sm">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="file" name="file">
                                                <label for="file" class="custom-file-label">Pilih file</label>
                                                <p><i>* upload dengan format <b>pdf</b></i></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Nilai</label>
                                <input type="number" class="form-control" name="nilai" id="nilai" placeholder="Masukan angka" required>
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-outline-success mr-2"><i class="fa fa-save"></i> Simpan</button>
                            <a type="button" class="btn btn-outline-light" href="<?php echo site_url('Stafftu/DetailPendidikanPelaksanaan/' . $dokumen['pendidikan_id']); ?>"><i class="fa fa-undo"></i> Kembali</a>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>