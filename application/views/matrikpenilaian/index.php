<!-- partial -->
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <?php echo $this->session->flashdata('message'); ?>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Matrik Penilaian</h4>
                    <hr>
                    <a type="button" class="btn btn-outline-primary" href="<?php echo site_url('MatrikPenilaian/add'); ?>"><i class="fa fa-plus"></i> Tambah</a>
                    <hr>
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table id="order-listing" class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>No Butir</th>
                                        <th>Kode Elemen</th>
                                        <th>Elemen Penilaian</th>
                                        <th>Kode Indikator</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($matrik as $m) { ?>
                                        <tr>
                                            <td><?php echo $no++ ?></td>
                                            <td><?php echo $m['no_butir_matrik']; ?></td>
                                            <td><?php echo $m['kode_elemen_penilaian']; ?></td>
                                            <td><?php echo $m['elemen_penilaian']; ?></td>
                                            <td><?php echo $m['kode_indikator']; ?></td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-primary icon-btn dropdown-toggle" type="button" id="dropdownMenuIconButton6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="icon-layers"></i>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton6">
                                                        <a class="dropdown-item" href="<?php echo site_url('MatrikPenilaian/detail/' . $m['id_penilaian']); ?>">Detail</a>
                                                        <a class="dropdown-item" href="<?php echo site_url('MatrikPenilaian/update/' . $m['id_penilaian']); ?>">Edit</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item" href="<?php echo site_url('MatrikPenilaian/delete/' . $m['id_penilaian']); ?>" onclick="return confirm('Apakah kamu yakin ?')">Hapus</a>
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