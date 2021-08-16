<!-- partial -->
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <?php echo $this->session->flashdata('message'); ?>
            <div class="row">
                <div class="col-md-12 grid-margin grid-margin-md-0 stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <?php
                            foreach ($dokumen as $row) { ?>
                                <h4 class="card-title">Data</h4>
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
                                                                        <th>Objek Id</th>
                                                                        <td>:</td>
                                                                        <td><?= $row->object_id_pendidikan; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Aspek</th>
                                                                        <td>:</td>
                                                                        <td><?= $row->aspek; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Dokumen</th>
                                                                        <td>:</td>
                                                                        <td><?= $row->nama_dokumen; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>File</th>
                                                                        <td>:</td>
                                                                        <td><?= $row->file; ?></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <hr>
                                                            <a type="button" class="btn btn-outline-primary btn-fw" href="<?php echo site_url('DosenPendidikan/detail/' . $row->pendidikan_id); ?>"><i class="fa fa-long-arrow-left"></i> Kembali</a>
                                                            <a type="button" class="btn btn-outline-info btn-fw" href="<?php echo site_url('DosenPendidikan/doupload/' . $row->id_transaksi_pendidikan); ?>"><i class="fa fa-upload"></i> Unggah</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade center" id="profile-5-2" role="tabpanel" aria-labelledby="tab-5-2">
                                        <center>
                                            <?php

                                            $dokumen = $row->file;

                                            if ($dokumen == false) {
                                                echo 'file tidak ditemukan';
                                            } else {
                                                echo '<embed width="1050" height="1600" src="' . base_url('unggah/pendidikan/') . $dokumen . '" type="application/pdf">';
                                            }
                                            ?>
                                        </center>
                                        <hr>
                                        <a type="button" class="btn btn-outline-primary btn-fw" href="<?php echo site_url('DosenPendidikan/detail/' . $row->pendidikan_id); ?>"><i class="fa fa-long-arrow-left"></i> Kembali</a>
                                        <a type="button" class="btn btn-outline-info btn-fw" href="<?php echo site_url('DosenPendidikan/doupload/' . $row->id_transaksi_pendidikan); ?>"><i class="fa fa-upload"></i> Unggah</a>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>


        <!-- Modal Unggah -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Unggah Dokumen</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?php echo form_open_multipart(''); ?>
                        <div class="form-group">
                            <label>File upload</label>
                            <div class="col-sm">
                                <div class="row">
                                    <div class="col-sm">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="file" name="file">
                                            <label for="file" class="custom-file-label">Pilih file</label>
                                            <p><i>* upload dengan format <b>pdf</b></i></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-outline-success btn-fw mr-2">
                            <i class="fa fa-save"></i>
                            Simpan
                        </button>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Ends -->