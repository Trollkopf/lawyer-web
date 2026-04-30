<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\SiteSetting;
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
        SiteSetting::query()->firstOrCreate(
            ['id' => 1],
            SiteSetting::defaults(),
        );

        foreach ([
            [
                'title' => 'Asesoramiento preventivo',
                'summary' => 'Analizamos cada situacion con detalle para anticipar riesgos y ayudar a tomar decisiones con seguridad juridica.',
                'target_client' => 'Particulares y empresas que necesitan claridad antes de actuar.',
                'key_result' => 'Reducir incertidumbre y ordenar la estrategia legal desde el inicio.',
                'sort_order' => 1,
                'is_published' => true,
            ],
            [
                'title' => 'Negociacion y mediacion',
                'summary' => 'Buscamos soluciones utiles, proporcionadas y sostenibles cuando el conflicto puede resolverse sin judicializarlo innecesariamente.',
                'target_client' => 'Clientes que quieren proteger sus intereses con firmeza y prudencia.',
                'key_result' => 'Favorecer acuerdos solidos y evitar desgaste procesal innecesario.',
                'sort_order' => 2,
                'is_published' => true,
            ],
            [
                'title' => 'Defensa judicial',
                'summary' => 'Cuando el asunto exige acudir a via judicial, preparamos una defensa tecnica, ordenada y adaptada a los objetivos del cliente.',
                'target_client' => 'Clientes inmersos en procedimientos o con necesidad de respuesta procesal.',
                'key_result' => 'Plantear una defensa rigurosa y una hoja de ruta comprensible en cada fase.',
                'sort_order' => 3,
                'is_published' => true,
            ],
        ] as $service) {
            Service::query()->firstOrCreate(
                ['title' => $service['title']],
                $service,
            );
        }

        User::query()->firstOrCreate(
            ['email' => 'test@example.com'],
            ['name' => 'Test User', 'password' => bcrypt('password')],
        );
    }
}
