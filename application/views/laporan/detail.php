<!-- partial -->
<div class="container-fluid page-body-wrapper">
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Data</h4>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-dark">
                  <li class="breadcrumb-item">
                    <a href="<?= base_url('standar/detail/') . $lp['standar_id']; ?>"><?php
                                                                                      $id_standar = $lp['standar_id'];

                                                                                      $this->db->where('id_standar', $id_standar);
                                                                                      $this->db->from('standar');
                                                                                      $query = $this->db->get();

                                                                                      foreach ($query->result() as $standar) {
                                                                                        echo $standar->no_standar;
                                                                                      }
                                                                                      ?></a></li>
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
                                  <th>Standar</th>
                                  <td>:</td>
                                  <td>
                                    <?php
                                    $id_standar = $lp['standar_id'];

                                    $this->db->where('id_standar', $id_standar);
                                    $this->db->from('standar');
                                    $query = $this->db->get();

                                    foreach ($query->result() as $standar) {
                                      echo $standar->no_standar;
                                    }
                                    ?>
                                  </td>
                                </tr>
                                <tr>
                                  <th>Nama Laporan</th>
                                  <td>:</td>
                                  <td><?php echo $lp['nama_laporan']; ?></td>
                                </tr>
                                <tr>
                                  <th>Unit</th>
                                  <td>:</td>
                                  <td><?php echo $lp['unit_laporan']; ?></td>
                                </tr>
                                <tr>
                                  <th>Tahun Akademik</th>
                                  <td>:</td>
                                  <td><?php echo $lp['thn_akademik']; ?></td>
                                </tr>
                                <tr>
                                  <th>Semester</th>
                                  <td>:</td>
                                  <td><?php echo $lp['semester']; ?></td>
                                </tr>
                                <tr>
                                  <th>Tahun</th>
                                  <td>:</td>
                                  <td><?php echo $lp['tahun_laporan']; ?></td>
                                </tr>
                                <tr>
                                  <th>Penyusun</th>
                                  <td>:</td>
                                  <td><?php echo $lp['penyusun_laporan']; ?></td>
                                </tr>
                                <tr>
                                  <th>Tgl Pengesahan</th>
                                  <td>:</td>
                                  <td><?php echo $lp['tgl_pengesahan']; ?></td>
                                </tr>
                                <tr>
                                  <th>Volume</th>
                                  <td>:</td>
                                  <td><?php echo $lp['vol']; ?></td>
                                </tr>
                                <tr>
                                  <th>Sifat</th>
                                  <td>:</td>
                                  <td><?php echo $lp['sifat']; ?></td>
                                </tr>
                                <tr>
                                  <th>Jenis</th>
                                  <td>:</td>
                                  <td><?php echo $lp['jenis_laporan']; ?></td>
                                </tr>
                                <tr>
                                  <th>Kategori</th>
                                  <td>:</td>
                                  <td><?php echo $lp['kategori_laporan']; ?></td>
                                </tr>
                                <tr>
                                  <th>File</th>
                                  <td>:</td>
                                  <td><?php echo $lp['file']; ?></td>
                                </tr>
                                <tr>
                                  <th>Diunggah Oleh</th>
                                  <td>:</td>
                                  <td><?php
                                      $ids = $lp['user_id'];

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
                                  <td><?php echo $lp['timestamp_laporan']; ?></td>
                                </tr>
                              </tbody>
                            </table>
                            <hr>
                            <a type="button" class="btn btn-light" href="<?php echo site_url('Laporan'); ?>">Kembali</a>
                            <!-- <a type="button" class="btn btn-primary" href="<?php echo site_url('Laporan/download/' . $lp['id_laporan']); ?>">Unduh</a> -->
                            <a type="button" class="btn btn-warning" href="<?php echo site_url('Laporan/update/' . $lp['id_laporan']); ?>">Edit</a>
                            <a type="button" class="btn btn-danger" href="<?php echo site_url('Laporan/delete/' . $lp['id_laporan']); ?>" onclick="return confirm('Apakah kamu yakin ?')">Hapus</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade center" id="profile-5-2" role="tabpanel" aria-labelledby="tab-5-2">
                  <center>
                    <embed width="1050" height="1600" src="<?php if ($lp['file'] == false) {
                                                              echo base_url('unggah/laporan/') . 'empty';
                                                            } else {
                                                              echo base_url('unggah/laporan/') . $lp['file'];
                                                            }
                                                            ?>" type="application/pdf">
                    </embed>
                  </center>
                  <hr>
                    <a type="button" class="btn btn-light" href="<?php echo site_url('Laporan'); ?>">Kembali</a>
                    <!-- <a type="button" class="btn btn-primary" href="<?php echo site_url('Laporan/download/' . $lp['id_laporan']); ?>">Unduh</a> -->
                    <a type="button" class="btn btn-warning" href="<?php echo site_url('Laporan/update/' . $lp['id_laporan']); ?>">Edit</a>
                    <a type="button" class="btn btn-danger" href="<?php echo site_url('Laporan/delete/' . $lp['id_laporan']); ?>" onclick="return confirm('Apakah kamu yakin ?')">Hapus</a>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>

