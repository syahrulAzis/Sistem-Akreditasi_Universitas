<!-- partial -->
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <?php echo $this->session->flashdata('message'); ?>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center">Pelaksanaan proses pembelajaran</h4>
                    <h5 class="text-center font-weight-bold">Kelengkapan Dokumen</h5>
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
                                <td><strong>Pembuat </strong> </td>
                                <td>: <?= $row->name; ?></td>
                                <td><strong>Dibuat </strong> </td>
                                <td>: <?= $row->pendidikan_timestamp; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Deskripsi </strong> </td>
                                <td>: <?= $row->des_pendidikan; ?></td>
                                <td><strong>Kelengkapan </strong> </td>
                                <td>:
                                    <div class="badge badge-pill badge-info">
                                        <?php
                                        $hp = $row->id_pendidikan;

                                        $this->db->like('pendidikan_id', $hp);
                                        $this->db->like('role_id', $this->session->userdata('role_id'));
                                        $this->db->from('pendidikan_transaksi');
                                        $jum_dok = $this->db->count_all_results();

                                        $this->db->like('pendidikan_id', $hp);
                                        $this->db->like('role_id', $this->session->userdata('role_id'));
                                        $this->db->like('log_pelaksanaan', $this->session->userdata('id'));
                                        $this->db->from('pendidikan_transaksi');
                                        $isi_dok = $this->db->count_all_results();

                                        echo $isi_dok;
                                        ?> / <?php echo $jum_dok; ?>
                                    </div>
                                </td>
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
                                    <th>#</th>
                                    <th>Aspek</th>
                                    <th>Dokumen</th>
                                    <th>Role</th>
                                    <th>File</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($dokumen as $row) { ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td>
                                            <?php
                                            $id_aspek = $row['aspek_id'];

                                            $this->db->where('id_aspek_pendidikan', $id_aspek);
                                            $this->db->from('pendidikan_aspek');
                                            $q = $this->db->get();

                                            foreach ($q->result() as $aspek) {
                                                echo $aspek->aspek;
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            $id_dokumen = $row['dokumen_id'];

                                            $this->db->where('id_dokumen_pendidikan', $id_dokumen);
                                            $this->db->from('pendidikan_dokumen');
                                            $q = $this->db->get();

                                            foreach ($q->result() as $dok) {
                                                echo $dok->nama_dokumen;
                                            }
                                            ?>
                                        </td>
                                        <td><?php
                                            $id_role = $row['role_id'];

                                            $this->db->where('id', $id_role);
                                            $this->db->from('user_role');
                                            $q = $this->db->get();

                                            foreach ($q->result() as $role) {
                                                echo $role->role;
                                            }
                                            ?></td>
                                        <td>
                                            <?php
                                            $id_dok = $row['id_transaksi_pendidikan'];

                                            $this->db->where('transaksi_pendidikan_id', $id_dok);
                                            $this->db->where('user_id', $this->session->userdata('id'));
                                            $this->db->from('pendidikan_file');
                                            $q = $this->db->get();

                                            if ($q->result() != null) {
                                                foreach ($q->result() as $file) {
                                                    echo '<a class="btn btn-icons btn-rounded btn-outline-success" href="' . base_url('unggah/pendidikan/' . $file->file) . '" target="_blank"><i class="fa fa-eye"></i></a>';
                                                }
                                            } else {
                                                echo '<button type="button" class="btn btn-icons btn-rounded btn-outline-light disabled""><i class="fa fa-eye-slash"></i></button>';
                                            }

                                            ?>
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-primary icon-btn dropdown-toggle" type="button" id="dropdownMenuIconButton6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="icon-layers"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton6">
                                                    <a class="dropdown-item" href="<?php echo site_url('Stafftu/UnggahDokumen/' . $row['id_transaksi_pendidikan']); ?>">Unggah</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <hr>
                    <a type="button" class="btn btn-outline-light btn-fw" href="<?php echo site_url('Stafftu/PelaksanaanPendidikan'); ?>">
                        <i class="fa fa-undo"></i>
                        Kembali
                    </a>
                    <hr>
                </div>
            </div>
        </div>