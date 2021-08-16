<!-- partial -->
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <?php echo $this->session->flashdata('message'); ?>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center">Form Kelengkapan Proses Pembelajaran</h4>
                    <h5 class="text-center font-weight-bold">Kelengkapan Dokumen</h5>
                    <hr>
                    <table class="table table-borderless w-100 mt-4">
                        <?php
                        $no = 1;
                        foreach ($pendidikan as $row) { ?>
                            <tr>
                                <td><strong>Form Id</strong> </td>
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
                            </tr>
                        <?php } ?>
                    </table>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Aspek</th>
                                    <th>Dokumen</th>
                                    <th>Status</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($dokumen as $row) { ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $row->aspek; ?></td>
                                        <td><?= $row->nama_dokumen; ?></td>
                                        <td><?php
                                            $id_status = $row->status_id;

                                            $this->db->where('id_status_pendidikan', $id_status);
                                            $this->db->from('pendidikan_status');
                                            $query = $this->db->get();

                                            foreach ($query->result() as $status) {
                                                echo $status->nama_status;
                                            }
                                            ?>
                                        </td>
                                        <td><?= $row->keterangan_dokumen; ?></td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-primary icon-btn dropdown-toggle" type="button" id="dropdownMenuIconButton6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="icon-layers"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton6">
                                                    <a class="dropdown-item" href="<?php echo site_url('AsesorPeningkatan/detailDokumen/' . $row->id_transaksi_pendidikan); ?>">Detail</a>
                                                </div>
                                            </div>
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
                                        $h_pendidikan = $row->pendidikan_id;

                                        $this->db->like('pendidikan_id', $h_pendidikan);
                                        $this->db->like('status_id', 1);
                                        $this->db->from('pendidikan_transaksi');
                                        echo $this->db->count_all_results();
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Ada fakta dengan dokumen hampir lengkap (OB)</td>
                                    <td>
                                        <?php
                                        $h_pendidikan = $row->pendidikan_id;

                                        $this->db->like('pendidikan_id', $h_pendidikan);
                                        $this->db->like('status_id', 2);
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
                                        $h_pendidikan = $row->pendidikan_id;

                                        $this->db->like('pendidikan_id', $h_pendidikan);
                                        $this->db->like('status_id', 3);
                                        $this->db->from('pendidikan_transaksi');
                                        echo $this->db->count_all_results();
                                        ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <hr>
                    <a type="button" class="btn btn-outline-danger btn-fw" href="<?php echo site_url('AsesorPeningkatan'); ?>">
                        <i class="fa fa-undo"></i>
                        Kembali
                    </a>
                    <hr>
                </div>
            </div>
        </div>