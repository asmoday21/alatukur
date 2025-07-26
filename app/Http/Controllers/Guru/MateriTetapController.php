<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;

class MateriTetapController extends Controller
{
    public function fungsialatukur()
    {
        return view('guru.materi.fungsi_alatukur');
    }

    public function analisisalatukur()
    {
        return view('guru.materi.analisis_alatukur');
    }

    public function penggunaanalatukur()
    {
        return view('guru.materi.penggunaan_alatukur');
    }
    public function pemeliharaanalatukur()
    {
        return view('guru.materi.pemeliharaan_alatukur');
    }
}
