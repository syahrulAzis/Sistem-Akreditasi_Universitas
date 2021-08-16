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
                        <table class="table table-hover">
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
                                    <th class="pb-4">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($dokumen as $row) { ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td>
                                            <?php if ($row->file == false) {
                                                echo '<button type="button" class="btn btn-icons btn-rounded btn-outline-light disabled""><i class="fa fa-eye-slash"></i></button>';
                                            } else {
                                                echo '<a class="btn btn-icons btn-rounded btn-outline-success" href="' . base_url('unggah/pendidikan/' . $row->file) . '" target="_blank"><i class="fa fa-eye"></i></a>';
                                            }
                                            ?>
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
                                                    echo $status->nama_status;
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
                                                    echo $status->nama_status;
                                                }
                                                ?>
                                            </center>
                                        </td>
                                        <td>
                                            <?php if ($row->file2 == false) {
                                                echo '<button type="button" class="btn btn-icons btn-rounded btn-outline-light disabled""><i class="fa fa-eye-slash"></i></button>';
                                            } else {
                                                echo '<a class="btn btn-icons btn-rounded btn-outline-success" href="' . base_url('unggah/pendidikan/' . $row->file2) . '" target="_blank"><i class="fa fa-eye"></i></a>';
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-primary icon-btn dropdown-toggle" type="button" id="dropdownMenuIconButton6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="icon-layers"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton6">
                                                    <a class="dropdown-item" href="<?php echo site_url('AsesorPengendalian/nilaiPerbaikan/' . $row->id_transaksi_pendidikan); ?>">Nilai</a>
                                                    <a class="dropdown-item" href="<?php echo site_url('AsesorPengendalian/hasilPerbaikan/' . $row->id_transaksi_pendidikan); ?>">Hasil</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <hr>
                    <style type="text/css">
                        body {
                            font-family: sans-serif;
                        }

                        .lingkaran {
                            width: 25px;
                            height: 25px;
                            background: #e6ffe6;
                            border-radius: 100%;
                        }
                    </style>
                    <i><b>* Keterangan</b></i>
                    <table>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="lingkaran mr-2"></div>
                                </td>
                                <td>Diisi oleh GKM Kaprodi</td>
                            </tr>
                        </tbody>
                    </table>
                    <hr>
                    <a type="button" class="btn btn-outline-danger btn-fw" href="<?php echo site_url('AsesorPengendalian'); ?>">
                        <i class="fa fa-undo"></i>
                        Kembali
                    </a>
                    <?php
                    foreach ($pendidikan as $row) { ?>
                        <a type="button" class="btn btn-outline-warning btn-fw pull-right" href="<?php echo site_url('AsesorPengendalian/sendPendidikan/' . $row->id_pendidikan_pengendalian); ?>" onclick="return confirm('Mohon cek kembali kelengkapan dokumen sebelum menyerahkan !!!')">
                            <i class="fa fa-send"></i>
                            Selesai Menilai
                        </a>
                    <?php } ?>
                    <hr>
                </div>
            </div>
        </div>