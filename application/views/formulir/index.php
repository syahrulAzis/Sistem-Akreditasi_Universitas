<?php $this->load->view('template/header'); ?>

<!-- partial -->
<div class="container-fluid page-body-wrapper">
  <div class="main-panel">
    <div class="content-wrapper">

      <?php echo $this->session->flashdata('message'); ?>
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Data Formulir</h4>
          <hr>
          <a type="button" class="btn btn-primary" href="<?php echo site_url('formulir/add'); ?>">Tambah</a>
          <hr>
          <form>
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Masukkan No Formulir untuk mencari ..." name="find">
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
                    <th>Formulir</th>
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
                  foreach ($formulir as $key => $formulir) { ?>
                    <tr>
                      <td><?php echo $no++ ?></td>
                      <td>
                        <?php
                        $id_standar = $formulir['standar_id'];

                        $this->db->where('id_standar', $id_standar);
                        $this->db->from('standar');
                        $query = $this->db->get();

                        foreach ($query->result() as $stn) {
                          echo $stn->no_standar;
                        }
                        ?>/
                        <?php
                        $id_mp = $formulir['mp_id'];

                        $this->db->where('id_mp', $id_mp);
                        $this->db->from('mp');
                        $query = $this->db->get();

                        foreach ($query->result() as $mp) {
                          echo $mp->no_mp;
                        }
                        ?>/
                        <?php
                        $id_sop = $formulir['sop_id'];

                        $this->db->where('id_sop', $id_sop);
                        $this->db->from('sop');
                        $query = $this->db->get();

                        foreach ($query->result() as $sp) {
                          echo $sp->no_sop;
                        }
                        ?>-
                        <?php echo $formulir['no_formulir']; ?>
                      </td>
                      <td><?php echo $formulir['deskripsi_formulir']; ?></td>
                      <td><?php echo $formulir['revisi_formulir']; ?></td>
                      <td><?php echo $formulir['tgl_pembuatan']; ?></td>
                      <td><?php echo $formulir['tgl_berlaku']; ?></td>
                      <td><?php echo $formulir['penyimpanan']; ?></td>
                      <td>
                        <div class="dropdown">
                          <button class="btn btn-primary icon-btn dropdown-toggle" type="button" id="dropdownMenuIconButton6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="icon-layers"></i>
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton6">
                            <a class="dropdown-item" href="<?php echo site_url('formulir/detail/' . $formulir['id_formulir']); ?>">Detail</a>
                            <a class="dropdown-item" href="<?php echo site_url('formulir/update/' . $formulir['id_formulir']); ?>">Edit</a>
                            <a class="dropdown-item" href="<?php echo site_url('formulir/download/' . $formulir['id_formulir']); ?>">Unduh</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?php echo site_url('formulir/delete/' . $formulir['id_formulir']); ?>" onclick="return confirm('Apakah kamu yakin ?')">Hapus</a>
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