<!-- partial -->
<div class="container-fluid page-body-wrapper">
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Form Tambah Dokumen Borang</h4>
              <?php echo form_open_multipart(); ?>
              <div class="form-group">
                <label>Standar</label>
                <select class="js-example-basic-single w-100" name="bstandar_id" id="bstandar_id" required>
                  <?php foreach ($standar as $s) : ?>
                    <option value="<?= $s['id_bstandar']; ?>"><?= $s['nama_bstandar']; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <label>Butir Standar</label>
                <select class="js-example-basic-single w-100" name="butirstandar_id" id="butirstandar_id" required>
                  <?php foreach ($butir as $b) : ?>
                    <option value="<?= $b['id_butirstandar']; ?>"><?= $b['nama_butir']; ?> (<?= $b['keterangan_butir']; ?>)</option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <label>Fakultas</label>
                <select class="js-example-basic-single w-100" name="fakultas_id" id="fakultas_id" required>
                  <?php foreach ($fakultas as $f) : ?>
                    <option value="<?= $f['id_fakultas']; ?>"><?= $f['nama_fakultas']; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <label>Program Studi</label>
                <select class="js-example-basic-single w-100" name="prodi_id" id="prodi_id" required>
                  <?php foreach ($prodi as $p) : ?>
                    <option value="<?= $p['id_prodi']; ?>"><?= $p['nama_prodi']; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <label>Kode Dokumen</label>
                <?php echo form_input('kode_dokumen', null, 'class="form-control" required="required" placeholder=""'); ?>
              </div>
              <div class="form-group">
                <label>Nama Dokumen</label>
                <?php echo form_input('nama_dokumen', null, 'class="form-control" required="required" placeholder=""'); ?>
              </div>
              <div class="form-group">
                <label>Tanggal Terbit</label>
                <input type="date" name="tanggal_terbit" class="form-control" required="required" placeholder="">
              </div>
              <div class="form-group">
                <label>Periode Borang</label>
                <?php echo form_input('periode_borang', null, 'class="form-control" required="required" placeholder=""'); ?>
              </div>
              <div class="form-group">
                <label>Keterangan Dokumen</label>
                <?php echo form_textarea('keterangan_dokumen', null, 'class="form-control" required="required"'); ?>
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
              <a type="button" class="btn btn-light" href="<?php echo site_url('Docborang'); ?>">Kembali</a>
              <?php echo form_close(); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
