<!-- partial -->
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Detail Dokumen
                            </h4><br>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Field</th>
                                            <th>Value</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Aspek</td>
                                            <td><?= $dokumen['aspek']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Dokumen</td>
                                            <td><?= $dokumen['nama_dokumen']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Diunggah Oleh</td>
                                            <td><?php
                                                $user_id = $dokumen['user_id'];

                                                $this->db->where('id', $user_id);
                                                $this->db->from('user');
                                                $query = $this->db->get();

                                                foreach ($query->result() as $user) {
                                                    echo $user->name;
                                                }
                                                ?></td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>Role</td>
                                            <td>
                                                <?php
                                                $id_role = $dokumen['role_id'];
                                                $this->db->where('id', $id_role);
                                                $this->db->from('user_role');
                                                $q = $this->db->get();

                                                foreach ($q->result() as $role) {
                                                    echo $role->role;
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>File</td>
                                            <td><?php if ($dokumen['file'] == false) {
                                                    echo 'File tidak ditemukan <i class="fa fa-eye-slash"></i>';
                                                } else {
                                                    echo '<a href="' . base_url('unggah/pendidikan/' . $dokumen['file']) . '" target="_blank" readonly>' . $dokumen['file'] . ' <i class="fa fa-eye"></i></a>';
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td>Target</td>
                                            <td><?= $dokumen['target']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>7</td>
                                            <td>Capaian</td>
                                            <td><?= $dokumen['capaian']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>8</td>
                                            <td>Status</td>
                                            <td>
                                                <?php
                                                $id_status = $dokumen['status_id'];

                                                $this->db->where('id_status_pendidikan', $id_status);
                                                $this->db->from('pendidikan_status');
                                                $q = $this->db->get();

                                                foreach ($q->Result() as $status) {
                                                    echo $status->nama_status;
                                                }

                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>9</td>
                                            <td>Rekomendasi</td>
                                            <td><?= $dokumen['keterangan_dokumen']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>10</td>
                                            <td>Rencana Perbaikan/Tindak Lanjut</td>
                                            <td><?= $dokumen['rencana_perbaikan']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>11</td>
                                            <td>Jadwal Perbaikan</td>
                                            <td><?= $dokumen['jadwal_perbaikan']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>12</td>
                                            <td>Penanggung Jawab Perbaikan</td>
                                            <td><?php
                                                $id_user = $dokumen['penanggung_jawab_perbaikan'];
                                                $this->db->where('id', $id_user);
                                                $this->db->from('user');
                                                $q = $this->db->get();

                                                foreach ($q->Result() as $user) {
                                                    echo $user->name;
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>13</td>
                                            <td>Rencana Pengendalian</td>
                                            <td><?= $dokumen['rencana_pengendalian']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>14</td>
                                            <td>Jadwal Pengendalian</td>
                                            <td><?= $dokumen['jadwal_pengendalian']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>15</td>
                                            <td>Penanggung Jawab Pengendalian</td>
                                            <td><?php
                                                $id_user = $dokumen['penanggung_jawab_pengendalian'];
                                                $this->db->where('id', $id_user);
                                                $this->db->from('user');
                                                $q = $this->db->get();

                                                foreach ($q->Result() as $user) {
                                                    echo $user->name;
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>16</td>
                                            <td>File Perbaikan</td>
                                            <td><?php if ($dokumen['file2'] == false) {
                                                    echo 'File tidak ditemukan <i class="fa fa-eye-slash"></i>';
                                                } else {
                                                    echo '<a href="' . base_url('unggah/pendidikan/' . $dokumen['file2']) . '" target="_blank" readonly>' . $dokumen['file2'] . ' <i class="fa fa-eye"></i></a>';
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>17</td>
                                            <td>Status Perbaikan</td>
                                            <td><?php
                                                $id_status = $dokumen['status_perbaikan'];

                                                $this->db->where('id_status_pendidikan', $id_status);
                                                $this->db->from('pendidikan_status');
                                                $q = $this->db->get();

                                                foreach ($q->Result() as $status) {
                                                    echo $status->nama_status;
                                                }

                                                ?></td>
                                        </tr>
                                        <tr>
                                            <td>18</td>
                                            <td>Hasil Perbaikan</td>
                                            <td><?= $dokumen['perbaikan_dokumen']; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <hr>
                            <a type="button" class="btn btn-light" href="<?php echo site_url('PengendalianPendidikan/perbaikan/' . $dokumen['pendidikan_id']); ?>">Kembali</a>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>