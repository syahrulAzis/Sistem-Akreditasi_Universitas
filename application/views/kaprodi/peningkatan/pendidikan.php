<!-- partial -->
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <?php echo $this->session->flashdata('message'); ?>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Pengendalian Pendidikan dan pengajaran</h4>
                    <hr>
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table id="order-listing" class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Standar</th>
                                        <th>Object Id</th>
                                        <th>Periode</th>
                                        <th>Kegiatan</th>
                                        <th>Tahun Ajaran</th>
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
                                            <td><?php
                                                $id_s = $p['standar_id'];

                                                $this->db->where('id_standar', $id_s);
                                                $this->db->from('standar');
                                                $q = $this->db->get();

                                                foreach ($q->result() as $s) {
                                                    echo $s->no_standar;
                                                }
                                                ?></td>
                                            <td><?php echo $p['object_id_pendidikan']; ?></td>
                                            <td><?php echo $p['periode']; ?></td>
                                            <td><?php echo $p['kegiatan']; ?></td>
                                            <td><?php echo $p['tahun_ajaran']; ?></td>
                                            <td>
                                                <?php
                                                $n = $p['is_active_pendidikan'];

                                                if ($n > 3) {
                                                    echo '<label class="badge badge-success">Done</label>';
                                                } elseif ($n > 2) {
                                                    echo '<label class="badge badge-danger">Nonaktif</label>';
                                                } elseif ($n > 1) {
                                                    echo '<label class="badge badge-danger">Nonaktif</label>';
                                                } elseif ($n > 0) {
                                                    echo '<label class="badge badge-danger">Nonaktif</label>';
                                                } else {
                                                    echo '<label class="badge badge-danger">Nonaktif</label>';
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                if ($p['is_active_pendidikan'] != 4) {
                                                    echo '<button class="btn btn-danger icon-btn dropdown-toggle disabled" type="button" id="dropdownMenuIconButton6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="icon-ban"></i>
                                                </button>';
                                                } else {
                                                    echo '
                                                    <div class="dropdown">
                                                        <button class="btn btn-success icon-btn dropdown-toggle" type="button" id="dropdownMenuIconButton6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="icon-check"></i>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton6">
                                                            <a class="dropdown-item" href="' . site_url('Kaprodi/ReportPeningkatan/' . $p['id_pendidikan']) . '?>">Report Monev</a>
                                                            <a class="dropdown-item" href="' . site_url('Kaprodi/MutuPeningkatan/' . $p['id_pendidikan']) . '?>">Mutu</a>
                                                            <a class="dropdown-item" href="' . site_url('Kaprodi/PengendalianLampiran/' . $p['id_pendidikan']) . '?>">Lampiran</a>
                                                        </div>
                                                    </div>';
                                                }
                                                ?>
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