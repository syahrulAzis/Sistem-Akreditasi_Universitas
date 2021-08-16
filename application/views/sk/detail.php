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
                  <li class="breadcrumb-item active" aria-current="page"><?php echo $sk['no_sk']; ?></li>
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
                                  <th>Jenis Surat Keputusan</th>
                                  <td>:</td>
                                  <td><?php echo $sk['jenis_sk']; ?></td>
                                </tr>
                                <tr>
                                  <th>No Surat Keputusan</th>
                                  <td>:</td>
                                  <td><?php echo $sk['no_sk']; ?></td>
                                </tr>
                                <tr>
                                  <th>Tentang</th>
                                  <td>:</td>
                                  <td><?php echo $sk['tentang_sk']; ?></td>
                                </tr>
                                <tr>
                                  <th>Tgl Berlaku</th>
                                  <td>:</td>
                                  <td><?php echo $sk['tgl_berlaku_sk']; ?></td>
                                </tr>
                                <tr>
                                  <th>Tgl Pengesahan</th>
                                  <td>:</td>
                                  <td><?php echo $sk['tgl_pengesahan_sk']; ?></td>
                                </tr>
                                <tr>
                                  <th>Tembusan</th>
                                  <td>:</td>
                                  <td><?php echo $sk['tembusan']; ?></td>
                                </tr>
                                <tr>
                                  <th>File</th>
                                  <td>:</td>
                                  <td><?php echo $sk['file']; ?></td>
                                </tr>
                                <tr>
                                  <th>Diunggah Oleh</th>
                                  <td>:</td>
                                  <td><?php
                                      $ids = $sk['user_id'];

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
                                  <td><?php echo $sk['timestamp_sk']; ?></td>
                                </tr>
                              </tbody>
                            </table>
                            <hr>
                            <a type="button" class="btn btn-light" href="<?php echo site_url('Suratkeputusan'); ?>">Kembali</a>
                            <!-- <a type="button" class="btn btn-primary" href="<?php echo site_url('Suratkeputusan/download/' . $sk['id_sk']); ?>">Unduh</a> -->
                            <a type="button" class="btn btn-warning" href="<?php echo site_url('Suratkeputusan/update/' . $sk['id_sk']); ?>">Edit</a>
                            <!-- <a type="button" class="btn btn-danger" href="<?php echo site_url('Suratkeputusan/delete/' . $sk['id_sk']); ?>" onclick="return confirm('Apakah kamu yakin ?')">Hapus</a> -->
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade center" id="profile-5-2" role="tabpanel" aria-labelledby="tab-5-2">
                  <center>
                    <embed width="1050" height="1600" src="<?php if ($sk['file'] == false) {
                                                              echo base_url('unggah/sk/') . 'empty';
                                                            } else {
                                                              echo base_url('unggah/sk/') . $sk['file'];
                                                            }
                                                            ?>" type="application/pdf">
                    </embed>
                  </center>
                  <hr>
                  <a type="button" class="btn btn-light" href="<?php echo site_url('Suratkeputusan'); ?>">Kembali</a>
                            <!-- <a type="button" class="btn btn-primary" href="<?php echo site_url('Suratkeputusan/download/' . $sk['id_sk']); ?>">Unduh</a> -->
                            <a type="button" class="btn btn-warning" href="<?php echo site_url('Suratkeputusan/update/' . $sk['id_sk']); ?>">Edit</a>
                            <!-- <a type="button" class="btn btn-danger" href="<?php echo site_url('Suratkeputusan/delete/' . $sk['id_sk']); ?>" onclick="return confirm('Apakah kamu yakin ?')">Hapus</a> -->
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
