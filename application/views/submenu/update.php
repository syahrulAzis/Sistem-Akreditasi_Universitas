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
                                <input type="hidden" name="id" value="<?= $submenu['id']; ?>">
                                <div class="form-group">
                                    <label>Menu</label>
                                    <select class="js-example-basic-single w-100" name="menu_id" id="menu_id" required>
                                        <option value="<?= $submenu['menu_id']; ?>"><?php
                                                                                    $id = $submenu['menu_id'];

                                                                                    $this->db->where('id', $id);
                                                                                    $this->db->from('user_menu');
                                                                                    $q = $this->db->get();

                                                                                    foreach ($q->result() as $mn) {
                                                                                        echo $mn->menu;
                                                                                    }
                                                                                    ?></option>
                                        <?php foreach ($menu as $m) : ?>
                                            <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                                        <? endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Nama Sub Menu</label>
                                    <?php echo form_input('title', $submenu['title'], 'class="form-control" '); ?>
                                </div>
                                <div class="form-group">
                                    <label>URL</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><?php echo base_url(''); ?></span>
                                        </div>
                                        <?php echo form_input('url', $submenu['url'], 'class="form-control" '); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" value="1" name="is_active" id="is_active" 
                                            <?php
                                            if($submenu['is_active'] == 1){
                                                echo 'checked';
                                            }
                                            ?>
                                            >
                                            Aktif ?
                                        </label>
                                    </div>
                                </div>
                                <hr>
                                <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                                <a type="button" class="btn btn-light" href="<?php echo site_url('submenu'); ?>">Kembali</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>