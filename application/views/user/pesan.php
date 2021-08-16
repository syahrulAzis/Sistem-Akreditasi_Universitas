<!-- partial -->
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <?php echo $this->session->flashdata('message'); ?>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Pesan Masuk</h4>
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table id="order-listing" class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Subjek</th>
                                        <th>Dari</th>
                                        <th>Waktu</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($pesan as $key => $pesan) { ?>
                                        <tr>
                                            <td><?php echo $no++ ?></td>
                                            <td><?php echo $pesan['subjek']; ?></td>
                                            <td><?php echo $pesan['nama_depan']; ?> <?php echo $pesan['nama_belakang']; ?></td>
                                            <td><?php echo $pesan['lp_timestamp']; ?></td>
                                            <td><?php

                                                if ($pesan['status_pesan'] == null) {
                                                    echo '<div class="badge badge-warning badge-pill">Belum dibaca</div>';
                                                } else {
                                                    echo '<div class="badge badge-success badge-pill">' . $pesan['status_pesan'] . '</div>';
                                                }

                                                ?></td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-primary icon-btn dropdown-toggle" type="button" id="dropdownMenuIconButton6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="icon-layers"></i>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton6">
                                                        <a class="dropdown-item" href="<?php echo site_url('user/detailpesan/' . $pesan['id_lp']); ?>">Detail</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item" href="<?php echo site_url('user/deletepesan/' . $pesan['id_lp']); ?>" onclick="return confirm('Apakah kamu yakin ?')">Hapus</a>
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