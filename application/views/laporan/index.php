
<!-- partial -->
<div class="container-fluid page-body-wrapper">
  <div class="main-panel">
    <div class="content-wrapper">
      <?php echo $this->session->flashdata('message'); ?>
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Data Laporan</h4>
          <hr>
          <a type="button" class="btn btn-primary" href="<?php echo site_url('Laporan/add'); ?>">Tambah</a>
          <hr>
          <!-- <form>
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Masukkan No Mp untuk mencari ..." name="find">
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
                    <th>Standar</th>
                    <th>Nama</th>
                    <th>Unit</th>
                    <th>Semester</th>
                    <th>Tahun</th>
                    <th>Tgl Pengesahan</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($lp as $key => $lp) { ?>
                    <tr>
                      <td><?php echo $no++ ?></td>
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
                      <td><?php echo $lp['nama_laporan']; ?></td>
                      <td><?php echo $lp['unit_laporan']; ?></td>
                      <td><?php echo $lp['semester']; ?></td>
                      <td><?php echo $lp['tahun_laporan']; ?></td>
                      <td><?php echo $lp['tgl_pengesahan']; ?></td>
                      <td>
                        <div class="dropdown">
                          <button class="btn btn-primary icon-btn dropdown-toggle" type="button" id="dropdownMenuIconButton6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="icon-layers"></i>
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton6">
                            <a class="dropdown-item" href="<?php echo site_url('Laporan/detail/' . $lp['id_laporan']); ?>">Detail</a>
                            <a class="dropdown-item" href="<?php echo site_url('Laporan/update/' . $lp['id_laporan']); ?>">Edit</a>
                            <!-- <a class="dropdown-item" href="<?php echo site_url('Laporan/download/' . $mp['id_laporan']); ?>">Unduh</a> -->
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?php echo site_url('Laporan/delete/' . $lp['id_laporan']); ?>" onclick="return confirm('Apakah kamu yakin ?')">Hapus</a>
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
