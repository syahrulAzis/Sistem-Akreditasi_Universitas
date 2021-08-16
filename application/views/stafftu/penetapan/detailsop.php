<!-- partial -->
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin grid-margin-md-0 stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Data</h4>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb bg-dark">
                                    <li class="breadcrumb-item">
                                        <a href="<?= base_url('DosenStandar/detail/') . $sop['standar_id']; ?>"><?php
                                                                                                                $id_standar = $sop['standar_id'];

                                                                                                                $this->db->where('id_standar', $id_standar);
                                                                                                                $this->db->from('standar');
                                                                                                                $query = $this->db->get();

                                                                                                                foreach ($query->result() as $standar) {
                                                                                                                    echo $standar->no_standar;
                                                                                                                }
                                                                                                                ?></a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="<?= base_url('DosenMP/detail/') . $sop['mp_id']; ?>"><?php
                                                                                                        $id_mp = $sop['mp_id'];

                                                                                                        $this->db->where('id_mp', $id_mp);
                                                                                                        $this->db->from('mp');
                                                                                                        $query = $this->db->get();

                                                                                                        foreach ($query->result() as $mp) {
                                                                                                            echo $mp->no_mp;
                                                                                                        }
                                                                                                        ?></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page"><?php echo $sop['no_sop']; ?></li>
                                </ol>
                            </nav>
                            <ul class="nav nav-tabs tab-solid tab-solid-danger" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="tab-5-1" data-toggle="tab" href="#home-5-1" role="tab" aria-controls="home-5-1" aria-selected="true">Detail</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab-5-2" data-toggle="tab" href="#profile-5-2" role="tab" aria-controls="profile-5-2" aria-selected="false">Baca</a>
                                </li>
                            </ul>
                            <div class="tab-content tab-content-solid">
                                <div class="tab-pane fade show active" id="home-5-1" role="tabpanel" aria-labelledby="tab-5-1">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table class="table table-hover">
                                                            <tbody>
                                                                <tr>
                                                                    <th>No Sop</th>
                                                                    <td>:</td>
                                                                    <td><?php
                                                                        $id_standar = $sop['standar_id'];

                                                                        $this->db->where('id_standar', $id_standar);
                                                                        $this->db->from('standar');
                                                                        $query = $this->db->get();

                                                                        foreach ($query->result() as $standar) {
                                                                            echo $standar->no_standar;
                                                                        }
                                                                        ?>/
                                                                        <?php
                                                                        $id_mp = $sop['mp_id'];

                                                                        $this->db->where('id_mp', $id_mp);
                                                                        $this->db->from('mp');
                                                                        $query = $this->db->get();

                                                                        foreach ($query->result() as $mp) {
                                                                            echo $mp->no_mp;
                                                                        }
                                                                        ?>/
                                                                        <?php echo $sop['no_sop']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Deskripsi</th>
                                                                    <td>:</td>
                                                                    <td><?php echo $sop['deskripsi_sop']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Revisi</th>
                                                                    <td>:</td>
                                                                    <td><?php echo $sop['revisi_sop']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Tanggal Pembuatan</th>
                                                                    <td>:</td>
                                                                    <td><?php echo $sop['tgl_pembuatan']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Tanggal Berlaku</th>
                                                                    <td>:</td>
                                                                    <td><?php echo $sop['tgl_berlaku']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Keterangan</th>
                                                                    <td>:</td>
                                                                    <td><?php echo $sop['keterangan']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Dibuat Oleh</th>
                                                                    <td>:</td>
                                                                    <td><?php echo $sop['pembuat']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Dikendalikan Oleh</th>
                                                                    <td>:</td>
                                                                    <td><?php echo $sop['pemeriksa']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Disetujui Oleh</th>
                                                                    <td>:</td>
                                                                    <td><?php echo $sop['menyetujui']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Penyimpanan</th>
                                                                    <td>:</td>
                                                                    <td><?php echo $sop['penyimpanan']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>File</th>
                                                                    <td>:</td>
                                                                    <td><?php echo $sop['file']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Diunggah Oleh</th>
                                                                    <td>:</td>
                                                                    <td><?php
                                                                        $ids = $sop['user_id'];

                                                                        $this->db->where('id', $ids);
                                                                        $this->db->from('user');
                                                                        $query = $this->db->get();

                                                                        foreach ($query->result() as $user) {
                                                                            echo $user->name;
                                                                        }
                                                                        ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Timestamp</th>
                                                                    <td>:</td>
                                                                    <td><?php echo $sop['timestamp']; ?></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <hr>
                                                        <a type="button" class="btn btn-outline-light" href="<?php echo site_url('Stafftu/PenetapanSOP'); ?>"><i class="fa fa-undo"></i> Kembali</a>
                                                        <a type="button" class="btn btn-outline-primary disabled" href="<?php echo site_url('sop/download/' . $sop['id_sop']); ?>"><i class="fa fa-download"></i> Unduh</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade center" id="profile-5-2" role="tabpanel" aria-labelledby="tab-5-2">
                                    <center>
                                        <embed width="1050" height="1600" src="<?php if ($sop['file'] == false) {
                                                                                    echo base_url('unggah/mp/') . 'empty';
                                                                                } else {
                                                                                    echo base_url('unggah/sop/') . $sop['file'];
                                                                                }
                                                                                ?>" type="application/pdf">
                                        </embed>
                                    </center>
                                    <hr>
                                    <a type="button" class="btn btn-outline-light" href="<?php echo site_url('Stafftu/PenetapanSOP'); ?>"><i class="fa fa-undo"></i>Kembali</a>
                                    <a type="button" class="btn btn-outline-primary disabled" href="<?php echo site_url('sop/download/' . $sop['id_sop']); ?>"><i class="fa fa-download"></i>Unduh</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>