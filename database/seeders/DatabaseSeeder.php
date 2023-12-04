<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\AnagCliFor;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $agente = AnagCliFor::create([
            'ID_anag_clifor' => '00000001',
            'ID_tipo_anag' => 'A ',
            'rag_sociale' => 'Agente 1',
            'ID_AGENTE' => '',
            'ID_AZIENDA' => 1
        ]);

        $anag = AnagCliFor::create([
            'ID_anag_clifor' => '00000002',
            'ID_tipo_anag' => 'C ',
            'rag_sociale' => 'Test',
            'ID_AGENTE' => '00000001',
            'ID_AZIENDA' => 1
        ]);
    }
}
