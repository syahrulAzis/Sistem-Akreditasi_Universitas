<!-- partial -->
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <?php echo $this->session->flashdata('message'); ?>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data SOP</h4>
                    <hr>
                    <form action="#">
                        <div class="form-group d-flex">
                            <input type="text" class="form-control" placeholder="Masukkan Deskripsi SOP untuk mencari ..." name="find">
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
                                        <th>Kode SOP</th>
                                        <th>Deskripsi</th>
                                        <th>Revisi</th>
                                        <th>Penyimpanan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($sop as $m => $sop) { ?>
                                        <tr>
                                            <td><?php echo $no++ ?></td>
                                            <td>
                                                <?php
                                                $id_standar = $sop['standar_id'];

                                                //cari standar
                                                $this->db->where('id_standar', $id_standar);
                                                $this->db->from('standar');
                                                $query = $this->db->get();

                                                foreach ($query->result() as $standar) {
                                                    echo $standar->no_standar;
                                                }

                                                //echo $sop['standar_id'] . '/' . $sop['mp_id'] . '/' . $sop['no_sop'];
                                                ?>/
                                                <?php
                                                $id_mp = $sop['mp_id'];

                                                //cari mp
                                                $this->db->where('id_mp', $id_mp);
                                                $this->db->from('mp');
                                                $query = $this->db->get();

                                                foreach ($query->result() as $mp) {
                                                    echo $mp->no_mp;
                                                }
                                                ?>/<?php echo $sop['no_sop']; ?></td>
                                            <td><?php echo $sop['deskripsi_sop']; ?></td>
                                            <td><?php echo $sop['revisi_sop']; ?></td>
                                            <td><?php echo $sop['penyimpanan']; ?></td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-primary icon-btn dropdown-toggle" type="button" id="dropdownMenuIconButton6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="icon-layers"></i>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton6">
                                                        <a class="dropdown-item" href="<?php echo site_url('AsesorSOP/detail/' . $sop['id_sop']); ?>">Detail</a>
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