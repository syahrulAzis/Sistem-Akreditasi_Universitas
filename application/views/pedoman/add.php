<!-- partial -->
<div class="container-fluid page-body-wrapper">
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Basic form elements</h4>
              <?php echo form_open_multipart(); ?>
              <div class="form-group">
                <label>No Pedoman</label>
                <?php echo form_input('no_pedoman', null, 'class="form-control" required="required" placeholder=""'); ?>
              </div>
              <div class="form-group">
                <label>Deskripsi</label>
                <?php echo form_textarea('deskripsi_pedoman', null, 'class="form-control" required="required"'); ?>
              </div>
              <div class="form-group">
                <label>Revisi</label>
                <input type="number" name="revisi_pedoman" class="form-control" required="required" placeholder="">
              </div>
              <div class="form-group">
                <label>Tanggal Pembuatan</label>
                <input type="date" name="tgl_pembuatan" class="form-control" required="required" placeholder="">
              </div>
              <div class="form-group">
                <label>Tanggal Berlaku</label>
                <input type="date" name="tgl_berlaku" class="form-control" required="required" placeholder="">
              </div>
              <div class="form-group">
                <label>Penyimpanan</label>
                <?php echo form_input('penyimpanan', null, 'class="form-control" required="required" placeholder=""'); ?>
              </div>
              <div class="form-group">
                <label>Dibuat oleh</label>
                <?php echo form_input('pembuat', null, 'class="form-control" required="required" placeholder=""'); ?>
              </div>
              <div class="form-group">
                <label>Diperiksa oleh</label>
                <?php echo form_input('pemeriksa', null, 'class="form-control" required="required" placeholder=""'); ?>
              </div>
              <div class="form-group">
                <label>Disetujui oleh</label>
                <?php echo form_input('menyetujui', null, 'class="form-control" required="required" placeholder=""'); ?>
              </div>
              <div class="form-group">
                <label>File upload</label><br>
                <?php echo form_upload('file', null, 'id="file"'); ?>
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