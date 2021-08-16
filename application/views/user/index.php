<!-- partial -->
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <?php echo $this->session->flashdata('message'); ?>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Pengguna</h4>
                    <hr>
                    <a type="button" class="btn btn-primary" href="<?php echo site_url('user/add'); ?>" disabled>Tambah</a>
                    <hr>
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table id="order-listing" class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Foto</th>
                                        <th>Nama</th>
                                        <th>Telepon</th>
                                        <th>Dibuat</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($user as $u) { ?>
                                        <tr>
                                            <td><?php echo $no++ ?></td>
                                            <td class="py-1">
                                                <img src="<?= base_url('unggah/profile/') . $u['image']; ?>" alt="image" />
                                            </td>
                                            <td><?php echo $u['name']; ?></td>
                                            <td><?php echo $u['phone']; ?></td>
                                            <td><?= date('d F Y', $u['date_created']); ?></td>
                                            <td>
                                                <?php
                                                if ($u['is_active'] > 1) {
                                                    echo '<label class="badge badge-danger">Error</label>';
                                                } elseif ($u['is_active'] > 0) {
                                                    echo '<label class="badge badge-success">Aktif</label>';
                                                } else {
                                                    echo '<label class="badge badge-warning">Nonaktif</label>';
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-primary icon-btn dropdown-toggle" type="button" id="dropdownMenuIconButton6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="icon-layers"></i>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton6">
                                                        <a class="dropdown-item" href="<?php echo site_url('user/update/' . $u['id']); ?>">Sunting Profil</a>
                                                        <a class="dropdown-item" href="<?php echo site_url('user/updatepass/' . $u['id']); ?>">Sunting Sandi</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item" href="<?php echo site_url('user/delete/' . $u['id']); ?>" onclick="return confirm('Apakah kamu yakin ?')">Hapus</a>
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