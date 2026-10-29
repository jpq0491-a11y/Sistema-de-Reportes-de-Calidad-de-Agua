<?php

namespace Database\Seeders;

use App\Models\Reporte;
use App\Models\User;
use Illuminate\Database\Seeder;

class ReporteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where('email', 'test@example.com')->firstOrFail();

        Reporte::create([
            'user_id' => $user->id,
            'ubicacion' => 'Casa X',
            'descripcion' => 'El agua sale turbia',
            'fecha_inicio' => '2026-05-05',
        ]);

        Reporte::create([
            'user_id' => $user->id,
            'ubicacion' => 'Casa Y',
            'descripcion' => 'El agua tiene mal olor',
            'fecha_inicio' => '2026-05-05',
        ]);

        Reporte::factory()->count(3)->for($user)->create();
    }
}
