<?php

namespace App\Controllers;

use App\Models\MahasiswaModel;

class Home extends BaseController
{
    public function index()
    {
        $model = new MahasiswaModel();
        $data['mahasiswa'] = $model->getMahasiswa();
        $data['title'] = 'Beranda';
        return view('beranda', $data);
    }

    public function profil() 
    {
        $model = new MahasiswaModel();
        $data['mahasiswa'] = $model->getMahasiswa();
        $data['title'] = 'Profil';
        return view('profil', $data);
    }
}