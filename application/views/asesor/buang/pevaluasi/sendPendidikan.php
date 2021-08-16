<?php

// echo 'sendPendidikan';


// var_dump($pendidikan);


foreach ($pendidikan as $row) {


    $idp = $row->id_pendidikan_nilai;

    $kirim = [
        'id_pendidikan_pengendalian' => $row->id_pendidikan_nilai,
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
    $this->db->insert('pendidikan_pengendalian', $kirim);
}

//hapus yang ada di tabel pendidikan_nilai
$this->db->where('id_pendidikan_nilai', $idp);
$this->db->delete('pendidikan_nilai');


//kirim flash data
$this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Data berhasil diserahkan, cek pada menu Pengendalian !
                </div>');
//lalu redirect
redirect('AsesorPendidikanEvaluasi');
