<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $allowedFields = ['first_name', 'last_name', 'email', 'password'];
    protected $validationRules = [
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'required|valid_email|is_unique[users.email]',
        'password' => 'required|min_length[6]'
    ];

  // UserModel.php
// public function saverecords($data) {
//     // Insert record into 'users' table
//     $this->db->table('users')->insert($data);
    
//     // Check if the insert was successful
//     return $this->db->affectedRows() > 0;
// }
  
// UserModel.php
public function saverecords($data)
{
    $this->db->table('users')->insert($data);
    return $this->db->affectedRows() > 0;
}



public function verifyPassword($email, $password)
{
    $user = $this->where('email', $email)->first();

    if ($user) {
        // Verify password hash
        if (password_verify($password, $user['password'])) {
            return true;
        } else {
            // Log if password verification fails
            log_message('debug', 'Password verification failed.');
        }
    } else {
        // Log if user not found
        log_message('debug', 'User not found for email: ' . $email);
    }

    return false;
}

}




	/*public function saverecords($data){
		
		$builder = $this->db->table('users');
		$result = $builder->insert($data);
		if($this->db->affectedRows()>0){
			
			return true;
			
		}else{
			
			return false;
			
		}
	}*/
