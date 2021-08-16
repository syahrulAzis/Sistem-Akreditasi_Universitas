<!-- partial -->
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <?php echo $this->session->flashdata('message'); ?>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center">Laporan proses pembelajaran</h4>
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
                                    <th>#</th>
                                    <th>Ringkasan Pernyataan Standar</th>
                                    <th>Dokumen</th>
                                    <th>Status</th>
                                    <th>Keterangan</th>
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
                                        <td>
                                            <?php
                                            if ($row['status_perbaikan'] != 0) {
                                                // echo $row['status_perbaikan'];
                                                $sts = $row['status_perbaikan'];

                                                $this->db->where('id_status_pendidikan', $sts);
                                                $this->db->from('pendidikan_status');
                                                $q = $this->db->get();

                                                foreach ($q->result() as $status) {
                                                    if ($row['status_perbaikan'] > 2) {
                                                        echo '<div class="badge badge-pill badge-danger">' . $status->nama_status . '</div>';
                                                    } elseif ($row['status_perbaikan'] > 1) {
                                                        echo '<div class="badge badge-pill badge-warning">' . $status->nama_status . '</div>';
                                                    } else {
                                                        echo '<div class="badge badge-pill badge-success">' . $status->nama_status . '</div>';
                                                    }
                                                }
                                            } else {
                                                $sts = $row['status_id'];
                                                $this->db->where('id_status_pendidikan', $sts);
                                                $this->db->from('pendidikan_status');
                                                $q = $this->db->get();

                                                foreach ($q->result() as $status) {
                                                    if ($row['status_id'] > 2) {
                                                        echo '<div class="badge badge-pill badge-danger">' . $status->nama_status . '</div>';
                                                    } elseif ($row['status_id'] > 1) {
                                                        echo '<div class="badge badge-pill badge-warning">' . $status->nama_status . '</div>';
                                                    } else {
                                                        echo '<div class="badge badge-pill badge-success">' . $status->nama_status . '</div>';
                                                    }
                                                }
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ($row['perbaikan_dokumen'] != false) {
                                                echo $row['perbaikan_dokumen'];
                                            } else {
                                                echo $row['keterangan_dokumen'];
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Kondisi</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Ada fakta dengan bukti yang baik (OK)</td>
                                    <td>
                                        <?php
                                        $h_pendidikan = $row['pendidikan_id'];

                                        foreach ($dokumen as $row) {
                                            $status_id = $row['status_id'];

                                            $this->db->like('pendidikan_id', $h_pendidikan);
                                            $this->db->like('status_id', 1);
                                            $this->db->from('pendidikan_transaksi');
                                            $isi = $this->db->count_all_results();

                                            $this->db->like('pendidikan_id', $h_pendidikan);
                                            $this->db->like('status_perbaikan', 1);
                                            $this->db->from('pendidikan_transaksi');
                                            $isi2 = $this->db->count_all_results();
                                        }
                                        $totalOK = $isi + $isi2;
                                        echo $totalOK;
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Ada fakta dengan dokumen hampir lengkap (OB)</td>
                                    <td>
                                        <?php
                                        $h_pendidikan = $row['pendidikan_id'];

                                        $this->db->like('pendidikan_id', $h_pendidikan);
                                        $this->db->like('status_perbaikan', 2);
                                        $this->db->from('pendidikan_transaksi');
                                        echo $this->db->count_all_results();
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Tidak ada fakta atau dokumen kurang lengkap (KTS)</td>
                                    <td>
                                        <?php
                                        $h_pendidikan = $row['pendidikan_id'];

                                        $this->db->like('pendidikan_id', $h_pendidikan);
                                        $this->db->like('status_perbaikan', 3);
                                        $this->db->from('pendidikan_transaksi');
                                        echo $this->db->count_all_results();
                                        ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <hr>
                    <a type="button" class="btn btn-outline-light btn-fw" href="<?php echo site_url('Stafflp3m/PeningkatanPendidikan'); ?>">
                        <i class="fa fa-undo"></i>
                        Kembali
                    </a>
                    <hr>
                </div>
            </div>
        </div>