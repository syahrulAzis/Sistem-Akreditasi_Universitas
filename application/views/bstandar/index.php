<!-- partial -->
<div class="container-fluid page-body-wrapper">
  <div class="main-panel">
    <div class="content-wrapper">
      <?php echo $this->session->flashdata('message'); ?>
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Data Borang Standar</h4>
          <hr>
          <a type="button" class="btn btn-primary" href="<?php echo site_url('bstandar/add'); ?>">Tambah</a>
          <hr>
          <form>
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Masukkan Nama Standar untuk mencari ..." name="find">
              <div class="input-group-append">
                <button class="btn btn-success" type="submit">Cari</button>
              </div>
            </div>
          </form>
          <div class="row">
            <div class="col-12 table-responsive">
              <table id="order-listing" class="table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Nama Standar</th>
                    <th>Versi</th>
                    <th>Tahun</th>
                    <th>Jenis</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($standar as $key => $standar) { ?>
                    <tr>
                      <td><?php echo $no++ ?></td>
                      <td><?php echo $standar['nama_bstandar']; ?></td>
                      <td><?php echo $standar['versi_bstandar']; ?></td>
                      <td><?php echo $standar['tahun_bstandar']; ?></td>
                      <td><?php echo $standar['jenis_bstandar']; ?></td>
                      <td>
                        <div class="dropdown">
                          <button class="btn btn-primary icon-btn dropdown-toggle" type="button" id="dropdownMenuIconButton6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="icon-layers"></i>
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton6">
                            <a class="dropdown-item" href="<?php echo site_url('bstandar/detail/' . $standar['id_bstandar']); ?>">Detail</a>
                            <a class="dropdown-item" href="<?php echo site_url('bstandar/update/' . $standar['id_bstandar']); ?>">Edit</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?php echo site_url('bstandar/delete/' . $standar['id_bstandar']); ?>" onclick="return confirm('Apakah kamu yakin ?')">Hapus</a>
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