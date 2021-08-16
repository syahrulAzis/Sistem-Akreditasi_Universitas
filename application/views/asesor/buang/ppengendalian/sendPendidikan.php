<?php

// echo 'sendPendidikan';


// var_dump($pendidikan);


foreach ($pendidikan as $row) {


    $idp = $row->id_pendidikan_pengendalian;

    $kirim = [
        'id_pendidikan_peningkatan' => $row->id_pendidikan_pengendalian,
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

    // var_dump($kirim);
    $this->db->insert('pendidikan_peningkatan', $kirim);
}

//hapus yang ada di tabel pendidikan_nilai
$this->db->where('id_pendidikan_pengendalian', $idp);
$this->db->delete('pendidikan_pengendalian');


//kirim flash data
$this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Data berhasil diserahkan, cek pada menu Peningkatan !
                </div>');
//lalu redirect
redirect('AsesorPengendalian');
