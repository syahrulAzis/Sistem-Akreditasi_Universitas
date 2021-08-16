<!-- partial -->
<div class="container-fluid page-body-wrapper">
  <div class="main-panel">
    <div class="content-wrapper">
      <?php echo $this->session->flashdata('message'); ?>
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Hasil & Progres Rapat</h4>
          <hr>
          <a type="button" class="btn btn-primary" href="<?php echo site_url('hasilrapat/add'); ?>">Tambah</a>
          <hr>
          <!-- <form>
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Masukkan No Standar untuk mencari ..." name="find">
              <div class="input-group-append">
                <button class="btn btn-success" type="submit">Cari</button>
              </div>
            </div>
          </form> -->
          <div class="row">
            <div class="col-12 table-responsive">
              <table id="order-listing" class="table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Tanggal Rapat</th>
                    <th>Penyelenggara Rapat</th>
                    <th>Jenis Keputusan</th>
                    <th>Penanggung Jawab</th>
                    <th>Rencana Tanggal Pelaksanaan</th>
                    <th>Progres</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($hasil_rapat as $key => $hasil_rapat) { ?>
                    <tr>
                      <td><?php echo $no++ ?></td>
                      <td><?php echo $hasil_rapat['tgl_rapat']; ?></td>
                      <td><?php echo $hasil_rapat['jns_rapat']; ?></td>
                      <td><?php echo $hasil_rapat['jns_keputusan']; ?></td>
                      <td><?php echo $hasil_rapat['pis']; ?></td>
                      <td><?php echo $hasil_rapat['rencana_tgl_pelaksanaan']; ?></td>
                      <td><?php echo $hasil_rapat['progres']; ?></td>
                      <td><?php echo $hasil_rapat['status']; ?></td>
                      <td>
                        <div class="dropdown">
                          <button class="btn btn-primary icon-btn dropdown-toggle" type="button" id="dropdownMenuIconButton6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="icon-layers"></i>
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton6">
                            <!-- <a class="dropdown-item" href="<?php echo site_url('hasilrapat/detail/' . $hasil_rapat['id_hasil']); ?>">Detail</a> -->
                            <a class="dropdown-item" href="<?php echo site_url('hasilrapat/update/' . $hasil_rapat['id_hasil']); ?>">Edit</a>
                            <!-- <a class="dropdown-item" href="<?php echo site_url('hasilrapat/download/' . $hasil_rapat['id_hasil']); ?>">Unduh</a> -->
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?php echo site_url('hasilrapat/delete/' . $hasil_rapat['id_hasil']); ?>" onclick="return confirm('Apakah kamu yakin ?')">Hapus</a>
                          </div>
                        </div>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>