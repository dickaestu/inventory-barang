<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Kepala Bidang',
            'email' => 'kepalabidang@email.com',
            'nip' => 'KB001',
            'password' => Hash::make('password'),
            'roles' => 'Kepala Bidang'
        ]);
        User::create([
            'name' => 'Admin',
            'email' => 'admin@email.com',
            'nip' => 'AD001',
            'password' => Hash::make('password'),
            'roles' => 'Admin'
        ]);
        User::create([
            'name' => 'Teknisi A',
            'email' => 'teknisia@email.com',
            'nip' => 'TK001',
            'password' => Hash::make('password'),
            'roles' => 'Teknisi'
        ]);
    }
}
