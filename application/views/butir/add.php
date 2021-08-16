<!-- partial -->
<div class="container-fluid page-body-wrapper">
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Tambah Butir Standar</h4>
              <?php echo form_open_multipart(); ?>
              <div class="form-group">
                <label>Standar</label>
                <select class="js-example-basic-single w-100" name="b_standarid" id="b_standarid" required>
                  <?php foreach ($butir as $b) : ?>
                    <option value="<?= $b['id_bstandar']; ?>"> 
                        <?php 
                            $id_bstandar = $b['id_bstandar']; 

                            $this->db->where('id_bstandar', $id_bstandar);
                            $this->db->from('b_standar');
                            $q = $this->db->get();

                            foreach($q->result() as $s) {
                                echo $s->nama_bstandar;
                            }
                        ?>
                    </option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <label>Nama Butir</label>
                <?php echo form_input('nama_butir', null, 'class="form-control" required="required"'); ?>
              </div>
              <div class="form-group">
                <label>Keterangan</label>
                <?php echo form_textarea('keterangan_butir', null, 'class="form-control" required="required"'); ?>
              </div>
              <hr>
              <button type="submit" class="btn btn-primary mr-2">Simpan</button>
              <a type="button" class="btn btn-light" href="<?php echo site_url('bbutirstandar'); ?>">Kembali</a>
              <?php echo form_close(); ?>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php $this->load->view('template/footer'); ?>