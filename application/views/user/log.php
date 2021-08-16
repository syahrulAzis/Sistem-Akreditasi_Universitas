<!-- partial -->
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <?php echo $this->session->flashdata('message'); ?>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Catatan Pengguna</h4>
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table id="order-listing" class="table">
                                <thead>
                                    <tr>
                                        <th>User</th>
                                        <th>Message</th>
                                        <th>Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($log as $u) { ?>
                                        <tr>
                                            <td class="py-1">
                                                <img src="<?= base_url('unggah/profile/') . $u['image']; ?>" alt="image" />
                                            </td>
                                            <td>
                                                <p class="text-muted">
                                                    <i>
                                                        <?php echo $u['message']; ?>
                                                    </i>
                                                </p>
                                            </td>
                                            <td><?php echo $u['log_timestamp']; ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>