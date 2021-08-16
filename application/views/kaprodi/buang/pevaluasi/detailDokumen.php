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
                                    <li class="breadcrumb-item active" aria-current="page"><?php echo $dokumen['object_id_pendidikan']; ?></li>
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
                                                                    <th>Object ID Pendidikan</th>
                                                                    <td>:</td>
                                                                    <td><?php echo $dokumen['object_id_pendidikan']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Deskripsi</th>
                                                                    <td>:</td>
                                                                    <td><?php echo $dokumen['des_pendidikan']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Tahun Ajaran</th>
                                                                    <td>:</td>
                                                                    <td><?php echo $dokumen['tahun_ajaran']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Periode</th>
                                                                    <td>:</td>
                                                                    <td><?php echo $dokumen['periode']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Kegiatan</th>
                                                                    <td>:</td>
                                                                    <td><?php echo $dokumen['kegiatan']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Aspek</th>
                                                                    <td>:</td>
                                                                    <td><?php echo $dokumen['aspek']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Dokumen</th>
                                                                    <td>:</td>
                                                                    <td><?php echo $dokumen['nama_dokumen']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>File</th>
                                                                    <td>:</td>
                                                                    <td><?php echo $dokumen['file']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Di Ungggah Oleh</th>
                                                                    <td>:</td>
                                                                    <td><?php echo $dokumen['name']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Status</th>
                                                                    <td>:</td>
                                                                    <td><?php echo $dokumen['nama_status']; ?> <i>(<?= $dokumen['ket_status']; ?>)</i></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Keterangan</th>
                                                                    <td>:</td>
                                                                    <td><?php echo $dokumen['keterangan_dokumen']; ?></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <hr>
                                                        <a type="button" class="btn btn-light" href="<?php echo site_url('KaprodiPendidikanEvaluasi/detail/' . $dokumen['pendidikan_id']); ?>">Kembali</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade center" id="profile-5-2" role="tabpanel" aria-labelledby="tab-5-2">
                                    <?php

                                    if ($dokumen['file'] == false) {
                                        echo '<center><h5>File tidak ditemukan !</h5></center>';
                                    } else {
                                        echo '<center><embed width="1050" height="1600" src="' . base_url('unggah/pendidikan/' . $dokumen['file']) . '" type="application/pdf"></embed></center>';
                                    }
                                    ?>
                                    <hr>
                                    <a type="button" class="btn btn-light" href="<?php echo site_url('KaprodiPendidikanEvaluasi/detail/' . $dokumen['pendidikan_id']); ?>">Kembali</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>