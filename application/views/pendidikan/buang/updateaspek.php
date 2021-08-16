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
                                    <label for="exampleFormControlSelect1">Standar</label>
                                    <select class="form-control" name="standar_id" id="standar_id">
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
                                        <? endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="id_aspek_pendidikan" value="<?= $aspek['id_aspek_pendidikan']; ?>">
                                    <label>Aspek</label>
                                    <?php echo form_textarea('aspek', $aspek['aspek'], 'class="form-control" required="required"'); ?>
                                </div>
                                <hr>
                                <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                                <a type="button" class="btn btn-light" href="<?php echo site_url('pendidikan/getAspek'); ?>">Kembali</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>