<?php
$pen = $pendidikan;

form_open_multipart('');

foreach ($ambildokumen as $g) {
    form_input('pendidikan_id', $pen, 'class="form-control" required="required" placeholder=""');
    form_input('aspek_id', $g['aspek_id'], 'class="form-control" required="required" placeholder=""');
    form_input('dokumen_id', $g['id_dokumen_pendidikan'], 'class="form-control" required="required" placeholder=""');
    form_input('standar_id', $g['standar_id'], 'class="form-control" required="required" placeholder=""');
    form_input('mp_id', $g['mp_id'], 'class="form-control" required="required" placeholder=""');
    form_input('sop_id', $g['sop_id'], 'class="form-control" required="required" placeholder=""');
    form_input('formulir_id', $g['formulir_id'], 'class="form-control" required="required" placeholder=""');
    form_input('role_id', $g['role_id'], 'class="form-control" required="required" placeholder=""');
    form_input('target', $g['target_dokumen'], 'class="form-control" required="required" placeholder=""');

    $kirim = [
        'pendidikan_id' => $pen,
        'aspek_id' => $g['aspek_id'],
        'dokumen_id' => $g['id_dokumen_pendidikan'],
        'standar_id' => $g['standar_id'],
        'mp_id' => $g['mp_id'],
        'sop_id' => $g['sop_id'],
        'formulir_id' => $g['formulir_id'],
        'role_id' => $g['role_id'],
        'target' => $g['target_dokumen'],
    ];

    $this->db->insert('pendidikan_transaksi', $kirim);
}
// var_dump($kirim);
redirect('pendidikan/detail/' . $pen);
form_close();
