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
                                    <label>Standar</label>
                                    <select class="js-example-basic-single w-100" name="standar_id" id="standar_id" required>
                                        <option value="<?= $aspekdok['standar_id']; ?>">
                                            <?php
                                            $id_standar = $aspekdok['standar_id'];

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
                                        <? endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Manual Prosesur</label>
                                    <select class="js-example-basic-single w-100" name="mp_id" id="mp_id" required>
                                        <option value="<?= $aspekdok['mp_id']; ?>"><?= $aspekdok['mp_id']; ?></option>
                                        <?php foreach ($mp as $m) : ?>
                                            <option value="<?= $m['id_mp']; ?>"><?= $m['no_mp']; ?> (<?= $m['deskripsi_mp']; ?>)</option>
                                        <? endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>SOP</label>
                                    <select class="js-example-basic-single w-100" name="sop_id" id="sop_id" required>
                                        <option value="<?= $aspekdok['sop_id']; ?>"><?= $aspekdok['sop_id']; ?></option>
                                        <?php foreach ($sop as $sp) : ?>
                                            <option value="<?= $sp['id_sop']; ?>"><?= $sp['no_sop']; ?> (<?= $sp['deskripsi_sop']; ?>)</option>
                                        <? endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Formulir</label>
                                    <select class="js-example-basic-single w-100" name="formulir_id" id="formulir_id" required>
                                        <option value="<?= $aspekdok['formulir_id']; ?>"><?= $aspekdok['formulir_id']; ?></option>
                                        <?php foreach ($formulir as $f) : ?>
                                            <option value="<?= $f['id_formulir']; ?>"><?= $f['no_formulir']; ?> (<?= $f['deskripsi_formulir']; ?>)</option>
                                        <? endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Aspek</label>
                                    <select class="js-example-basic-single w-100" name="aspek_id" id="aspek_id" required>
                                        <option value="<?= $aspekdok['aspek_id']; ?>">
                                            <?php
                                            $aspek_id = $aspekdok['aspek_id'];

                                            $this->db->where('id_aspek_pendidikan', $aspek_id);
                                            $this->db->from('pendidikan_aspek');
                                            $query = $this->db->get();

                                            foreach ($query->result() as $spek) {
                                                echo $spek->aspek;
                                            }
                                            ?>
                                        </option>
                                        <?php foreach ($aspek as $a) : ?>
                                            <option value="<?= $a['id_aspek_pendidikan']; ?>"><?= $a['aspek']; ?></option>
                                        <? endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Pilih Role</label>
                                    <select class="js-example-basic-single w-100" name="role_id" id="role_id" required>
                                        <option value="<?= $aspekdok['role_id']; ?>">
                                            <?php
                                            $role_id = $aspekdok['role_id'];

                                            $this->db->where('id', $role_id);
                                            $this->db->from('user_role');
                                            $query = $this->db->get();

                                            foreach ($query->result() as $saturole) {
                                                echo $saturole->role;
                                            }
                                            ?>
                                        </option>
                                        <?php foreach ($role as $r) : ?>
                                            <option value="<?= $r['id']; ?>"><?= $r['role']; ?></option>
                                        <? endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Nama Dokumen</label>
                                    <?php echo form_textarea('nama_dokumen', $aspekdok['nama_dokumen'], 'class="form-control" required="required"'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Target Dokumen</label>
                                    <?php echo form_input('target_dokumen', $aspekdok['target_dokumen'], 'class="form-control" required="required"'); ?>
                                </div>
                                <hr>
                                <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                                <a type="button" class="btn btn-light" href="<?php echo site_url('pendidikan/getTipedokumen'); ?>">Kembali</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>