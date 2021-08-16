<?php $this->load->view('template/header'); ?>

<!-- partial -->
<div class="container-fluid page-body-wrapper">
  <div class="main-panel">
    <div class="content-wrapper">
      <?php echo $this->session->flashdata('message'); ?>
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Data Butir Standar</h4>
          <hr>
          <a type="button" class="btn btn-primary" href="<?php echo site_url('bbutirstandar/add'); ?>">Tambah</a>
          <hr>
          <form>
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Masukkan Nama Butir untuk mencari ..." name="find">
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
                    <th>Nama Butir</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($butir as $key => $butir) { ?>
                    <tr>
                      <td><?php echo $no++ ?></td>
                      <td>
                        <?php
                        $id_bstandar = $butir['b_standarid'];

                        $this->db->where('id_bstandar', $id_bstandar);
                        $this->db->from('b_standar');
                        $query = $this->db->get();

                        foreach ($query->result() as $standar) {
                          echo $standar->nama_bstandar;
                        }
                        ?>
                      </td>
                      <td><?php echo $butir['nama_butir']; ?></td>
                      <td><?php echo $butir['keterangan_butir']; ?></td>
                      <td>
                        <div class="dropdown">
                          <button class="btn btn-primary icon-btn dropdown-toggle" type="button" id="dropdownMenuIconButton6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="icon-layers"></i>
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton6">
                            <!-- <a class="dropdown-item" href="<?php echo site_url('bbutirstandar/update/' . $butir['id_butirstandar']); ?>">Edit</a> -->
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?php echo site_url('bbutirstandar/delete/' . $butir['id_butirstandar']); ?>" onclick="return confirm('Apakah kamu yakin ?')">Hapus</a>
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

    <?php $this->load->view('template/footer'); ?>