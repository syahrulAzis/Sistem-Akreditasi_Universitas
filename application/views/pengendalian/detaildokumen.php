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
                                            <td>File</td>
                                            <td><?php if ($dokumen['file'] == false) {
                                                    echo 'File tidak ditemukan <i class="fa fa-eye-slash"></i>';
                                                } else {
                                                    echo '<a href="' . base_url('unggah/pendidikan/' . $dokumen['file']) . '" target="_blank" readonly>' . $dokumen['file'] . ' <i class="fa fa-eye"></i></a>';
                                                }
                                                ?></td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>Status Dokumen</td>
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
                                            <td>6</td>
                                            <td>Rekomendasi</td>
                                            <td><?= $dokumen['keterangan_dokumen']; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <hr>
                            <a type="button" class="btn btn-light" href="<?php echo site_url('PengendalianPendidikan/selesai/' . $dokumen['pendidikan_id']); ?>">Kembali</a>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>