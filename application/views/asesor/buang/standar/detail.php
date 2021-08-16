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
                                    <li class="breadcrumb-item active" aria-current="page"><?php echo $standar['no_standar']; ?></li>
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
                                                                    <th>No Standar</th>
                                                                    <td>:</td>
                                                                    <td><?php echo $standar['no_standar']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Deskripsi</th>
                                                                    <td>:</td>
                                                                    <td><?php echo $standar['deskripsi_standar']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Revisi</th>
                                                                    <td>:</td>
                                                                    <td><?php echo $standar['revisi_standar']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Tanggal Pembuatan</th>
                                                                    <td>:</td>
                                                                    <td><?php echo $standar['tgl_pembuatan']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Tanggal Berlaku</th>
                                                                    <td>:</td>
                                                                    <td><?php echo $standar['tgl_berlaku']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Keterangan</th>
                                                                    <td>:</td>
                                                                    <td><?php echo $standar['keterangan']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Dibuat Oleh</th>
                                                                    <td>:</td>
                                                                    <td><?php echo $standar['pembuat']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Dikendalikan Oleh</th>
                                                                    <td>:</td>
                                                                    <td><?php echo $standar['pengendali']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Disetujui Oleh</th>
                                                                    <td>:</td>
                                                                    <td><?php echo $standar['menyetujui']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Penyimpanan</th>
                                                                    <td>:</td>
                                                                    <td><?php echo $standar['penyimpanan']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>File</th>
                                                                    <td>:</td>
                                                                    <td><?php echo $standar['file']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Diunggah Oleh</th>
                                                                    <td>:</td>
                                                                    <td><?php
                                                                        $ids = $standar['user_id'];

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
                                                                    <td><?php echo $standar['timestamp']; ?></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <hr>
                                                        <a type="button" class="btn btn-light" href="<?php echo site_url('AsesorStandar'); ?>">Kembali</a>
                                                        <a type="button" class="btn btn-primary disabled" href="<?php echo site_url('standar/download/' . $standar['id_standar']); ?>">Unduh</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade center" id="profile-5-2" role="tabpanel" aria-labelledby="tab-5-2">
                                    <center>
                                        <embed width="1050" height="1600" src="<?php if ($standar['file'] == false) {
                                                                                    echo base_url('unggah/standar/') . 'empty';
                                                                                } else {
                                                                                    echo base_url('unggah/standar/') . $standar['file'];
                                                                                }
                                                                                ?>" type="application/pdf">
                                        </embed>
                                    </center>
                                    <hr>
                                    <a type="button" class="btn btn-light" href="<?php echo site_url('AsesorStandar'); ?>">Kembali</a>
                                    <a type="button" class="btn btn-primary disabled" href="<?php echo site_url('standar/download/' . $standar['id_standar']); ?>">Unduh</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>