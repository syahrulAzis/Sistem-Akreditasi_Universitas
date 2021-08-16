<!-- partial -->
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <?php echo $this->session->flashdata('message'); ?>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center">Form Tindak Lanjut/Pengendalian</h4>
                    <h5 class="text-center font-weight-bold">Deskripsi Kondisi Audit</h5>
                    <hr>
                    <table class="table table-borderless w-100 mt-4">
                        <?php
                        $no = 1;
                        foreach ($pendidikan as $row) { ?>
                            <tr>
                                <td><strong>Objek Id</strong> </td>
                                <td>: <?= $row->object_id_pendidikan; ?></td>
                                <td><strong>Tahun Ajaran</strong></td>
                                <td>: <?= $row->tahun_ajaran; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Periode</strong> </td>
                                <td>: <?= $row->periode; ?></td>
                                <td><strong>Kegiatan</strong> </td>
                                <td>: <?= $row->kegiatan; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Fakultas </strong> </td>
                                <td>: <?= $row->nama_fakultas; ?></td>
                                <td><strong>Program Studi </strong> </td>
                                <td>: <?= $row->nama_prodi; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Dibuat </strong> </td>
                                <td>: <?= $row->pendidikan_timestamp; ?></td>
                                <td><strong>Deskripsi </strong> </td>
                                <td>: <?= $row->des_pendidikan; ?></td>
                            </tr>
                        <?php } ?>
                    </table>
                    <hr>
                    <div class="table-responsive">
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
                        <table class="table-hover">
                            <thead>
                                <tr>
                                    <th class="pb-4">#</th>
                                    <th class="pb-4">Dokumen</th>
                                    <th class="pb-4">Rekomendasi</th>
                                    <th>Rencana Perbaikan/<br>Tindak Lanjut</th>
                                    <th class="pb-4">Jadwal Perbaikan</th>
                                    <th>Penanggung Jawab<br> Perbaikan</th>
                                    <th class="pb" bgcolor="#e6ffe6">Rencana <br>Pengendalian</th>
                                    <th class="pb" bgcolor="#e6ffe6">Jadwal <br>Pengendalian</th>
                                    <th bgcolor="#e6ffe6">Penanggung Jawab<br> Pengendalian</th>
                                    <th class="pb">Hasil Temuan <br>Monev</th>
                                    <th class="pb">Hasil Tindak <br>Lanjut</th>
                                    <th class="pb">Dokumen <br>Perbaikan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($dokumen as $row) { ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td>
                                            <a href="<?php echo site_url('Gkm/DokumenMonev/' . $row->id_transaksi_pendidikan); ?>" target="_blank" type="button" class="btn btn-icons btn-rounded btn-outline-primary"><i class=" fa fa-eye"></i></a>
                                        </td>
                                        <td>
                                            <?= $row->keterangan_dokumen; ?>
                                        </td>
                                        <td>
                                            <?= $row->rencana_perbaikan; ?>
                                        </td>
                                        <td>
                                            <?= $row->jadwal_perbaikan; ?>
                                        </td>
                                        <td>
                                            <?php
                                            $id_user = $row->penanggung_jawab_perbaikan;
                                            $this->db->where('id', $id_user);
                                            $this->db->from('user');
                                            $q = $this->db->get();

                                            foreach ($q->result() as $user) {
                                                echo $user->name;
                                            }
                                            ?>
                                        </td>
                                        <td bgcolor="#e6ffe6"><?= $row->rencana_pengendalian; ?></td>
                                        <td bgcolor="#e6ffe6"><?= $row->jadwal_pengendalian; ?></td>
                                        <td bgcolor="#e6ffe6">
                                            <?php
                                            $id_user = $row->penanggung_jawab_pengendalian;
                                            $this->db->where('id', $id_user);
                                            $this->db->from('user');
                                            $q = $this->db->get();

                                            foreach ($q->result() as $user) {
                                                echo $user->name;
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <center>
                                                <?php
                                                $id_status = $row->status_id;

                                                $this->db->where('id_status_pendidikan', $id_status);
                                                $this->db->from('pendidikan_status');
                                                $query = $this->db->get();

                                                foreach ($query->result() as $status) {
                                                    if ($row->status_id > 2) {
                                                        echo '<div class="badge badge-pill badge-danger">' . $status->nama_status . '</div>';
                                                    } elseif ($row->status_id > 1) {
                                                        echo '<div class="badge badge-pill badge-warning">' . $status->nama_status . '</div>';
                                                    } else {
                                                        echo '<div class="badge badge-pill badge-success">' . $status->nama_status . '</div>';
                                                    }
                                                }
                                                ?>
                                            </center>
                                        </td>
                                        <td>
                                            <center>
                                                <?php
                                                $id_status = $row->status_perbaikan;

                                                $this->db->where('id_status_pendidikan', $id_status);
                                                $this->db->from('pendidikan_status');
                                                $query = $this->db->get();

                                                foreach ($query->result() as $status) {
                                                    if ($row->status_perbaikan > 2) {
                                                        echo '<div class="badge badge-pill badge-danger">' . $status->nama_status . '</div>';
                                                    } elseif ($row->status_perbaikan > 1) {
                                                        echo '<div class="badge badge-pill badge-warning">' . $status->nama_status . '</div>';
                                                    } else {
                                                        echo '<div class="badge badge-pill badge-success">' . $status->nama_status . '</div>';
                                                    }
                                                }
                                                ?>
                                            </center>
                                        </td>
                                        <td>
                                            <a href="<?php echo site_url('Gkm/DokumenPerbaikan/' . $row->id_transaksi_pendidikan); ?>" target="_blank" type="button" class="btn btn-icons btn-rounded btn-outline-primary"><i class=" fa fa-eye"></i></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <hr>
                    <a type="button" class="btn btn-outline-light btn-fw" href="<?php echo site_url('Gkm/PengendalianPendidikan'); ?>">
                        <i class="fa fa-undo"></i>
                        Kembali
                    </a>
                    <hr>
                </div>
            </div>
        </div>