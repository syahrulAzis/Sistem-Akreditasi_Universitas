<!-- partial -->
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <?php echo $this->session->flashdata('message'); ?>
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title text-center">Sasaran Mutu Bidang Pendidikan</h3>
                    <hr>
                    <table class="table-borderless w-100 mt-4">
                        <?php
                        $no = 1;
                        foreach ($pendidikan as $row) { ?>
                            <tr>
                                <td rowspan="4"><img src="<?php echo base_url(); ?>assets/images/logo-mini.png" alt="logo" /></td>
                                <td><b>UNIT KERJA</b></td>
                                <td>: <?= $row->nama_fakultas; ?></td>
                                <td><b>OBJECT ID</b> </td>
                                <td>: <?= $row->object_id_pendidikan; ?></td>
                            </tr>
                            <tr>
                                <td><b>JABATAN</b></td>
                                <td>: <?= $row->nama_prodi; ?></td>
                                <td><b>DESKRIPSI</b> </td>
                                <td>: <?= $row->des_pendidikan; ?></td>
                            </tr>
                            <tr>
                                <td><b>PERIODE</b></td>
                                <td>: TAHUN AKADEMIK <?= $row->tahun_ajaran; ?></td>
                                <td><b>DIBUAT</b> </td>
                                <td>: <?= $row->pendidikan_timestamp; ?></td>
                            </tr>
                            <tr>
                                <td><b>STANDAR</b></td>
                                <td>: <?php
                                        $ids = $row->standar_id;

                                        $this->db->where('id_standar', $ids);
                                        $this->db->from('standar');
                                        $q = $this->db->get();

                                        foreach ($q->result() as $s) {
                                            echo $s->no_standar . ' ' . '(' . $s->deskripsi_standar . ')';
                                        }
                                        ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                    <hr>
                    <div class="table-responsive">
                        <style>
                            table,
                            td,
                            th {
                                border: 1px solid #ddd;
                                text-align: left;
                            }

                            table {
                                border-collapse: collapse;
                                width: 100%;
                            }

                            th,
                            td {
                                padding: 15px;
                            }
                        </style>
                        <table class="table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Sasaran Mutu</th>
                                    <th>Indikator</th>
                                    <th>Turunan</th>
                                    <th>Bobot</th>
                                    <th>Target</th>
                                    <th>Capaian</th>
                                    <th>Akar Masalah</th>
                                    <th>Tindakan Koreksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($mutu as $m) { ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $m['aspek']; ?></td>
                                        <td><?= $m['indikator']; ?></td>
                                        <td>
                                            <?php
                                            $idp = 0;
                                            foreach ($pendidikan as $pendidikan_id) {
                                                $idp = $pendidikan_id->id_pendidikan;
                                            }

                                            $aspek_id = $m['id_aspek_pendidikan'];
                                            $role = $this->db->get_where('pendidikan_transaksi', [
                                                'pendidikan_id' => $idp,
                                                'aspek_id' => $aspek_id,
                                            ])->result_array();

                                            // foreach ($role as $role) {
                                            //     $array = $role;
                                            //     $uniques = array_unique($array);
                                            //     // var_dump($uniques);

                                            //     // // print_r($uniques);
                                            //     foreach ($uniques as $key => $p) {
                                            //         echo $p;
                                            //     }
                                            // }

                                            foreach ($role as $r) {
                                                // echo $r['role_id'];
                                                $id_role = $r['role_id'];
                                                $this->db->where('id', $id_role);
                                                $this->db->from('user_role');
                                                $q = $this->db->get();

                                                echo '<ul type="square">';
                                                foreach ($q->result() as $role_name) {
                                                    echo '<li>' . $role_name->role . '</li>';
                                                }
                                                echo '</ul>';
                                            }
                                            ?>
                                        </td>
                                        <td><?= $m['bobot']; ?></td>
                                        <td><?= $m['target_aspek']; ?> %</td>
                                        <td>
                                            <?php
                                            $idp = 0;
                                            foreach ($pendidikan as $pendidikan_id) {
                                                $idp = $pendidikan_id->id_pendidikan;
                                            }

                                            // hitung dari field capaian
                                            $aspek_id = $m['id_aspek_pendidikan'];

                                            $c = $this->db->get_where('pendidikan_transaksi', [
                                                'pendidikan_id' => $idp,
                                                'aspek_id' => $aspek_id,
                                                'capaian !=' => 0,
                                                'capaian !=' => false,
                                                'status_id' => 1
                                            ])->result_array();

                                            $sumc = 0;
                                            foreach ($c as $capaian => $value) {
                                                // echo $capaian['capaian'] . '</br>';
                                                $sumc += $value['capaian'];
                                            }
                                            // echo $sumc . '</br>';

                                            //hitung dari field capaian perbaikan
                                            $cp = $this->db->get_where('pendidikan_transaksi', [
                                                'pendidikan_id' => $idp,
                                                'aspek_id' => $aspek_id,
                                                'capaian_perbaikan !=' => false,
                                            ])->result_array();

                                            $sumcp = 0;
                                            foreach ($cp as $capaian_perbaikan => $value_perbaikan) {
                                                // echo $value_perbaikan['capaian_perbaikan'] . '</br>';
                                                $sumcp += $value_perbaikan['capaian_perbaikan'];
                                            }
                                            // echo $sumcp . '</br>';

                                            $this->db->from('pendidikan_transaksi');
                                            $this->db->where('pendidikan_id', $idp);
                                            $this->db->where('aspek_id', $aspek_id);
                                            $q = $this->db->get();

                                            $baris = 0;
                                            if ($q->num_rows() > 0) {
                                                $baris = $q->num_rows();
                                            }

                                            $jumlah = $sumc + $sumcp;
                                            $total = $jumlah / $baris;
                                            echo round($total) . ' %';

                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ($total < 100) {
                                                $idp = 0;
                                                foreach ($pendidikan as $pendidikan_id) {
                                                    $idp = $pendidikan_id->id_pendidikan;
                                                }

                                                // hitung dari field capaian
                                                $aspek_id = $m['id_aspek_pendidikan'];

                                                $c = $this->db->get_where('pendidikan_transaksi', [
                                                    'pendidikan_id' => $idp,
                                                    'aspek_id' => $aspek_id,
                                                    'status_id !=' => 1
                                                ])->result_array();

                                                echo '<ul type="square">';
                                                foreach ($c as $capaian => $value) {
                                                    echo '<li>' . $value['masalah_perbaikan'] . '</li>';
                                                }
                                                echo '</ul>';
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ($total < 100) {
                                                $idp = 0;
                                                foreach ($pendidikan as $pendidikan_id) {
                                                    $idp = $pendidikan_id->id_pendidikan;
                                                }

                                                // hitung dari field capaian
                                                $aspek_id = $m['id_aspek_pendidikan'];

                                                $c = $this->db->get_where('pendidikan_transaksi', [
                                                    'pendidikan_id' => $idp,
                                                    'aspek_id' => $aspek_id,
                                                    'status_id !=' => 1
                                                ])->result_array();

                                                echo '<ul type="square">';
                                                foreach ($c as $capaian => $value) {
                                                    echo '<li>' . $value['perbaikan_dokumen'] . '</li>';
                                                }
                                                echo '</ul>';
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <hr>
                    <a type="button" class="btn btn-outline-light btn-fw" href="<?php echo site_url('Stafftu/PengendalianPendidikan'); ?>">
                        <i class="fa fa-undo"></i>
                        Kembali
                    </a>
                    <hr>
                </div>
            </div>
        </div>