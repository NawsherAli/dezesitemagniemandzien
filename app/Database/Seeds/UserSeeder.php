<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $password = password_hash('admin@Sec#', PASSWORD_DEFAULT);

        $data = [
            'username' => 'admin',
            'password' => $password,
            'name' => 'Site Admin',
        ];

        $this->db->table('users')->insert($data);
    }
}
