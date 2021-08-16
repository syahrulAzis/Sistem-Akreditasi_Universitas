<!-- partial -->
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <?php echo $this->session->flashdata('message'); ?>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Kegiatan</h4>
                    <hr>
                    <a type="button" class="btn btn-primary" href="<?php echo site_url('kegiatan/add'); ?>">Tambah</a>
                    <hr>
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table id="order-listing" class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Foto</th>
                                        <th>Judul Kegiatan</th>
                                        <th>Deskripsi Singkat</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($kegiatan as $key => $k) { ?>
                                        <tr>
                                            <td><?php echo $no++ ?></td>
                                            <td class="py-1">
                                                <a href="<?= base_url('unggah/kegiatan/') . $k['file']; ?>" target="_blank">
                                                    <img src="<?= base_url('unggah/kegiatan/') . $k['file']; ?>" alt="image" />
                                                </a>
                                            </td>
                                            <td><?php echo $k['judul_kegiatan']; ?></td>
                                            <td><?php echo $k['des_kegiatan']; ?></td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-primary icon-btn dropdown-toggle" type="button" id="dropdownMenuIconButton6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="icon-layers"></i>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton6">
                                                        <a class="dropdown-item" href="<?php echo site_url('kegiatan/update/' . $k['id_kegiatan']); ?>">Edit</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item" href="<?php echo site_url('kegiatan/delete/' . $k['id_kegiatan']); ?>" onclick="return confirm('Apakah kamu yakin ?')">Hapus</a>
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