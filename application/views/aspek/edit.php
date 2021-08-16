<!-- partial -->
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Basic form elements</h4>
                            <form action="" method="POST">
                                <div class="form-group">
                                    <label>Matrik Penilaian</label>
                                    <select class="js-example-basic-single w-100" name="penilaian_id" id="penilaian_id" required>
                                        <option value="<?= $aspek['penilaian_id']; ?>"><?= $aspek['penilaian_id']; ?></option>
                                        <?php foreach ($matrik as $m) : ?>
                                            <option value="<?= $m['id_penilaian']; ?>"><?= $m['kode_magterik_penilaian_borang']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Standar</label>
                                    <select class="js-example-basic-single w-100" name="standar_id" id="standar_id">
                                        <option value="<?= $aspek['standar_id']; ?>">
                                            <?php

                                            $id_standar = $aspek['standar_id'];

                                            $this->db->where('id_standar', $id_standar);
                                            $this->db->from('standar');
                                            $q = $this->db->get();

                                            foreach ($q->Result() as $s) {
                                                echo $s->no_standar . ' (' . $s->deskripsi_standar . ')';
                                            }

                                            ?>
                                        </option>
                                        <?php foreach ($standar as $s) : ?>
                                            <option value="<?= $s['id_standar']; ?>"><?= $s['no_standar']; ?> (<?= $s['deskripsi_standar']; ?>)</option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <!-- Prodi -->
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Program Study</label>
                                    <select class="js-example-basic-single w-100" name="prodi_id" id="prodi_id">
                                        <option value="<?= $aspek['prodi_id']; ?>">
                                            <?php

                                            $id_prodi = $aspek['prodi_id'];

                                            $this->db->where('id_prodi', $id_prodi);
                                            $this->db->from('prodi');
                                            $q = $this->db->get();

                                            foreach ($q->Result() as $p) {
                                                echo $p->nama_prodi . ' (' . $p->kode_prodi . ')';
                                            }

                                            ?>
                                        </option>
                                        <?php foreach ($prodi as $p) : ?>
                                            <option value="<?= $p['id_prodi']; ?>"><?= $p['nama_prodi']; ?> (<?= $p['kode_prodi']; ?>)</option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <!-- EndProdi -->

                                <div class="form-group">
                                    <label>Turunan</label>
                                    <?php echo form_input('turunan', $aspek['turunan'], 'class="form-control" required="required"'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Semester</label>
                                    <?php echo form_input('semester', $aspek['semester'], 'class="form-control" required="required"'); ?>
                                </div>

                                <div class="form-group">
                                    <input type="hidden" name="id_aspek_pendidikan" value="<?= $aspek['id_aspek_pendidikan']; ?>">
                                    <label>Aspek</label>
                                    <?php echo form_textarea('aspek', $aspek['aspek'], 'class="form-control" required="required"'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Indikator</label>
                                    <?php echo form_textarea('indikator', $aspek['indikator'], 'class="form-control" required="required"'); ?>
                                </div>
                                <!-- <div class="form-group">
                                    <label>Bobot</label>
                                    <?php echo form_input('bobot', $aspek['bobot'], 'class="form-control" required="required"'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Target</label>
                                    <input type="number" name="target_aspek" id="target_aspek" value="<?= $aspek['target_aspek']; ?>" class="form-control" required>
                                </div> -->
                                <hr>
                                <button type="submit" class="btn btn-outline-success mr-2"><i class="fa fa-save"></i> Simpan</button>
                                <a type="button" class="btn btn-outline-danger" href="<?php echo site_url('aspek'); ?>"><i class="fa fa-undo"></i> Kembali</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>