<?php

namespace App\Controllers;

use App\Models\AuthModel;

class UserLogin extends BaseController
{
    public function index()
    {
        // Jika sudah login, redirect ke halaman download
        if (session()->get('logged_in')) {
            return redirect()->to('/frontdownload')->with('success', 'Anda sudah login sebagai ' . session()->get('nama'));
        }
        
        return view('frontend/user_login');
    }
    
    public function doLogin()
    {
        $session = session();
        $model = new AuthModel();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $model->getUserByUsername($username);

        if ($user && password_verify($password, $user['password'])) {
            // Set session (menggunakan format yang sama dengan Auth.php)
            $session->set([
                'user_id' => $user['id'],
                'username' => $user['username'],
                'role' => $user['role'],
                'nama' => $user['nama'],
                'logged_in' => true,
                'show_welcome_modal' => true // Flag untuk menampilkan modal selamat datang
            ]);
            
            // Redirect ke halaman download untuk user frontend
            return redirect()->to('/frontdownload')->with('success', 'Login berhasil! Selamat datang ' . $user['nama']);
        } else {
            return redirect()->back()->with('error', 'Username atau password salah');
        }
    }
    
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
    
    public function checkLogin()
    {
        // Method untuk mengecek status login user
        if (!session()->get('logged_in')) {
            // Simpan URL yang ingin diakses
            $current_url = current_url();
            session()->set('redirect_after_login', $current_url);
            
            return redirect()->to('/userlogin')->with('error', 'Silakan login terlebih dahulu untuk mengunduh file.');
        }
        
        return true;
    }
    
    public function clearWelcomeFlag()
    {
        // Method untuk menghapus flag show_welcome_modal
        if (session()->get('logged_in')) {
            session()->remove('show_welcome_modal');
            return $this->response->setJSON(['success' => true]);
        }
        
        return $this->response->setJSON(['success' => false]);
    }
} 