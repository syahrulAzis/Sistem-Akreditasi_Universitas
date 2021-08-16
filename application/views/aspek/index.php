<!-- partial -->
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <?php echo $this->session->flashdata('message'); ?>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="row">
                            <div class="col-md">
                                <div class="card-body">
                                    <h4 class="card-title">Aspek</h4>
                                    <hr>
                                    <a type="button" class="btn btn-outline-primary" href="<?php echo site_url('aspek/add'); ?>"> <i class="fa fa-plus"></i> Tambah</a>
                                    <hr>
                                    <div class="row">
                                        <div class="col-12 table-responsive">
                                            <style>
                                                table,
                                                td,
                                                th {
                                                    /* border: 1px solid #ddd; */
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
                                            <table id="order-listing" class="">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Kode Borang</th>
                                                        <th>Standar</th>
                                                        <th>Unit/Prodi</th>
                                                        <th>Turunan</th>
                                                        <th>Semester</th>
                                                        <th>Tahun</th>
                                                        <th>Aspek</th>
                                                        <th>Indokator</th>
                                                        <!-- <th>Bobot</th>
                                                        <th>Target</th> -->
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    foreach ($aspek as $a) { ?>
                                                        <tr>
                                                            <td><?php echo $no++ ?></td>
                                                            <td>
                                                                <?php
                                                                $id_penilaian = $a['penilaian_id'];

                                                                $this->db->where('id_penilaian', $id_penilaian);
                                                                $this->db->from('matrik_penilaian');
                                                                $q = $this->db->get();

                                                                foreach ($q->result() as $m) {
                                                                    echo $m->kode_magterik_penilaian_borang;
                                                                }
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                $id_standar = $a['standar_id'];

                                                                $this->db->where('id_standar', $id_standar);
                                                                $this->db->from('standar');
                                                                $query = $this->db->get();

                                                                foreach ($query->result() as $sss) {
                                                                    echo $sss->no_standar;
                                                                }
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                $id_prodi = $a['prodi_id'];

                                                                $this->db->where('id_prodi', $id_prodi);
                                                                $this->db->from('prodi');
                                                                $query = $this->db->get();

                                                                foreach ($query->result() as $n) {
                                                                    echo $n->nama_prodi;
                                                                }
                                                                ?>
                                                            </td>
                                                            <td><?php echo $a['turunan']; ?></td>
                                                            <td><?php echo $a['semester']; ?></td>
                                                            <td><?php echo $a['tahun']; ?></td>
                                                            <td><?php echo $a['aspek']; ?></td>
                                                            <td><?php echo $a['indikator']; ?></td>
                                                            <!-- <td><?php echo $a['bobot']; ?></td>
                                                            <td><?php echo $a['target_aspek']; ?> %</td> -->
                                                            <td>
                                                                <div class="dropdown">
                                                                    <button class="btn btn-primary icon-btn dropdown-toggle" type="button" id="dropdownMenuIconButton6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        <i class="icon-layers"></i>
                                                                    </button>
                                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton6">
                                                                        <a class="dropdown-item" href="<?php echo site_url('aspek/edit/' . $a['id_aspek_pendidikan']); ?>">Edit</a>
                                                                        <div class="dropdown-divider"></div>
                                                                        <a class="dropdown-item" href="<?php echo site_url('aspek/delete/' . $a['id_aspek_pendidikan']); ?>" onclick="return confirm('Apakah kamu yakin ?')">Hapus</a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>