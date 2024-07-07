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

        // Verify password using UserModel method
        if ($model->verifyPassword($email, $password)) {
            // Password is correct, set session data
            $user = $model->where('email', $email)->first();
            $ses_data = [
                'id' => $user['id'],
                'email' => $user['email'],
                'logged_in' => TRUE
            ];
            $session->set($ses_data);
            return redirect()->to ('/view_user');
        } else {
            // Password incorrect or user not found
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
