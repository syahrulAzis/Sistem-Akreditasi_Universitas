<!-- partial -->
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <?php echo $this->session->flashdata('message'); ?>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Permintaan Peningkatan</h4>
                    <hr>
                    <a type="button" class="btn btn-primary disabled" href="<?php echo site_url('user'); ?>" disabled>Tambah</a>
                    <hr>
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table id="order-listing" class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Foto</th>
                                        <th>Email</th>
                                        <th>Pesan</th>
                                        <th>Akses</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($userupgrade as $ug) { ?>
                                        <tr>
                                            <td><?php echo $no++ ?></td>
                                            <td class="py-1">
                                                <img src="<?= base_url('unggah/upgrade/') . $ug['file']; ?>" alt="image" />
                                            </td>
                                            <td><?php echo $ug['user_email']; ?></td>
                                            <td><?php echo $ug['pesan']; ?></td>
                                            <td><?php echo $ug['role_id']; ?></td>
                                            <td><?php echo $ug['status']; ?></td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-primary icon-btn dropdown-toggle" type="button" id="dropdownMenuIconButton6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="icon-layers"></i>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton6">
                                                        <a class="dropdown-item" href="<?php echo site_url('user/detailupgrade/' . $ug['id']); ?>">Tingkatkan</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item" href="<?php echo site_url('user/deleteupgrade/' . $ug['id']); ?>" onclick="return confirm('Apakah kamu yakin ?')">Hapus</a>
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