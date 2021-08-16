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
                <label>Standar</label>
                <select class="js-example-basic-single w-100" name="standar_id" id="standar_id" required>
                  <?php foreach ($standar as $s) : ?>
                    <option value="<?= $s['id_standar']; ?>"><?= $s['no_standar']; ?> (<?= $s['deskripsi_standar']; ?>)</option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <label>Nama Laporan</label>
                <?php echo form_input('nama_laporan', null, 'class="form-control" required="required" placeholder=""'); ?>
              </div>
              <div class="form-group">
                <label>Unit</label>
                <?php echo form_textarea('unit_laporan', null, 'class="form-control" required="required"'); ?>
              </div>
              <div class="form-group">
                <label>Tahun Akademik</label>
                <input type="text" name="thn_akademik" class="form-control" required="required" placeholder="">
              </div>
              <div class="form-group">
                <label>Semester</label>
                <input type="text" name="semester" class="form-control" required="required" placeholder="">
              </div>
              <div class="form-group">
                <label>Tahun Laporan</label>
                <input type="number" name="tahun_laporan" class="form-control" required="required" placeholder="">
              </div>
              <div class="form-group">
                <label>Penyusun</label>
                <?php echo form_input('penyusun_laporan', null, 'class="form-control" required="required" placeholder=""'); ?>
              </div>
              <div class="form-group">
                <label>Tanggal Pengesahan</label>
                <input type="date" name="tgl_pengesahan" class="form-control" required="required" placeholder="">
              </div>
              <div class="form-group">
                <label>Vol</label>
                <?php echo form_input('vol', null, 'class="form-control" required="required" placeholder=""'); ?>
              </div>
              <div class="form-group">
                <label>Sifat</label>
                <?php echo form_input('sifat', null, 'class="form-control" required="required" placeholder=""'); ?>
              </div>
              <div class="form-group">
                <label>Jenis Laporan</label>
                <?php echo form_input('jenis_laporan', null, 'class="form-control" required="required" placeholder=""'); ?>
              </div>
              <div class="form-group">
                <label>Kategori Laporan</label>
                <?php echo form_input('kategori_laporan', null, 'class="form-control" required="required" placeholder=""'); ?>
              </div>
              <div class="form-group">
                <label>File upload</label><br>
                <div class="col-sm">
                  <div class="row">
                    <div class="col-sm">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="file" name="file">
                        <label for="file" class="custom-file-label">Pilih file</label>
                        <p><i>* upload dengan format <b>pdf</b></i></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <hr>
              <button type="submit" class="btn btn-primary mr-2">Simpan</button>
              <a type="button" class="btn btn-light" href="<?php echo site_url('Laporan'); ?>">Kembali</a>
              <?php echo form_close(); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
