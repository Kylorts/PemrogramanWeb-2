<?php

namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModel extends Model
{
    public function getMahasiswa(){
        return [
            'nama' => 'Galih Aji Sabdaraya',
            'nim' => '2310817210005',
            'prodi' => 'Teknologi Informasi',
            'hobi' => 'bermain game dan olahraga',
            'skill' => 'bisa C++,  python, PHP, Mobile Kotlin. dan Java',
            'gambar' => 'galih.jpeg',
        ];
    }
}