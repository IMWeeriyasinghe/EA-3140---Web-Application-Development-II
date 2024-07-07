<?php

namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function add_user()
{
    // Validate input
    $rules = [
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'required|valid_email|is_unique[users.email]',
        'password' => 'required|min_length[6]'
    ];

    if (!$this->validate($rules)) {
        // Validation failed
        $data['validation'] = $this->validator->getErrors();
        return view('user/add_user', $data);
    }

    // If validated, proceed to insert into database
    $first_name = $this->request->getPost('first_name');
    $last_name = $this->request->getPost('last_name');
    $email = $this->request->getPost('email');
    $password = (string) $this->request->getPost('password');

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare data to save
    $data = [
        'first_name' => $first_name,
        'last_name' => $last_name,
        'email' => $email,
        'password' => $hashed_password
    ];

    // Save record using model
    $response = $this->userModel->saverecords($data);

    if ($response) {
        echo "Data inserted successfully";
    } else {
        echo "Unable to add data";
    }

    // Load the view with the layout and form data
    return view('user/add_user', $data);
}
    


    public function view_user()
    {
        $userModel = new UserModel();
        $data['users'] = $userModel->findAll();
        
        return view('user/view_user', $data);
    }
    
    public function success()
    {
        echo "User registered successfully!";
    }

    public function dashboard()
    {
        return view('pages/dashboard'); // Create this view file
    }
}
