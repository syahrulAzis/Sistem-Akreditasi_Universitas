<!-- partial -->
<div class="container-fluid page-body-wrapper">
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Hoverable Table</h4>
              <p class="card-description">
                Detail data <code><?php echo $pedoman['no_pedoman']; ?></code>
              </p>
              <div class="table-responsive">
                <table class="table table-hover">
                  <tbody>
                    <tr>
                      <th>Id Pedoman</th>
                      <td>:</td>
                      <td><?php echo $pedoman['id_pedoman']; ?></td>
                    </tr>
                    <tr>
                      <th>No Pedoman</th>
                      <td>:</td>
                      <td><?php echo $pedoman['no_pedoman']; ?></td>
                    </tr>
                    <tr>
                      <th>Deskripsi</th>
                      <td>:</td>
                      <td><?php echo $pedoman['deskripsi_pedoman']; ?></td>
                    </tr>
                    <tr>
                      <th>Revisi</th>
                      <td>:</td>
                      <td><?php echo $pedoman['revisi_pedoman']; ?></td>
                    </tr>
                    <tr>
                      <th>Tanggal Pembuatan</th>
                      <td>:</td>
                      <td><?php echo $pedoman['tgl_pembuatan']; ?></td>
                    </tr>
                    <tr>
                      <th>Tanggal Berlaku</th>
                      <td>:</td>
                      <td><?php echo $pedoman['tgl_berlaku']; ?></td>
                    </tr>
                    <tr>
                      <th>Dibuat Oleh</th>
                      <td>:</td>
                      <td><?php echo $pedoman['pembuat']; ?></td>
                    </tr>
                    <tr>
                      <th>Diperiksa Oleh</th>
                      <td>:</td>
                      <td><?php echo $pedoman['pemeriksa']; ?></td>
                    </tr>
                    <tr>
                      <th>Disetujui Oleh</th>
                      <td>:</td>
                      <td><?php echo $pedoman['menyetujui']; ?></td>
                    </tr>
                    <tr>
                      <th>Penyimpanan</th>
                      <td>:</td>
                      <td><?php echo $pedoman['penyimpanan']; ?></td>
                    </tr>
                    <tr>
                      <th>File</th>
                      <td>:</td>
                      <td><?php echo $pedoman['file']; ?></td>
                    </tr>
                    <tr>
                      <th>Timestamp</th>
                      <td>:</td>
                      <td><?php echo $pedoman['timestamp']; ?></td>
                    </tr>
                  </tbody>
                </table>
                <hr>
                <a type="button" class="btn btn-light" href="<?php echo site_url('pedoman'); ?>">Kembali</a>
                <a type="button" class="btn btn-primary" href="<?php echo site_url('pedoman/download/' . $pedoman['id_pedoman']); ?>">Unduh</a>
                <a type="button" class="btn btn-warning" href="<?php echo site_url('pedoman/update/' . $pedoman['id_pedoman']); ?>">Edit</a>
                <a type="button" class="btn btn-danger" href="<?php echo site_url('pedoman/delete/' . $pedoman['id_pedoman']); ?>" onclick="return confirm('Apakah kamu yakin ?')">Hapus</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php $this->load->view('template/footer'); ?>