<?php

// var_dump($pendidikan);

foreach ($pendidikan as $row) {

    $idp = $row->id_pendidikan;

    // form_input('object_id_pendidikan', $row->object_id_pendidikan, '');
    // form_input('des_pendidikan', $row->des_pendidikan, '');
    // form_input('tahun_ajaran', $row->tahun_ajaran, '');
    // form_input('periode', $row->periode, '');
    // form_input('kegiatan', $row->kegiatan, '');
    // form_input('user_id', $row->user_id, '');
    // form_input('fakultas_id', $row->fakultas_id, '');
    // form_input('prodi_id', $row->prodi_id, '');
    // form_input('is_active_pendidikan', $row->is_active_pendidikan, '');

    $kirim = [
        'id_pendidikan_nilai' => $row->id_pendidikan,
        'object_id_pendidikan' => $row->object_id_pendidikan,
        'standar_id' => $row->standar_id,
        'des_pendidikan' => $row->des_pendidikan,
        'tahun_ajaran' => $row->tahun_ajaran,
        'periode' => $row->periode,
        'kegiatan' => $row->kegiatan,
        'user_id' => $row->user_id,
        'fakultas_id' => $row->fakultas_id,
        'prodi_id' => $row->prodi_id,
        'is_active_pendidikan' => $row->is_active_pendidikan,
    ];

    //kirim data ke tabel pendidikan_nilai
    $this->db->insert('pendidikan_nilai', $kirim);
    // var_dump($kirim);

}
//kemudian hapus yang ada di tabel pendidikan
$this->db->where('id_pendidikan', $idp);
$this->db->delete('pendidikan');

//kirim flash data
$this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Data berhasil diserahkan, cek pada menu Evaluasi !
                </div>');
//lalu redirect
redirect('KaprodiPendidikan');
