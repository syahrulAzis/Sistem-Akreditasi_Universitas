<!-- partial -->
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <?php echo $this->session->flashdata('message'); ?>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Standar</h4>
                    <hr>
                    <form action="#">
                        <div class="form-group d-flex">
                            <input type="text" class="form-control" placeholder="Masukkan Deskripsi Standar untuk mencari ..." name="find">
                            <button type="submit" class="btn btn-primary ml-3">Search</button>
                        </div>
                    </form>
                    <hr>
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table id="order-listing" class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Standar</th>
                                        <th>Deskripsi</th>
                                        <th>Revisi</th>
                                        <th>Penyimpanan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($standar as $key => $standar) { ?>
                                        <tr>
                                            <td><?php echo $no++ ?></td>
                                            <td><?php echo $standar['no_standar']; ?></td>
                                            <td><?php echo $standar['deskripsi_standar']; ?></td>
                                            <td><?php echo $standar['revisi_standar']; ?></td>
                                            <td><?php echo $standar['penyimpanan']; ?></td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-primary icon-btn dropdown-toggle" type="button" id="dropdownMenuIconButton6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="icon-layers"></i>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton6">
                                                        <a class="dropdown-item" href="<?php echo site_url('Kaprodi/DetailStandar/' . $standar['id_standar']); ?>">Detail</a>
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