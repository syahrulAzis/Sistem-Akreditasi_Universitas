<!-- partial -->
<div class="container-fluid page-body-wrapper">
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Basic form elements</h4><br>
              <?php echo form_open_multipart(); ?>
              <div class="form-group">
                <label>No Pedoman</label>
                <?php echo form_input('no_pedoman', $pedoman['no_pedoman'], 'class="form-control" placeholder="SPT/01"'); ?>
              </div>
              <div class="form-group">
                <label>Deskripsi</label>
                <?php echo form_textarea('deskripsi_pedoman', $pedoman['deskripsi_pedoman'], 'class="form-control"'); ?>
              </div>
              <div class="form-group">
                <label>Revisi</label>
                <input type="number" name="revisi_pedoman" value="<?php echo $pedoman['revisi_pedoman']; ?>" class="form-control" placeholder="1">
              </div>
              <div class="form-group">
                <label>Tanggal Pembuatan</label>
                <input type="date" name="tgl_pembuatan" value="<?php echo $pedoman['tgl_pembuatan']; ?>" class="form-control" placeholder="">
              </div>
              <div class="form-group">
                <label>Tanggal Berlaku</label>
                <input type="date" name="tgl_berlaku" value="<?php echo $pedoman['tgl_berlaku']; ?>" class="form-control" placeholder="">
              </div>
              <div class="form-group">
                <label>Penyimpanan</label>
                <?php echo form_input('penyimpanan', $pedoman['penyimpanan'], 'class="form-control" placeholder="L1-R2"'); ?>
              </div>
              <div class="form-group">
                <label>Dibuat oleh</label>
                <?php echo form_input('pembuat', $pedoman['pembuat'], 'class="form-control" required="required" placeholder=""'); ?>
              </div>
              <div class="form-group">
                <label>Diperiksa oleh</label>
                <?php echo form_input('pemeriksa', $pedoman['pemeriksa'], 'class="form-control" required="required" placeholder=""'); ?>
              </div>
              <div class="form-group">
                <label>Disetujui oleh</label>
                <?php echo form_input('menyetujui', $pedoman['menyetujui'], 'class="form-control" required="required" placeholder=""'); ?>
              </div>
              <div class="form-group">
                <label>File upload</label><br>
                <?php echo form_upload('file', $pedoman['file'], 'id="file"'); ?>
              </div>
              <hr>
              <button type="submit" class="btn btn-primary mr-2">Simpan</button>
              <a type="button" class="btn btn-light" href="<?php echo site_url('pedoman'); ?>">Kembali</a>
              <?php echo form_close(); ?>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php $this->load->view('template/footer'); ?>