<!-- partial -->
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <?php echo $this->session->flashdata('message'); ?>
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Hoverable Table</h4>
                            <p class="card-description">
                                Akses Menu <code><?php echo $role['role']; ?></code>
                            </p>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <th>#</th>
                                        <th>Menu</th>
                                        <th>Akses</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($menu as $m) { ?>
                                            <tr>
                                                <td><?php echo $no++ ?></td>
                                                <td>
                                                    <div class="badge badge-pill badge-outline-info">
                                                        <i class="<?php echo $m['icon']; ?>"></i>
                                                        <?php echo $m['menu']; ?>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input" <?= check_access($role['id'], $m['id']); ?> data-role="<?= $role['id']; ?>" data-menu="<?= $m['id']; ?>">
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <hr>
                                <a type="button" class="btn btn-light" href="<?php echo site_url('aksesmenu'); ?>">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>