<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TecnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tecnologies = ['Vue', 'Laravel 9.x', 'Bootstrap', 'Sass'];

        foreach($tecnologies as $tecnolgy){
            $newTecnology = new Type();
            $newTecnology->name = $tecnolgy;
            $newTecnology->slug = Type::generateSlug($newTecnology->name);
            $newTecnology->save();
        }
    }
}
