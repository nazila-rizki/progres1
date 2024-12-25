<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class RoleFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $role = session()->get('role');  // Pastikan role disimpan di session
        if ($role == 'admin') {
            return redirect()->to('/admin/home'); 
        } else if ($role == 'bidan') {
            return redirect()->to('/dokter/index');
        } else if ($role == 'aptoteker') {
            return redirect()->to('/apoteker/index');
        } else
            return redirect()->to('/');
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Tidak perlu apa-apa di sini
    }
}
