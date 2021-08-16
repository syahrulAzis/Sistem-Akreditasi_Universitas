<!-- partial -->
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">

            <?php echo $this->session->flashdata('message'); ?>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Submenu</h4>
                    <hr>
                    <a type="button" class="btn btn-primary" href="<?php echo site_url('submenu/add'); ?>">Tambah</a>
                    <hr>
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table id="order-listing" class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Menu</th>
                                        <th>Sub Menu</th>
                                        <th>Url</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($submenu as $sb) { ?>
                                        <tr>
                                            <td><?php echo $no++ ?></td>
                                            <td>
                                                <div class="badge badge-pill badge-outline-info">
                                                    <i class="<?php echo $sb['icon']; ?>"></i>
                                                    <?php echo $sb['menu']; ?>
                                                </div>
                                            </td>
                                            </td>
                                            <td><?php echo $sb['title']; ?></td>
                                            <td><?php echo site_url('' . $sb['url']); ?></td>
                                            <td><?php
                                                if ($sb['is_active'] > 1) {
                                                    echo '<label class="badge badge-danger">Error</label>';
                                                } elseif ($sb['is_active'] > 0) {
                                                    echo '<label class="badge badge-success">Aktif</label>';
                                                } else {
                                                    echo '<label class="badge badge-warning">Nonaktif</label>';
                                                }
                                                ?>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-primary icon-btn dropdown-toggle" type="button" id="dropdownMenuIconButton6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="icon-layers"></i>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton6">
                                                        <a class="dropdown-item" href="<?php echo site_url('submenu/update/' . $sb['id']); ?>">Sunting</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item" href="<?php echo site_url('submenu/delete/' . $sb['id']); ?>" onclick="return confirm('Apakah kamu yakin ?')">Hapus</a>
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