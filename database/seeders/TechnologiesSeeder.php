<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Models\Technology;
use Illuminate\Support\Str;


class TechnologiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Disabilita i vincoli di chiave esterna per evitare errori di riferimento
        Schema::disableForeignKeyConstraints();

        // Troncamento della tabella 'technologies'
        Technology::truncate();

        // Lista delle tecnologie da inserire
        $techs = [
            'HTML', 'CSS', 'JAVASCRIPT', 'VUE', 'BOOTSTRAP',
            'PHP', 'MySQL', 'SQL', 'LARAVEL', 'AXIOS', 'TAILWIND'
        ];

        // Inserimento dei dati nella tabella
        foreach ($techs as $tech) {
            $new_tech = new Technology();
            $new_tech->title = $tech;
            $new_tech->slug = Str::of($tech)->slug();

            $new_tech->save();
        }

        // Riabilita i vincoli di chiave esterna
        Schema::enableForeignKeyConstraints();
    }
}
