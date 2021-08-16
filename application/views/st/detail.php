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
                  <li class="breadcrumb-item active" aria-current="page"><?php echo $st['no_st']; ?></li>
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
                                  <th>No Surat Tugas</th>
                                  <td>:</td>
                                  <td><?php echo $st['no_st']; ?></td>
                                </tr>
                                <tr>
                                  <th>Pemberi Tugas</th>
                                  <td>:</td>
                                  <td><?php echo $st['pemberi_tugas']; ?></td>
                                </tr>
                                <tr>
                                  <th>Penerima Tugas</th>
                                  <td>:</td>
                                  <td><?php echo $st['penerima_tugas']; ?></td>
                                </tr>
                                <tr>
                                  <th>Tgl Pengesahan</th>
                                  <td>:</td>
                                  <td><?php echo $st['tgl_pengesahan_st']; ?></td>
                                </tr>
                                <tr>
                                  <th>Jenis Penugasan</th>
                                  <td>:</td>
                                  <td><?php echo $st['jenis_penugasan']; ?></td>
                                </tr>
                                <tr>
                                  <th>Tgl Penugasan</th>
                                  <td>:</td>
                                  <td><?php echo $st['tgl_penugasan']; ?></td>
                                </tr>
                                <tr>
                                  <th>Tempat</th>
                                  <td>:</td>
                                  <td><?php echo $st['tempat_penugasan']; ?></td>
                                </tr>
                                <tr>
                                  <th>Lama Penugasan</th>
                                  <td>:</td>
                                  <td><?php echo $st['lama_penugasan']; ?></td>
                                </tr>
                                <tr>
                                  <th>File</th>
                                  <td>:</td>
                                  <td><?php echo $st['file']; ?></td>
                                </tr>
                                <tr>
                                  <th>Diunggah Oleh</th>
                                  <td>:</td>
                                  <td><?php
                                      $ids = $st['user_id'];

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
                                  <td><?php echo $st['timestamp_st']; ?></td>
                                </tr>
                              </tbody>
                            </table>
                            <hr>
                            <a type="button" class="btn btn-light" href="<?php echo site_url('Surattugas'); ?>">Kembali</a>
                            <!-- <a type="button" class="btn btn-primary" href="<?php echo site_url('Surattugas/download/' . $st['id_surat_tugas']); ?>">Unduh</a> -->
                            <a type="button" class="btn btn-warning" href="<?php echo site_url('Surattugas/update/' . $st['id_surat_tugas']); ?>">Edit</a>
                            <a type="button" class="btn btn-danger" href="<?php echo site_url('Surattugas/delete/' . $st['id_surat_tugas']); ?>" onclick="return confirm('Apakah kamu yakin ?')">Hapus</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade center" id="profile-5-2" role="tabpanel" aria-labelledby="tab-5-2">
                  <center>
                    <embed width="1050" height="1600" src="<?php if ($st['file'] == false) {
                                                              echo base_url('unggah/st/') . 'empty';
                                                            } else {
                                                              echo base_url('unggah/st/') . $st['file'];
                                                            }
                                                            ?>" type="application/pdf">
                    </embed>
                  </center>
                  <hr>
                  <a type="button" class="btn btn-light" href="<?php echo site_url('Surattugas'); ?>">Kembali</a>
                            <!-- <a type="button" class="btn btn-primary" href="<?php echo site_url('Surattugas/download/' . $st['id_surat_tugas']); ?>">Unduh</a> -->
                            <a type="button" class="btn btn-warning" href="<?php echo site_url('Surattugas/update/' . $st['id_surat_tugas']); ?>">Edit</a>
                            <a type="button" class="btn btn-danger" href="<?php echo site_url('Surattugas/delete/' . $st['id_surat_tugas']); ?>" onclick="return confirm('Apakah kamu yakin ?')">Hapus</a>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
