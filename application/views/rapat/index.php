<!-- partial -->
<div class="container-fluid page-body-wrapper">
  <div class="main-panel">
    <div class="content-wrapper">
      <?php echo $this->session->flashdata('message'); ?>
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Rapat</h4>
          <hr>
          <a type="button" class="btn btn-primary" href="<?php echo site_url('Rapat/add'); ?>">Tambah</a>
          <a type="button" class="btn btn-primary" href="<?php echo site_url('hasilrapat/index'); ?>">Hasil Rapat</a>
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
                    <th>Hari</th>
                    <th>Tanggal</th>
                    <th>Penyelenggara Rapat</th>
                    <th>Materi</th>
                    <th>Peserta Undangan</th>
                    <th>Pimpinan Rapat</th>
                    <th>Notulen Rapat</th>
                    <th>Semester</th>
                    <th>Tahun Akademik</th>
                    <th>Jumlah Rapat</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($rapat as $key => $rapat) { ?>
                    <tr>
                      <td><?php echo $no++ ?></td>
                      <td><?php echo $rapat['hari']; ?></td>
                      <td><?php echo $rapat['tanggal']; ?></td>
                      <td><?php echo $rapat['jenis_rapat']; ?></td>
                      <td><?php echo $rapat['materi']; ?></td>
                      <td><?php echo $rapat['pst_undangan']; ?></td>
                      <td><?php echo $rapat['pimpinan_rapat']; ?></td>
                      <td><?php echo $rapat['notulen_rapat']; ?></td>
                      <td><?php echo $rapat['semester']; ?></td>
                      <td><?php echo $rapat['thn_akademik']; ?></td>
                      <td><?php echo $rapat['jml_rapat']; ?></td>
                      <td>
                        <div class="dropdown">
                          <button class="btn btn-primary icon-btn dropdown-toggle" type="button" id="dropdownMenuIconButton6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="icon-layers"></i>
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton6">
                            <a class="dropdown-item" href="<?php echo site_url('Rapat/detail/' . $rapat['id_rapat']); ?>">Detail</a>
                            <a class="dropdown-item" href="<?php echo site_url('Rapat/update/' . $rapat['id_rapat']); ?>">Edit</a>
                            <!-- <a class="dropdown-item" href="<?php echo site_url('Rapat/download/' . $rapat['id_rapat']); ?>">Unduh</a> -->
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?php echo site_url('Rapat/delete/' . $rapat['id_rapat']); ?>" onclick="return confirm('Apakah kamu yakin ?')">Hapus</a>
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