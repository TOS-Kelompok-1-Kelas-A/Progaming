<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Login extends BaseController
{
    protected $user;

    public function __construct()
    {
        $this->user = new UserModel();
    }

public function doLogin()
{
    $username = $this->request->getPost('username');
    $password = $this->request->getPost('password');

    $user = $this->user->where('username', $username)->first();

    if (!$user) {
        session()->setFlashdata('error', 'Username tidak ditemukan!');
        return redirect()->back();
    }

    if (!password_verify($password, $user['password'])) {
        session()->setFlashdata('error', 'Password salah!');
        return redirect()->back();
    }

    $sessionData = [
        'id_user'  => $user['id_user'],
        'username' => $user['username'],
        'role'     => $user['role'],
        'logged_in' => true
    ];

    session()->set($sessionData);
    if ($user['role'] == 'admin') {
        return redirect()->to('/dashboard/admin');
    }

    return redirect()->to('/dashboard/staf');
}


    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
