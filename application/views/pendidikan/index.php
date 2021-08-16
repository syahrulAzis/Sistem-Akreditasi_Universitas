<!-- partial -->
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <?php echo $this->session->flashdata('message'); ?>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="row">
                            <div class="col-md">
                                <div class="card-body">
                                    <h4 class="card-title">Data Pendidikan dan Pengajaran</h4>
                                    <hr>
                                    <a type="button" class="btn btn-outline-primary" href="<?php echo site_url('pendidikan/add'); ?>"><i class="fa fa-plus-circle"></i>Tambah</a>
                                    <hr>
                                    <div class="row">
                                        <div class="col-12 table-responsive">
                                            <table id="order-listing" class="table">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Standar</th>
                                                        <th>Object Id</th>
                                                        <th>Program Studi</th>
                                                        <th>Tahun Ajaran</th>
                                                        <th>Kelengkapan</th>
                                                        <th>Keterangan</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    foreach ($pendidikan as $p) { ?>
                                                        <tr>
                                                            <td><?php echo $no++ ?></td>
                                                            <td>
                                                                <?php
                                                                $id_standar = $p->standar_id;

                                                                $this->db->where('id_standar', $id_standar);
                                                                $this->db->from('standar');
                                                                $query = $this->db->get();

                                                                foreach ($query->Result() as $standar) {
                                                                    echo $standar->no_standar;
                                                                }
                                                                ?>
                                                            </td>
                                                            <td><?php echo $p->object_id_pendidikan; ?></td>
                                                            <td><?php echo $p->nama_prodi; ?></td>
                                                            <td>
                                                                <?php echo $p->tahun_ajaran; ?>
                                                            </td>
                                                            <td>
                                                                <div class="progress">
                                                                    <?php
                                                                    $hp = $p->id_pendidikan;
                                                                    $this->db->like('pendidikan_id', $hp);
                                                                    $this->db->from('pendidikan_transaksi');
                                                                    $isi = $this->db->count_all_results();

                                                                    $persen = $isi / $total_asset * 100;
                                                                    echo '<div class="progress-bar bg-success" role="progressbar" style="' . 'width: ' . $persen . '%' . '" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>';

                                                                    ?>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                $n = $p->is_active_pendidikan;

                                                                if ($n > 3) {
                                                                    echo '<label class="badge badge-success">Peningkatan</label>';
                                                                } elseif ($n > 2) {
                                                                    echo '<label class="badge badge-warning">Pengendalian</label>';
                                                                } elseif ($n > 1) {
                                                                    echo '<label class="badge badge-secondary">Evaluasi</label>';
                                                                } elseif ($n > 0) {
                                                                    echo '<label class="badge badge-info">Pelaksanaan</label>';
                                                                } else {
                                                                    echo '<label class="badge badge-danger">Nonaktif</label>';
                                                                }
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <div class="dropdown">
                                                                    <button class="btn btn-primary icon-btn dropdown-toggle" type="button" id="dropdownMenuIconButton6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        <i class="icon-layers"></i>
                                                                    </button>
                                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton6">
                                                                        <a class="dropdown-item" href="<?php echo site_url('pendidikan/detail/' . $p->id_pendidikan); ?>">Detail</a>
                                                                        <a class="dropdown-item" href="<?php echo site_url('pendidikan/update/' . $p->id_pendidikan); ?>">Edit</a>
                                                                        <div class="dropdown-divider"></div>
                                                                        <a class="dropdown-item" href="<?php echo site_url('pendidikan/delete/' . $p->id_pendidikan); ?>" onclick="return confirm('Apakah kamu yakin ?')">Hapus</a>
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
                    </div>
                </div>
            </div>
        </div>