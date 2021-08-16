<!-- partial -->
<div class="container-fluid page-body-wrapper">
  <div class="main-panel">
    <div class="content-wrapper">
      <?php echo $this->session->flashdata('message'); ?>
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Data Surat Tugas</h4>
          <hr>
          <a type="button" class="btn btn-primary" href="<?php echo site_url('Surattugas/add'); ?>">Tambah</a>
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
                    <th>Nomor Surat Tugas</th>
                    <th>Tgl Pengesahan</th>
                    <th>Tgl Penugasan</th>
                    <th>Jenis Penugasan</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($st as $key => $st) { ?>
                    <tr>
                      <td><?php echo $no++ ?></td>
                      <td><?php echo $st['no_st']; ?></td>
                      <td><?php echo $st['tgl_pengesahan_st']; ?></td>
                      <td><?php echo $st['tgl_penugasan']; ?></td>
                      <td><?php echo $st['jenis_penugasan']; ?></td>
                      <td>
                        <div class="dropdown">
                          <button class="btn btn-primary icon-btn dropdown-toggle" type="button" id="dropdownMenuIconButton6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="icon-layers"></i>
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton6">
                            <a class="dropdown-item" href="<?php echo site_url('Surattugas/detail/' . $st['id_surat_tugas']); ?>">Detail</a>
                            <a class="dropdown-item" href="<?php echo site_url('Surattugas/update/' . $st['id_surat_tugas']); ?>">Edit</a>
                            <!-- <a class="dropdown-item" href="<?php echo site_url('Surattugas/download/' . $st['id_surat_tugas']); ?>">Unduh</a> -->
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?php echo site_url('Surattugas/delete/' . $st['id_surat_tugas']); ?>" onclick="return confirm('Apakah kamu yakin ?')">Hapus</a>
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