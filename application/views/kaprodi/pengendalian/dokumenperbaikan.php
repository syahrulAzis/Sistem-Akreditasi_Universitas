<!-- partial -->
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <?php echo $this->session->flashdata('message'); ?>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Dokumen Perbaikan</h4>
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table id="order-listing" class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Dokumen</th>
                                        <th>Nilai</th>
                                        <th>Diunggah Oleh</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($listdoc as $ld) { ?>
                                        <tr>
                                            <td><?php echo $no++ ?></td>
                                            <td>
                                                <p><a href="<?php echo base_url('unggah/pendidikan/' . $ld['file']); ?>" target="_blank"><?php echo $ld['file']; ?></a></p>
                                            </td>
                                            <td><?php echo $ld['nilai']; ?></td>
                                            <td><?php
                                                $ids = $ld['user_id'];
                                                $this->db->where('id', $ids);
                                                $this->db->from('user');
                                                $q = $this->db->get();

                                                foreach ($q->result() as $user) {
                                                    echo $user->name;
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>