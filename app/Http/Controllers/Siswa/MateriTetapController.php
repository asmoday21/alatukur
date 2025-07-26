<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;

class MateriTetapController extends Controller
{
    public function fungsialatukur()
    {
        return view('siswa.materi.fungsi_alatukur');
    }

    public function analisisalatukur()
    {
        return view('siswa.materi.analisis_alatukur');
    }

    public function penggunaanalatukur()
    {
        return view('siswa.materi.penggunaan_alatukur');
    }

    public function pemeliharaanalatukur()
    {
        return view('siswa.materi.pemeliharaan_alatukur');
    }

    // public function optik()
    // {
    //     return view('siswa.materi.optik');
    // }
}
