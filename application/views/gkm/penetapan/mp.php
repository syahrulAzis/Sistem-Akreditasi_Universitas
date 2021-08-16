<!-- partial -->
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <?php echo $this->session->flashdata('message'); ?>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Manual Prosedur</h4>
                    <hr>
                    <form action="#">
                        <div class="form-group d-flex">
                            <input type="text" class="form-control" placeholder="Masukkan Deskripsi MP untuk mencari ..." name="find">
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
                                        <th>Kode MP</th>
                                        <th>Deskripsi</th>
                                        <th>Revisi</th>
                                        <th>Penyimpanan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($mp as $m => $mp) { ?>
                                        <tr>
                                            <td><?php echo $no++ ?></td>
                                            <td>
                                                <?php
                                                $id_standar = $mp['standar_id'];

                                                $this->db->where('id_standar', $id_standar);
                                                $this->db->from('standar');
                                                $query = $this->db->get();

                                                foreach ($query->result() as $standar) {
                                                    echo $standar->no_standar;
                                                }
                                                ?>/
                                                <?php echo $mp['no_mp']; ?>
                                            </td>
                                            <td><?php echo $mp['deskripsi_mp']; ?></td>
                                            <td><?php echo $mp['revisi_mp']; ?></td>
                                            <td><?php echo $mp['penyimpanan']; ?></td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-primary icon-btn dropdown-toggle" type="button" id="dropdownMenuIconButton6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="icon-layers"></i>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton6">
                                                        <a class="dropdown-item" href="<?php echo site_url('Gkm/DetailMP/' . $mp['id_mp']); ?>">Detail</a>
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