<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'nama'=>'Galih',
                'email'=>'galih@gmail.com',
                'role'=>'admin',
                'foto'=>'Foto.png',
                'telpon'=>'09867573251',
                'password'=>Hash::make('galih'),
                'alamat'=>'Lampung'
            ],
            [
                'nama'=>'Nidaul',
                'email'=>'nidaul@gmail.com',
                'role'=>'bendahara',
                'foto'=>'Foto.png',
                'telpon'=>'09867573251',
                'password'=>Hash::make('nidaul'),
                'alamat'=>'Lampung'
            ],
            [
                'nama'=>'Silvia',
                'email'=>'silvia@gmail.com',
                'role'=>'operator',
                'foto'=>'Foto.png',
                'telpon'=>'09867573251',
                'password'=>Hash::make('silvia'),
                'alamat'=>'Lampung'
            ]
        ];
        foreach ($userData as $key => $value) {
            User::create($value);
        }
    }
}
