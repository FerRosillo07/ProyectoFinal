<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Administrador',
            'apellidoP' => 'Base',
            'rol' => 'Administrador',
            'email' => 'administrador@correo.com',
            'password' => '12345678'
        ]);
    }
}
