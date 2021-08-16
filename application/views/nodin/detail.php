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
                  <li class="breadcrumb-item active" aria-current="page"><?php echo $nodin['no_nota_dinas']; ?></li>
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
                                  <th>No Nota Dinas</th>
                                  <td>:</td>
                                  <td><?php echo $nodin['no_nota_dinas']; ?></td>
                                </tr>
                                <tr>
                                  <th>Kepada</th>
                                  <td>:</td>
                                  <td><?php echo $nodin['kepada']; ?></td>
                                </tr>
                                <tr>
                                  <th>Tembusan</th>
                                  <td>:</td>
                                  <td><?php echo $nodin['tembusan']; ?></td>
                                </tr>
                                <tr>
                                  <th>Dari</th>
                                  <td>:</td>
                                  <td><?php echo $nodin['dari']; ?></td>
                                </tr>
                                <tr>
                                  <th>Perihal</th>
                                  <td>:</td>
                                  <td><?php echo $nodin['perihal']; ?></td>
                                </tr>
                                <tr>
                                  <th>Lampiran</th>
                                  <td>:</td>
                                  <td><?php echo $nodin['lampiran']; ?></td>
                                </tr>
                                <tr>
                                  <th>Tgl Pengesahan</th>
                                  <td>:</td>
                                  <td><?php echo $nodin['tgl_pengesahan']; ?></td>
                                </tr>
                                <tr>
                                  <th>File</th>
                                  <td>:</td>
                                  <td><?php echo $nodin['file']; ?></td>
                                </tr>
                                <tr>
                                  <th>Diunggah Oleh</th>
                                  <td>:</td>
                                  <td><?php
                                      $ids = $nodin['user_id'];

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
                                  <td><?php echo $nodin['timestamp_nodin']; ?></td>
                                </tr>
                              </tbody>
                            </table>
                            <hr>
                            <a type="button" class="btn btn-light" href="<?php echo site_url('Notadinas'); ?>">Kembali</a>
                            <!-- <a type="button" class="btn btn-primary" href="<?php echo site_url('Notadinas/download/' . $nodin['id_nota_dinas']); ?>">Unduh</a> -->
                            <a type="button" class="btn btn-warning" href="<?php echo site_url('Notadinas/update/' . $nodin['id_nota_dinas']); ?>">Edit</a>
                            <a type="button" class="btn btn-danger" href="<?php echo site_url('Notadinas/delete/' . $nodin['id_nota_dinas']); ?>" onclick="return confirm('Apakah kamu yakin ?')">Hapus</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade center" id="profile-5-2" role="tabpanel" aria-labelledby="tab-5-2">
                  <center>
                    <embed width="1050" height="1600" src="<?php if ($nodin['file'] == false) {
                                                              echo base_url('unggah/nodin/') . 'empty';
                                                            } else {
                                                              echo base_url('unggah/nodin/') . $nodin['file'];
                                                            }
                                                            ?>" type="application/pdf">
                    </embed>
                  </center>
                  <hr>
                    <a type="button" class="btn btn-light" href="<?php echo site_url('Notadinas'); ?>">Kembali</a>
                    <!-- <a type="button" class="btn btn-primary" href="<?php echo site_url('Notadinas/download/' . $nodin['id_nota_dinas']); ?>">Unduh</a> -->
                    <a type="button" class="btn btn-warning" href="<?php echo site_url('Notadinas/update/' . $nodin['id_nota_dinas']); ?>">Edit</a>
                    <a type="button" class="btn btn-danger" href="<?php echo site_url('Notadinas/delete/' . $nodin['id_nota_dinas']); ?>" onclick="return confirm('Apakah kamu yakin ?')">Hapus</a>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
