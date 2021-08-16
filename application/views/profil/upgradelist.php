<!-- partial -->
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <?php echo $this->session->flashdata('message'); ?>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Pengajuan</h4>
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table id="order-listing" class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>File</th>
                                        <th>Akses</th>
                                        <th>Pesan</th>
                                        <th>Waktu</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($upgradelist as $ul) { ?>
                                        <tr>
                                            <td><?php echo $no++ ?></td>
                                            <td>
                                                <a href="<?= base_url('unggah/upgrade/') . $ul['file']; ?>" target="_blank">
                                                    <img border="0" alt="W3Schools" src="<?= base_url('unggah/upgrade/') . $ul['file']; ?>" width="100" height="100">
                                                </a>
                                            </td>
                                            <td><?php echo $ul['role_id']; ?></td>
                                            <td><?php echo $ul['pesan']; ?></td>
                                            <td><?php echo $ul['waktu']; ?></td>
                                            <td><?php echo $ul['status']; ?></td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-primary icon-btn dropdown-toggle" type="button" id="dropdownMenuIconButton6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="icon-layers"></i>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton6">
                                                        <a class="dropdown-item" href="<?php echo site_url('profil/detail/' . $ul['id']); ?>">Detail</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item" href="<?php echo site_url('profil/deleteupgrade/' . $ul['id']); ?>" onclick="return confirm('Apakah kamu yakin ?')">Hapus</a>
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