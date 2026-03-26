<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Administrador
        User::factory()->create([
            'name' => 'Administrador',
            'email' => 'admin@example.com',
            'role' => 'admin',
        ]);

        // Cliente de prueba
        User::factory()->create([
            'name' => 'Cliente Prueba',
            'email' => 'client@example.com',
            'role' => 'client',
        ]);
    }
}
