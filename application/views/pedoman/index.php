<?php $this->load->view('template/header'); ?>

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">

        <?php echo $this->session->flashdata('message'); ?>
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Data Pedoman</h4>
              <hr>
                <a type="button" class="btn btn-primary" href="<?php echo site_url('pedoman/add'); ?>">Tambah</a>
              <hr>
                <form>
                  <div class="input-group mb-3">
                      <input type="text" class="form-control" placeholder="Masukkan No Pedoman untuk mencari ..." name="find">
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
                        <th>No Pedoman</th>
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
                    foreach ($pedoman as $key => $pedoman) { ?>
                      <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $pedoman['no_pedoman']; ?></td>
                        <td><?php echo $pedoman['deskripsi_pedoman']; ?></td>
                        <td><?php echo $pedoman['revisi_pedoman']; ?></td>
                        <td><?php echo $pedoman['tgl_pembuatan']; ?></td>
                        <td><?php echo $pedoman['tgl_berlaku']; ?></td>
                        <td><?php echo $pedoman['penyimpanan']; ?></td>
                          <td>
                            <div class="dropdown">
                              <button class="btn btn-primary icon-btn dropdown-toggle" type="button" id="dropdownMenuIconButton6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="icon-layers"></i>
                              </button>
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton6">
                                <a class="dropdown-item" href="<?php echo site_url('pedoman/detail/'.$pedoman['id_pedoman']); ?>">Detail</a>
                                <a class="dropdown-item" href="<?php echo site_url('pedoman/update/'.$pedoman['id_pedoman']); ?>">Edit</a>
                                <a class="dropdown-item" href="<?php echo site_url('pedoman/download/'.$pedoman['id_pedoman']); ?>">Unduh</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?php echo site_url('pedoman/delete/'.$pedoman['id_pedoman']); ?>" onclick="return confirm('Apakah kamu yakin ?')">Hapus</a>
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