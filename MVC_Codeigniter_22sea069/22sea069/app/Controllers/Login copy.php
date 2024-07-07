<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Login extends Controller
{
    public function index()
    {
        return view('pages/login');
    }

    public function authenticate()
{
    $session = session();
    $model = new UserModel();

    $email = $this->request->getPost('email');
    $password = $this->request->getPost('password');

    $user = $model->where('email', $email)->first();

    if ($user) {
        // Check if passwords match (assuming the password in the database is not hashed)
        if ($password === $user['password']) {
            $ses_data = [
                'id' => $user['id'],
                'email' => $user['email'],
                'logged_in' => TRUE
            ];
            $session->set($ses_data);
            return redirect()->to('/dashboard');
        } else {
            $session->setFlashdata('msg', 'Wrong Email or Password');
            return redirect()->to('/');
        }
    } else {
        $session->setFlashdata('msg', 'Wrong Email or Password');
        return redirect()->to('/');
    }
}


    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }
}
