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
                                <label>File Monev</label>
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
                                <input type="text" class="form-control" name="status_id" id="status_id" value="<?php $ids = $dokumen['status_id'];
                                                                                                                $this->db->where('id_status_pendidikan', $ids);
                                                                                                                $this->db->from('pendidikan_status');
                                                                                                                $q = $this->db->get();

                                                                                                                foreach ($q->result() as $status) {
                                                                                                                    echo $status->nama_status;
                                                                                                                }

                                                                                                                ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Target</label>
                                <input type="text" class="form-control" name="target" id="target" value="<?= $dokumen['target']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Capaian</label>
                                <input type="number" class="form-control" name="capaian" id="capaian" value="<?= $dokumen['capaian']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Rekomendasi</label>
                                <input type="text" class="form-control" name="keterangan_dokumen" id="keterangan_dokumen" value="<?= $dokumen['keterangan_dokumen']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Rencana Perbaikan</label>
                                <input type="text" class="form-control" name="rencana_perbaikan" id="rencana_perbaikan" value="<?= $dokumen['rencana_perbaikan']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Jadwal Perbaikan</label>
                                <input type="date" class="form-control" name="jadwal_perbaikan" id="jadwal_perbaikan" value="<?= $dokumen['jadwal_perbaikan']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Penanggung Jawab Perbaikan</label>
                                <input type="text" class="form-control" name="penanggung_jawab_perbaikan" id="penanggung_jawab_perbaikan" value="<?php $id_user = $dokumen['penanggung_jawab_perbaikan'];
                                                                                                                                                    $this->db->where('id', $id_user);
                                                                                                                                                    $this->db->from('user');
                                                                                                                                                    $q = $this->db->get();

                                                                                                                                                    foreach ($q->result() as $user) {
                                                                                                                                                        echo $user->name;
                                                                                                                                                    }


                                                                                                                                                    ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Rencana Pengendalian</label>
                                <input type="text" class="form-control" name="rencana_pengendalian" id="rencana_pengendalian" value="<?= $dokumen['rencana_pengendalian']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Jadwal Pengendalian</label>
                                <input type="date" class="form-control" name="jadwal_pengendalian" id="jadwal_pengendalian" value="<?= $dokumen['jadwal_pengendalian']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Penanggung Jawab Pengendalian</label>
                                <label>Jadwal Pengendalian</label>
                                <input type="text" class="form-control" name="penanggung_jawab_pengendalian" id="penanggung_jawab_pengendalian" value="<?php $id_user = $dokumen['penanggung_jawab_pengendalian'];
                                                                                                                                                        $this->db->where('id', $id_user);
                                                                                                                                                        $this->db->from('user');
                                                                                                                                                        $q = $this->db->get();

                                                                                                                                                        foreach ($q->result() as $user) {
                                                                                                                                                            echo $user->name;
                                                                                                                                                        }


                                                                                                                                                        ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>File Perbaikan</label>
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
                                        foreach ($listdocperbaikan as $ld) { ?>
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
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="form-group">
                                <label>Status Perbaikan</label>
                                <input type="text" class="form-control" name="status_perbaikan" id="status_perbaikan" value="<?php $ids = $dokumen['status_perbaikan'];
                                                                                                                                $this->db->where('id_status_pendidikan', $ids);
                                                                                                                                $this->db->from('pendidikan_status');
                                                                                                                                $q = $this->db->get();

                                                                                                                                foreach ($q->result() as $status) {
                                                                                                                                    echo $status->nama_status;
                                                                                                                                }

                                                                                                                                ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Capaian Perbaikan</label>
                                <input type="number" class="form-control" name="capaian_perbaikan" id="capaian_perbaikan" value="<?= $dokumen['capaian_perbaikan']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Hasil Perbaikan</label>
                                <input type="text" class="form-control" name="perbaikan_dokumen" id="perbaikan_dokumen" value="<?= $dokumen['perbaikan_dokumen']; ?>" readonly>
                            </div>
                            <hr>
                            <a type="button" class="btn btn-outline-light" href="<?php echo site_url('Gkm/DetailPendidikanPengendalian/' . $dokumen['pendidikan_id']); ?>"><i class="fa fa-undo"></i> Kembali</a>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>