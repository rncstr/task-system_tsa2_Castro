<?php
namespace App\Database\Seeds;
use CodeIgniter\Database\Seeder;

class DemoSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'username' => 'admin_castro',
            'password' => password_hash('password123', PASSWORD_DEFAULT),
        ];
        $this->db->table('users')->insert($data);
    }
}