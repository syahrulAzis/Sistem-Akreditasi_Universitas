<?php $this->load->view('template/header'); ?>

<!-- partial -->
<div class="container-fluid page-body-wrapper">
  <div class="main-panel">
    <div class="content-wrapper">

      <?php echo $this->session->flashdata('message'); ?>
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Data SOP</h4>
          <hr>
          <a type="button" class="btn btn-primary" href="<?php echo site_url('sop/add'); ?>">Tambah</a>
          <hr>
          <form>
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Masukkan No Sop untuk mencari ..." name="find">
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
                    <th>Sop</th>
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
                  foreach ($sop as $key => $sop) { ?>
                    <tr>
                      <td><?php echo $no++ ?></td>
                      <td>
                        <?php
                        $id_standar = $sop['standar_id'];

                        //cari standar
                        $this->db->where('id_standar', $id_standar);
                        $this->db->from('standar');
                        $query = $this->db->get();

                        foreach ($query->result() as $standar) {
                          echo $standar->no_standar;
                        }

                        //echo $sop['standar_id'] . '/' . $sop['mp_id'] . '/' . $sop['no_sop'];
                        ?>/
                        <?php
                        $id_mp = $sop['mp_id'];

                        //cari mp
                        $this->db->where('id_mp', $id_mp);
                        $this->db->from('mp');
                        $query = $this->db->get();

                        foreach ($query->result() as $mp) {
                          echo $mp->no_mp;
                        }
                        ?>/
                        <?=
                          $sop['no_sop'];
                        ?>
                      </td>
                      <td><?php echo $sop['deskripsi_sop']; ?></td>
                      <td><?php echo $sop['revisi_sop']; ?></td>
                      <td><?php echo $sop['tgl_pembuatan']; ?></td>
                      <td><?php echo $sop['tgl_berlaku']; ?></td>
                      <td><?php echo $sop['penyimpanan']; ?></td>
                      <td>
                        <div class="dropdown">
                          <button class="btn btn-primary icon-btn dropdown-toggle" type="button" id="dropdownMenuIconButton6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="icon-layers"></i>
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton6">
                            <a class="dropdown-item" href="<?php echo site_url('sop/detail/' . $sop['id_sop']); ?>">Detail</a>
                            <a class="dropdown-item" href="<?php echo site_url('sop/update/' . $sop['id_sop']); ?>">Edit</a>
                            <a class="dropdown-item" href="<?php echo site_url('sop/download/' . $sop['id_sop']); ?>">Unduh</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?php echo site_url('sop/delete/' . $sop['id_sop']); ?>" onclick="return confirm('Apakah kamu yakin ?')">Hapus</a>
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