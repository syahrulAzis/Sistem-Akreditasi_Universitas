<!-- partial -->
<div class="container-fluid page-body-wrapper">
  <div class="main-panel">
    <div class="content-wrapper">
      <?php echo $this->session->flashdata('message'); ?>
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Data Surat Keputusan</h4>
          <hr>
          <a type="button" class="btn btn-primary" href="<?php echo site_url('Suratkeputusan/add'); ?>">Tambah</a>
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
                    <th>Jenis SK</th>
                    <th>No SK</th>
                    <th>Tentang</th>
                    <th>Tgl Berlaku</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($sk as $key => $sk) { ?>
                    <tr>
                      <td><?php echo $no++ ?></td>
                      <td><?php echo $sk['jenis_sk']; ?></td>
                      <td><?php echo $sk['no_sk']; ?></td>
                      <td><?php echo $sk['tentang_sk']; ?></td>
                      <td><?php echo $sk['tgl_berlaku_sk']; ?></td>
                      <td>
                        <div class="dropdown">
                          <button class="btn btn-primary icon-btn dropdown-toggle" type="button" id="dropdownMenuIconButton6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="icon-layers"></i>
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton6">
                            <a class="dropdown-item" href="<?php echo site_url('Suratkeputusan/detail/' . $sk['id_sk']); ?>">Detail</a>
                            <a class="dropdown-item" href="<?php echo site_url('Suratkeputusan/update/' . $sk['id_sk']); ?>">Edit</a>
                            <!-- <a class="dropdown-item" href="<?php echo site_url('Suratkeputusan/download/' . $sk['id_sk']); ?>">Unduh</a> -->
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?php echo site_url('Suratkeputusan/delete/' . $sk['id_sk']); ?>" onclick="return confirm('Apakah kamu yakin ?')">Hapus</a>
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