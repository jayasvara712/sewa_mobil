<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users =  [
            [
                'id_user'   => '1',
                'username'  => 'admin',
                'email'     => 'admin@gmail.com',
                'password'  =>  bcrypt('admin'),
                'nama'      => 'Admin',
                'alamat'    => '-',
                'no_telp'   => '00000000000',
                'no_sim'    => '0000000000000',
                'role'      => 'admin',
            ],
            [
                'id_user'   => '2',
                'username'  => 'little',
                'email'     => 'little@gmail.com',
                'password'  =>  bcrypt('little'),
                'nama'      => 'Little',
                'alamat'    => 'Jl.Made Bina Utama No.5',
                'no_telp'   => '11111111111',
                'no_sim'    => '1111111111111',
                'role'      => 'user',
            ],

        ];
        User::insert($users);
    }
}
