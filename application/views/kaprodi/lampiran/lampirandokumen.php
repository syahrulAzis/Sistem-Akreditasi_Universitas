<!-- partial -->
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <?php echo $this->session->flashdata('message'); ?>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Lampiran</h4>
                    <hr>
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <style>
                                table,
                                td,
                                th {
                                    /* border: 1px solid #ddd; */
                                    text-align: left;
                                }

                                table {
                                    /* border-collapse: collapse; */
                                    width: 100%;
                                }

                                th,
                                td {
                                    padding: 15px;
                                }
                            </style>
                            <table id="order-listing" class="table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Lampiran</th>
                                        <th>Deskripsi</th>
                                        <th>Diunggah Oleh</th>
                                        <th>File</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($lampiran as $key => $lampiran) { ?>
                                        <tr>
                                            <td><?php echo $no++ ?></td>
                                            <td><?php echo $lampiran['nama_lampiran']; ?></td>
                                            <td><?php echo $lampiran['deskripsi_lampiran']; ?></td>
                                            <td><?php
                                                $ids = $lampiran['user_id'];
                                                $this->db->where('id', $ids);
                                                $this->db->from('user');
                                                $q = $this->db->get();

                                                foreach ($q->result() as $user) {
                                                    echo $user->name;
                                                }
                                                ?></td>
                                            <td>
                                                <p><a href="<?php echo base_url('unggah/pendidikan/' . $lampiran['file']); ?>" target="_blank"><?php echo $lampiran['file']; ?></a></p>
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