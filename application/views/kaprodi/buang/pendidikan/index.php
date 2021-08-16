<!-- partial -->
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <?php echo $this->session->flashdata('message'); ?>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Pelaksanaan Pendidikan dan pengajaran</h4>
                    <hr>
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table id="order-listing" class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Objek Id</th>
                                        <th>Periode</th>
                                        <th>Kegiatan</th>
                                        <th>Tahun Ajaran</th>
                                        <th>Kelengkapan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($pendidikan as $p) { ?>
                                        <tr>
                                            <td><?php echo $no++ ?></td>
                                            <td><?php echo $p['object_id_pendidikan']; ?></td>
                                            <td><?php echo $p['periode']; ?></td>
                                            <td><?php echo $p['kegiatan']; ?></td>
                                            <td><?php echo $p['tahun_ajaran']; ?></td>
                                            <td>
                                                <div class="progress">
                                                    <?php
                                                    $hp = $p['id_pendidikan'];

                                                    $this->db->like('pendidikan_id', $hp);
                                                    $this->db->like('user_id', 0);
                                                    $this->db->from('pendidikan_transaksi');
                                                    $isi = $this->db->count_all_results();

                                                    $hitung = $total_asset - $isi;

                                                    $persen = $hitung / $total_asset * 100;
                                                    echo '<div class="progress-bar bg-success" role="progressbar" style="' . 'width: ' . $persen . '%' . '" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>';

                                                    ?>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-primary icon-btn dropdown-toggle" type="button" id="dropdownMenuIconButton6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="icon-layers"></i>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton6">
                                                        <a class="dropdown-item" href="<?php echo site_url('KaprodiPendidikan/detail/' . $p['id_pendidikan']); ?>">Detail</a>
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