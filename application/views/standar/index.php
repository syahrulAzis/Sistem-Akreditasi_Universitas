<!-- partial -->
<div class="container-fluid page-body-wrapper">
  <div class="main-panel">
    <div class="content-wrapper">
      <?php echo $this->session->flashdata('message'); ?>
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Data Standar</h4>
          <hr>
          <a type="button" class="btn btn-primary" href="<?php echo site_url('standar/add'); ?>">Tambah</a>
          <hr>
          <form>
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Masukkan No Standar untuk mencari ..." name="find">
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
                    <th>Standar</th>
                    <th>Deskripsi</th>
                    <th>Revisi</th>
                    <th>Penyimpanan</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($standar as $key => $standar) { ?>
                    <tr>
                      <td><?php echo $no++ ?></td>
                      <td><?php echo $standar['no_standar']; ?></td>
                      <td><?php echo $standar['deskripsi_standar']; ?></td>
                      <td><?php echo $standar['revisi_standar']; ?></td>
                      <td><?php echo $standar['penyimpanan']; ?></td>
                      <td>
                        <div class="dropdown">
                          <button class="btn btn-primary icon-btn dropdown-toggle" type="button" id="dropdownMenuIconButton6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="icon-layers"></i>
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton6">
                            <a class="dropdown-item" href="<?php echo site_url('standar/detail/' . $standar['id_standar']); ?>">Detail</a>
                            <a class="dropdown-item" href="<?php echo site_url('standar/update/' . $standar['id_standar']); ?>">Edit</a>
                            <a class="dropdown-item" href="<?php echo site_url('standar/download/' . $standar['id_standar']); ?>">Unduh</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?php echo site_url('standar/delete/' . $standar['id_standar']); ?>" onclick="return confirm('Apakah kamu yakin ?')">Hapus</a>
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