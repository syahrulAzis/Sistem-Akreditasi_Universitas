<!-- partial -->
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <?php echo $this->session->flashdata('message'); ?>
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-body">
                                    <h4 class="card-title">Data Pendidikan dan Pengajaran</h4>
                                    <center>
                                        <div class="template-demo">
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a type="button" class="btn btn-outline-secondary" href="<?php echo site_url('pendidikan'); ?>">Form <br>Pembelajaran</a>
                                            </div>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a type="button" class="btn btn-outline-secondary" href="<?php echo site_url('pendidikan/getAspek'); ?>">Aspek</a>
                                                <a type="button" class="btn btn-outline-secondary" href="<?php echo site_url('pendidikan/getTipedokumen'); ?>">Tipe <br>Dokumen</a>
                                                <a type="button" class="btn btn-outline-secondary" href="<?php echo site_url('pendidikan/getStatus'); ?>">Status <br>Dokumen</a>
                                                <a type="button" class="btn btn-outline-secondary" href="<?php echo site_url('pendidikan/getJad'); ?>">Kode <br>Jad</a>
                                                <a type="button" class="btn btn-outline-secondary" href="<?php echo site_url('pendidikan/getBorang'); ?>">Kode <br>Borang</a>
                                            </div>
                                        </div>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="row">
                            <div class="col-md">
                                <div class="card-body">
                                    <h4 class="card-title">Aspek</h4>
                                    <hr>
                                    <a type="button" class="btn btn-primary" href="<?php echo site_url('pendidikan/addaspek'); ?>">Tambah</a>
                                    <hr>
                                    <div class="row">
                                        <div class="col-12 table-responsive">
                                            <table id="order-listing" class="table">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Standar</th>
                                                        <th>Aspek</th>
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
                                                                $id_standar = $a['standar_id'];

                                                                $this->db->where('id_standar', $id_standar);
                                                                $this->db->from('standar');
                                                                $query = $this->db->get();

                                                                foreach ($query->result() as $sss) {
                                                                    echo $sss->no_standar;
                                                                }
                                                                ?>
                                                            </td>
                                                            <td><?php echo $a['aspek']; ?></td>
                                                            <td>
                                                                <div class="dropdown">
                                                                    <button class="btn btn-primary icon-btn dropdown-toggle" type="button" id="dropdownMenuIconButton6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        <i class="icon-layers"></i>
                                                                    </button>
                                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton6">
                                                                        <a class="dropdown-item" href="<?php echo site_url('pendidikan/updateaspek/' . $a['id_aspek_pendidikan']); ?>">Edit</a>
                                                                        <div class="dropdown-divider"></div>
                                                                        <a class="dropdown-item" href="<?php echo site_url('pendidikan/deleteaspek/' . $a['id_aspek_pendidikan']); ?>" onclick="return confirm('Apakah kamu yakin ?')">Hapus</a>
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