<?php $this->load->view('template/header'); ?>

<!-- partial -->
<div class="container-fluid page-body-wrapper">
  <div class="main-panel">
    <div class="content-wrapper">
      <?php echo $this->session->flashdata('message'); ?>
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Data Manual Prosedur</h4>
          <hr>
          <a type="button" class="btn btn-primary" href="<?php echo site_url('mp/add'); ?>">Tambah</a>
          <hr>
          <form>
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Masukkan No Mp untuk mencari ..." name="find">
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
                    <th>Kode Mp</th>
                    <th>Deskripsi</th>
                    <th>Revisi</th>
                    <th>Tgl Pembuatan</th>
                    <th>Tgl Berlaku</th>
                    <th>Penyimpanan</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($mp as $key => $mp) { ?>
                    <tr>
                      <td><?php echo $no++ ?></td>
                      <td>
                        <?php
                        $id_standar = $mp['standar_id'];

                        $this->db->where('id_standar', $id_standar);
                        $this->db->from('standar');
                        $query = $this->db->get();

                        foreach ($query->result() as $standar) {
                          echo $standar->no_standar;
                        }
                        ?>/
                        <?php echo $mp['no_mp']; ?>
                      </td>
                      <td><?php echo $mp['deskripsi_mp']; ?></td>
                      <td><?php echo $mp['revisi_mp']; ?></td>
                      <td><?php echo $mp['tgl_pembuatan']; ?></td>
                      <td><?php echo $mp['tgl_berlaku']; ?></td>
                      <td><?php echo $mp['penyimpanan']; ?></td>
                      <td>
                        <div class="dropdown">
                          <button class="btn btn-primary icon-btn dropdown-toggle" type="button" id="dropdownMenuIconButton6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="icon-layers"></i>
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton6">
                            <a class="dropdown-item" href="<?php echo site_url('mp/detail/' . $mp['id_mp']); ?>">Detail</a>
                            <a class="dropdown-item" href="<?php echo site_url('mp/update/' . $mp['id_mp']); ?>">Edit</a>
                            <a class="dropdown-item" href="<?php echo site_url('mp/download/' . $mp['id_mp']); ?>">Unduh</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?php echo site_url('mp/delete/' . $mp['id_mp']); ?>" onclick="return confirm('Apakah kamu yakin ?')">Hapus</a>
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