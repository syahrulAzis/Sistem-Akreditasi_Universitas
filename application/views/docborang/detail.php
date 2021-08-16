<!-- partial -->
<div class="container-fluid page-body-wrapper">
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Data</h4>
              <!-- <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-dark">
                  <li class="breadcrumb-item">
                    <a href="<?= base_url('standar/detail/') . $sop['standar_id']; ?>"><?php
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
                    <a href="<?= base_url('mp/detail/') . $sop['mp_id']; ?>"><?php
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
              </nav> -->
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
                                    $id_bstandar = $borang['bstandar_id'];

                                    $this->db->where('id_bstandar', $id_bstandar);
                                    $this->db->from('b_standar');
                                    $query = $this->db->get();

                                    foreach ($query->result() as $standar) {
                                      echo $standar->nama_bstandar;
                                    }
                                    ?>
                                  </td>
                                </tr>
                                <tr>
                                  <th>Butir Standar</th>
                                  <td>:</td>
                                  <td>
                                    <?php
                                    $id_butirstandar = $borang['butirstandar_id'];

                                    $this->db->where('id_butirstandar', $id_butirstandar);
                                    $this->db->from('b_butirstandar');
                                    $query = $this->db->get();

                                    foreach ($query->result() as $butir) {
                                      echo $butir->nama_butir.' ('.$butir->keterangan_butir.')';
                                    }
                                    ?>
                                  </td>
                                </tr>
                                <tr>
                                  <th>Fakultas</th>
                                  <td>:</td>
                                  <td>
                                    <?php
                                    $id_fakultas = $borang['fakultas_id'];

                                    $this->db->where('id_fakultas', $id_fakultas);
                                    $this->db->from('fakultas');
                                    $query = $this->db->get();

                                    foreach ($query->result() as $f) {
                                      echo $f->nama_fakultas;
                                    }
                                    ?>
                                  </td>
                                </tr>
                                <tr>
                                  <th>Program Studi</th>
                                  <td>:</td>
                                  <td>
                                    <?php
                                    $id_prodi = $borang['prodi_id'];

                                    $this->db->where('id_prodi', $id_prodi);
                                    $this->db->from('prodi');
                                    $query = $this->db->get();

                                    foreach ($query->result() as $p) {
                                      echo $p->nama_prodi;
                                    }
                                    ?>
                                  </td>
                                </tr>
                                <tr>
                                  <th>Kode Dokumen</th>
                                  <td>:</td>
                                  <td><?php echo $borang['kode_dokumen']; ?></td>
                                </tr>
                                <tr>
                                  <th>Nama Dokumen</th>
                                  <td>:</td>
                                  <td><?php echo $borang['nama_dokumen']; ?></td>
                                </tr>
                                <tr>
                                  <th>Tanggal Terbit</th>
                                  <td>:</td>
                                  <td><?php echo $borang['tanggal_terbit']; ?></td>
                                </tr>
                                <tr>
                                  <th>Periode Borang</th>
                                  <td>:</td>
                                  <td><?php echo $borang['periode_borang']; ?></td>
                                </tr>
                                <tr>
                                  <th>Keterangan</th>
                                  <td>:</td>
                                  <td><?php echo $borang['keterangan_dokumen']; ?></td>
                                </tr>
                                <tr>
                                  <th>File</th>
                                  <td>:</td>
                                  <td><?php echo $borang['file']; ?></td>
                                </tr>
                                <tr>
                                  <th>Diunggah Oleh</th>
                                  <td>:</td>
                                  <td><?php
                                      $ids = $borang['user_id'];

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
                                  <td><?php echo $borang['dokumentransaksi_timestamp']; ?></td>
                                </tr>
                              </tbody>
                            </table>
                            <hr>
                            <a type="button" class="btn btn-light" href="<?php echo site_url('docborang'); ?>">Kembali</a>
                            <!-- <a type="button" class="btn btn-primary" href="<?php echo site_url('docborang/download/' . $borang['id_dokumentransaksi']); ?>">Unduh</a>
                            <a type="button" class="btn btn-warning" href="<?php echo site_url('docborang/update/' . $borang['id_dokumentransaksi']); ?>">Edit</a> -->
                            <a type="button" class="btn btn-danger" href="<?php echo site_url('docborang/delete/' . $borang['id_dokumentransaksi']); ?>" onclick="return confirm('Apakah kamu yakin ?')">Hapus</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade center" id="profile-5-2" role="tabpanel" aria-labelledby="tab-5-2">
                  <center>
                    <embed width="1050" height="1600" src="<?php if ($borang['file'] == false) {
                                                              echo base_url('unggah/borang/') . 'empty';
                                                            } else {
                                                              echo base_url('unggah/borang/') . $borang['file'];
                                                            }
                                                            ?>" type="application/pdf">
                    </embed>
                  </center>
                  <hr>
                  <a type="button" class="btn btn-light" href="<?php echo site_url('docborang'); ?>">Kembali</a>
                  <!-- <a type="button" class="btn btn-primary" href="<?php echo site_url('docborang/download/' . $borang['id_dokumentransaksi']); ?>">Unduh</a> -->
                  <!-- <a type="button" class="btn btn-warning" href="<?php echo site_url('docborang/update/' . $borang['id_dokumentransaksi']); ?>">Edit</a> -->
                  <a type="button" class="btn btn-danger" href="<?php echo site_url('docborang/delete/' . $borang['id_dokumentransaksi']); ?>" onclick="return confirm('Apakah kamu yakin ?')">Hapus</a>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
