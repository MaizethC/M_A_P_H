<?php


use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        // Crear tres administradores quemados
        $admins = [
            [
                'name' => 'Joshua',
                'email' => 'Joshua@example.com',
                'password' => Hash::make('12345678'), // Cambia 'password1' por una contraseña segura
            ],
            [
                'name' => 'David',
                'email' => 'David@example.com',
                'password' => Hash::make('12345678'), // Cambia 'password2' por una contraseña segura
            ],
            [
                'name' => 'Maizeth',
                'email' => 'Maizeth@example.com',
                'password' => Hash::make('12345678'), // Cambia 'password3' por una contraseña segura
            ],
        ];

        foreach ($admins as $admin) {
            Admin::create($admin);
        }
    }
}