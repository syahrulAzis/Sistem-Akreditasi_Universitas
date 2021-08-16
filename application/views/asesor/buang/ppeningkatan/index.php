<!-- partial -->
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <?php echo $this->session->flashdata('message'); ?>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Peningkatan Pendidikan dan pengajaran</h4>
                    <hr>
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table id="order-listing" class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Form Id</th>
                                        <th>Standar</th>
                                        <th>Fakultas</th>
                                        <th>Program Studi</th>
                                        <th>Periode</th>
                                        <th>Kegiatan</th>
                                        <th>Tahun Ajaran</th>
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
                                            <td>
                                                <?php
                                                $id_standar = $p['standar_id'];
                                                $this->db->where('id_standar', $id_standar);
                                                $this->db->from('standar');
                                                $q = $this->db->get();

                                                foreach ($q->result() as $standar) {
                                                    echo $standar->no_standar;
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                $fakultas_id = $p['fakultas_id'];
                                                $this->db->where('id_fakultas', $fakultas_id);
                                                $this->db->from('fakultas');
                                                $q = $this->db->get();

                                                foreach ($q->result() as $f) {
                                                    echo $f->kode_fakultas;
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                $prodi_id = $p['prodi_id'];
                                                $this->db->where('id_prodi', $prodi_id);
                                                $this->db->from('prodi');
                                                $q = $this->db->get();

                                                foreach ($q->result() as $prodi) {
                                                    echo $prodi->nama_prodi;
                                                }
                                                ?>
                                            </td>
                                            <td><?php echo $p['periode']; ?></td>
                                            <td><?php echo $p['kegiatan']; ?></td>
                                            <td><?php echo $p['tahun_ajaran']; ?></td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-primary icon-btn dropdown-toggle" type="button" id="dropdownMenuIconButton6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="icon-layers"></i>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton6">
                                                        <a class="dropdown-item" href="<?php echo site_url('AsesorPeningkatan/kelengkapan/' . $p['id_pendidikan_peningkatan']); ?>">Kelengkapan Dokumen</a>
                                                        <a class="dropdown-item" href="<?php echo site_url('AsesorPeningkatan/pengendalian/' . $p['id_pendidikan_peningkatan']); ?>">Tindak Lanjut Pengendalian</a>
                                                        <a class="dropdown-item" href="<?php echo site_url('AsesorPeningkatan/lampiran/' . $p['id_pendidikan_peningkatan']); ?>">Lampiran</a>
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