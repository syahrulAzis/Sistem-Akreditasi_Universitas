<?php $this->load->view('template/header'); ?>

<!-- partial -->
<div class="container-fluid page-body-wrapper">
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Tambah Standar</h4>
              <?php echo form_open_multipart(); ?>
              <div class="form-group">
                <label>Nama Standar</label>
                <?php echo form_input('nama_bstandar', null, 'class="form-control" required="required" placeholder=""'); ?>
              </div>
              <div class="form-group">
                <label>Versi</label>
                <input type="text" name="versi_bstandar" class="form-control" required="required" placeholder="">
              </div>
              <div class="form-group">
                <label>Tahun</label>
                <input type="number" name="tahun_bstandar" class="form-control" required="required" placeholder="">
              </div>
              <div class="form-group">
                <label>Jenis Standar</label>
                <?php echo form_input('jenis_bstandar', null, 'class="form-control" required="required" placeholder=""'); ?>
              </div>
              <hr>
              <button type="submit" class="btn btn-primary mr-2">Simpan</button>
              <a type="button" class="btn btn-light" href="<?php echo site_url('bstandar'); ?>">Kembali</a>
              <?php echo form_close(); ?>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php $this->load->view('template/footer'); ?>