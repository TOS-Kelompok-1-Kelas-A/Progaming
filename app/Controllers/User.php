<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class User extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();
        $data['users'] = $userModel->findAll();
        return view('admin/user/index', $data);
    }

    public function create()
    {
        return view('admin/user/create');
    }

    public function store()
    {
        $userModel = new UserModel();

        $data = [
            'username' => $this->request->getPost('username'),
            'email'    => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
            'role'     => $this->request->getPost('role'),
        ];

        $userModel->insert($data);
        session()->setFlashdata('success', 'User berhasil ditambahkan');
        return redirect()->to('/user');
    }

    public function edit($id)
    {
        $userModel = new UserModel();
        $data['user'] = $userModel->find($id);
        return view('admin/user/edit', $data);
    }

    public function update($id)
    {
        $userModel = new UserModel();

        $data = [
            'username' => $this->request->getPost('username'),
            'email'    => $this->request->getPost('email'),
            'role'     => $this->request->getPost('role'),
        ];

        // Jika password diisi, update password
        $password = $this->request->getPost('password');
        if (!empty($password)) {
            $data['password'] = $password;
        }

        $userModel->update($id, $data);
        session()->setFlashdata('success', 'User berhasil diperbarui');
        return redirect()->to('/user');
    }

    public function delete($id)
    {
        $userModel = new UserModel();
        $userModel->delete($id);
        session()->setFlashdata('success', 'User berhasil dihapus');
        return redirect()->to('/user');
    }
    
    public function profile()
    {
        $userId = session()->get('id_user');
        $userModel = new UserModel();
        $data['user'] = $userModel->find($userId);
        return view('profile/update', $data);
    }

    public function updateProfile()
    {
        $userId = session()->get('id_user');
        $userModel = new UserModel();

        $data = [
            'username' => $this->request->getPost('username'),
            'email'    => $this->request->getPost('email'),
        ];

        // Jika password diisi, update password
        $password = $this->request->getPost('password');
        if (!empty($password)) {
            $data['password'] = $password;
        }

        $userModel->update($userId, $data);
        session()->setFlashdata('success', 'Profil berhasil diperbarui');
        return redirect()->to('profile');
    }
}
