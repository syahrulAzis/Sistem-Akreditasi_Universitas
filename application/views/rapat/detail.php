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
                  <li class="breadcrumb-item active" aria-current="page"><?php echo $rapat['id_rapat']; ?></li>
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
                                  <th>Hari</th>
                                  <td>:</td>
                                  <td><?php echo $rapat['hari']; ?></td>
                                </tr>
                                <tr>
                                  <th>Tanggal</th>
                                  <td>:</td>
                                  <td><?php echo $rapat['tanggal']; ?></td>
                                </tr>
                                <tr>
                                  <th>Penyelenggara Rapat</th>
                                  <td>:</td>
                                  <td><?php echo $rapat['jenis_rapat']; ?></td>
                                </tr>
                                <tr>
                                  <th>Materi/Agenda</th>
                                  <td>:</td>
                                  <td><?php echo $rapat['materi']; ?></td>
                                </tr>
                                <tr>
                                  <th>Peserta Undangan</th>
                                  <td>:</td>
                                  <td><?php echo $rapat['pst_undangan']; ?></td>
                                </tr>
                                <tr>
                                  <th>Pimpinan Rapat</th>
                                  <td>:</td>
                                  <td><?php echo $rapat['pimpinan_rapat']; ?></td>
                                </tr>
                                <tr>
                                  <th>Notulen Rapat</th>
                                  <td>:</td>
                                  <td><?php echo $rapat['notulen_rapat']; ?></td>
                                </tr>
                                <tr>
                                  <th>Semester</th>
                                  <td>:</td>
                                  <td><?php echo $rapat['semester']; ?></td>
                                </tr>
                                <tr>
                                  <th>Tahun Akademik</th>
                                  <td>:</td>
                                  <td><?php echo $rapat['thn_akademik']; ?></td>
                                </tr>
                                <tr>
                                  <th>Jumlah Rapat</th>
                                  <td>:</td>
                                  <td><?php echo $rapat['jml_rapat']; ?></td>
                                </tr>
                                <tr>
                                  <th>File</th>
                                  <td>:</td>
                                  <td><?php echo $rapat['file']; ?></td>
                                </tr>
                                <tr>
                                  <th>Diunggah Oleh</th>
                                  <td>:</td>
                                  <td><?php
                                      $ids = $rapat['user_id'];

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
                                  <td><?php echo $rapat['timestamp']; ?></td>
                                </tr>
                              </tbody>
                            </table>
                            <hr>
                            <a type="button" class="btn btn-light" href="<?php echo site_url('Rapat'); ?>">Kembali</a>
                            <a type="button" class="btn btn-primary" href="<?php echo site_url('Rapat/download/' . $rapat['id_rapat']); ?>">Unduh</a>
                            <a type="button" class="btn btn-warning" href="<?php echo site_url('Rapat/update/' . $rapat['id_rapat']); ?>">Edit</a>
                            <a type="button" class="btn btn-danger" href="<?php echo site_url('Rapat/delete/' . $rapat['id_rapat']); ?>" onclick="return confirm('Apakah kamu yakin ?')">Hapus</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade center" id="profile-5-2" role="tabpanel" aria-labelledby="tab-5-2">
                  <center>
                    <embed width="1050" height="1600" src="<?php if ($rapat['file'] == false) {
                                                              echo base_url('unggah/rapat/') . 'empty';
                                                            } else {
                                                              echo base_url('unggah/rapat/') . $rapat['file'];
                                                            }
                                                            ?>" type="application/pdf">
                    </embed>
                  </center>
                  <hr>
                  <a type="button" class="btn btn-light" href="<?php echo site_url('Rapat'); ?>">Kembali</a>
                            <a type="button" class="btn btn-primary" href="<?php echo site_url('Rapat/download/' . $rapat['id_rapat']); ?>">Unduh</a>
                            <a type="button" class="btn btn-warning" href="<?php echo site_url('Rapat/update/' . $rapat['id_rapat']); ?>">Edit</a>
                            <a type="button" class="btn btn-danger" href="<?php echo site_url('Rapat/delete/' . $rapat['id_rapat']); ?>" onclick="return confirm('Apakah kamu yakin ?')">Hapus</a>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
