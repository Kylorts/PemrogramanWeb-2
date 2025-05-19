<?php

namespace App\Models;

use CodeIgniter\Model;

class BukuModel extends Model
{
    protected $table = 'buku';
    protected $allowedFields = ['judul', 'penulis', 'penerbit', 'tahun_terbit'];
    protected $validationRules    = [
        'judul' => 'required|string',
        'penulis' => 'required|string',
        'penerbit' => 'required|string',
        'tahun_terbit' => 'required|integer|greater_than[1900]|less_than[2024]'
    ];

    protected $validationMessages = [
        'judul' => ['required' => 'Judul wajib diisi!'],
        'penulis' => ['required' => 'Penulis wajib diisi!'],
        'penerbit' => ['required' => 'Penerbit wajib diisi!'],
        'tahun_terbit' => [
            'required' => 'Tahun terbit wajib diisi!',
            'integer' => 'Hanya menerima angka dan tidak menerima e',
            'greater_than' => 'Tahun harus lebih dari 1900',
            'less_than' => 'Tahun harus kurang dari 2024'
        ]
    ];
}