<?php

namespace App\Controllers;

use App\Models\BukuModel;

class BukuController extends BaseController
{
    public function __construct()
    {
        if (!session()->get('user_id')) {
            session()->setFlashdata('error', 'Login terlebih dahulu!');
            header('Location: /login');
            exit;
        }

        $this->modelBuku = new BukuModel();
    }

    public function index()
    {
        $data = [
            'buku' => $this->modelBuku->findAll(),
            'title' => 'Daftar Buku'
        ];
        return view('buku/index', $data);
    }

    public function create()
    {
        helper('form');
        return view('buku/create', ['title' => 'Tambah Buku']); 
    }

    public function store()
    {
        helper('form');
        $rules = $this->modelBuku->validationRules;
        $messages = $this->modelBuku->validationMessages;
            
        if(!$this->validate($rules, $messages)){
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $this->modelBuku->insert($this->request->getPost());
        return redirect()->to('/buku');
    }

    public function edit($id)
    {
        $data = [
            'buku' => $this->modelBuku->find($id),
            'title' => 'Edit Buku'
        ];
        return view('buku/edit', $data);
    }

    public function update($id)
    {
        helper('form');
        $rules = $this->modelBuku->validationRules;
        $messages = $this->modelBuku->validationMessages;

        if(!$this->validate($rules, $messages)){
           return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $this->modelBuku->update($id, $this->request->getPost());
        return redirect()->to('/buku');
    }

    public function delete($id)
    {
        $this->modelBuku->delete($id);
        return redirect()->to('/buku');
    }
}