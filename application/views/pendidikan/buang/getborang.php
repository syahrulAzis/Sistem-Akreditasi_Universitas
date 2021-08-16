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
                                    <h4 class="card-title">Kode Borang</h4>
                                    <hr>
                                    <a type="button" class="btn btn-primary" href="<?php echo site_url('pendidikan/addborang'); ?>">Tambah</a>
                                    <hr>
                                    <div class="row">
                                        <div class="col-12 table-responsive">
                                            <table id="order-listing" class="table">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Kode</th>
                                                        <th>Deskripsi</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    foreach ($borang as $b) { ?>
                                                        <tr>
                                                            <td><?php echo $no++ ?></td>
                                                            <td><?php echo $b['kode_borang']; ?></td>
                                                            <td><?php echo $b['ket_kborang']; ?></td>
                                                            <td>
                                                                <div class="dropdown">
                                                                    <button class="btn btn-primary icon-btn dropdown-toggle" type="button" id="dropdownMenuIconButton6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        <i class="icon-layers"></i>
                                                                    </button>
                                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton6">
                                                                        <a class="dropdown-item" href="<?php echo site_url('pendidikan/updateborang/' . $b['id_kborang']); ?>">Edit</a>
                                                                        <div class="dropdown-divider"></div>
                                                                        <a class="dropdown-item" href="<?php echo site_url('pendidikan/deleteborang/' . $b['id_kborang']); ?>" onclick="return confirm('Apakah kamu yakin ?')">Hapus</a>
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