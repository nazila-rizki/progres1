<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class UserController extends BaseController
{
    public function login()
    {
        return view('user/login');
    }

    // Memproses login
    public function check()
    {
        // Pastikan model UserModel diinstansiasi
        $model = new UserModel();
        $id_user = $this->request->getPost('id_user');
        $password = $this->request->getPost('password');
        // Ambil data pengguna berdasarkan id_user
        $user = $model->where('id_user', $id_user)->first();
        
        if ($user && password_verify($password, $user['password'])) {
            // Simpan data ke sesi
            session()->set([
                'loggedIn' => true,
                'id_user' => $user['id_user'],
                'nm_user' => $user['nm_user'],
                'role' => $user['role']
            ]);

            // Arahkan berdasarkan role
            switch ($user['role']) {
                case 'admin':
                    return redirect()->to('/admin/index');
                case 'bidan':
                    return redirect()->to('/bidan/index');
                case 'apoteker':
                    return redirect()->to('/apoteker/index');
                default:
                    return redirect()->to('/user/login')->with('error', 'Role tidak valid.');
            }
        } else {
            return redirect()->to('/user/login')->with('error', 'ID User atau Password salah.');
        }
    }

    // Menampilkan halaman register
    public function register()
    {
        return view('user/register');
    }

    public function store()
    {
        $model = new UserModel();
        $validation = \Config\Services::validation();

        // Aturan validasi
        $validation->setRules([
            'id_user' => 'required|is_unique[users.id_user]',
            'nm_user' => 'required|min_length[3]|max_length[50]',
            'password' => 'required|min_length[6]',
            'role' => 'required|in_list[admin,bidan,apoteker]',
        ]);

        // Validasi input
        if (!$this->validate($validation->getRules())) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Data yang akan disimpan
        $data = [
            'id_user' => $this->request->getPost('id_user'),
            'nm_user' => $this->request->getPost('nm_user'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
            'role' => $this->request->getPost('role'),
        ];

        $model->insert($data);
        return redirect()->to('/user/login')->with('sukses', 'Registrasi berhasil, silakan login.');;
    }

    public function logout()
{
    // Hapus semua data sesi
    session()->destroy();

    // Redirect ke halaman login dengan pesan sukses
    return redirect()->to('/user/login')->with('sukses', 'Anda berhasil logout.');
}

}
