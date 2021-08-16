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
                            <br>
                            <hr>
                            <br>
                            <div class="form-group">
                                <label>Aspek</label>
                                <input type="text" class="form-control" name="aspek" id="aspek" value="<?= $dokumen['aspek']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Dokumen</label>
                                <input type="text" class="form-control" name="nama_dokumen" id="nama_dokumen" value="<?= $dokumen['nama_dokumen']; ?>" readonly>
                            </div>
                            <br>
                            <hr>
                            <br>
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
                                <label>Role</label>
                                <input type="text" class="form-control" name="role_id" id="role_id" value="<?php
                                                                                                            $id_role = $dokumen['role_id'];
                                                                                                            $this->db->where('id', $id_role);
                                                                                                            $this->db->from('user_role');
                                                                                                            $q = $this->db->get();

                                                                                                            foreach ($q->result() as $role) {
                                                                                                                echo $role->role;
                                                                                                            }
                                                                                                            ?>" readonly>
                            </div>
                            <br>
                            <hr>
                            <br>
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
                                <label>Target</label>
                                <input type="text" class="form-control" name="target" id="target" value="<?= $dokumen['target']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Capaian</label>
                                <input type="text" class="form-control" name="capaian" id="capaian" value="<?= $dokumen['capaian']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <input type="text" class="form-control" name="status_id" id="status_id" value="<?php
                                                                                                                $id_status = $dokumen['status_id'];
                                                                                                                $this->db->where('id_status_pendidikan', $id_status);
                                                                                                                $this->db->from('pendidikan_status');
                                                                                                                $q = $this->db->get();

                                                                                                                foreach ($q->result() as $status) {
                                                                                                                    echo $status->nama_status;
                                                                                                                }
                                                                                                                ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Rekomendasi</label>
                                <input type="text" class="form-control" name="keterangan_dokumen" id="keterangan_dokumen" value="<?= $dokumen['keterangan_dokumen']; ?>" readonly>
                            </div>
                            <br>
                            <hr>
                            <br>
                            <div class="form-group">
                                <label>Rencana Perbaikan/Tindak Lanjut</label>
                                <input type="text" class="form-control" name="rencana_perbaikan" id="rencana_perbaikan" value="<?= $dokumen['rencana_perbaikan']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Jadwal Perbaikan</label>
                                <input type="date" class="form-control" name="jadwal_perbaikan" id="jadwal_perbaikan" value="<?= $dokumen['jadwal_perbaikan']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Penanggung Jawab Perbaikan</label>
                                <input type="text" class="form-control" name="penanggung_jawab_perbaikan" id="penanggung_jawab_perbaikan" value="<?php
                                                                                                                                                    $id_user = $dokumen['penanggung_jawab_perbaikan'];
                                                                                                                                                    $this->db->where('id', $id_user);
                                                                                                                                                    $this->db->from('user');
                                                                                                                                                    $q = $this->db->get();

                                                                                                                                                    foreach ($q->Result() as $user) {
                                                                                                                                                        echo $user->name;
                                                                                                                                                    }
                                                                                                                                                    ?>" readonly>
                            </div>
                            <br>
                            <hr>
                            <br>
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
                                <input type="text" class="form-control" name="penanggung_jawab_pengendalian" id="penanggung_jawab_pengendalian" value="<?php
                                                                                                                                                        $id_user = $dokumen['penanggung_jawab_pengendalian'];
                                                                                                                                                        $this->db->where('id', $id_user);
                                                                                                                                                        $this->db->from('user');
                                                                                                                                                        $q = $this->db->get();

                                                                                                                                                        foreach ($q->Result() as $user) {
                                                                                                                                                            echo $user->name;
                                                                                                                                                        }
                                                                                                                                                        ?>" readonly>
                            </div>
                            <br>
                            <hr>
                            <br>
                            <div class="form-group">
                                <label>File Perbaikan</label><br>
                                <?php if ($dokumen['file2'] == false) {
                                    echo '<a class="form-control" target="_blank" readonly>File tidak ditemukan <i class="fa fa-eye-slash"></i></a>';
                                } else {
                                    echo '<a class="form-control" href="' . base_url('unggah/pendidikan/' . $dokumen['file2']) . '" target="_blank" readonly>' . $dokumen['file2'] . ' <i class="fa fa-eye"></i></a>';
                                }
                                ?>
                            </div>
                            <br>
                            <hr>
                            <br>
                            <div class="form-group">
                                <label>Status Perbaikan</label>
                                <select class="js-example-basic-single w-100" name="status_perbaikan" id="status_perbaikan" required>
                                    <option value="">Please Select ...</option>
                                    <?php foreach ($ambilstatus as $s) : ?>
                                        <option value="<?= $s['id_status_pendidikan']; ?>"><?= $s['nama_status']; ?> <i>(<?= $s['ket_status']; ?>)</i></option>
                                    <? endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Hasil Perbaikan</label>
                                <input type="text" class="form-control" name="perbaikan_dokumen" id="perbaikan_dokumen" required>
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                            <a type="button" class="btn btn-light" href="<?php echo site_url('AsesorPengendalian/perbaikan/' . $dokumen['pendidikan_id']); ?>">Kembali</a>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>