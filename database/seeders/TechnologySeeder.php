<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Technology;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $technologies = ['Vue 3', 'Laravel 9.x', 'Bootstrap', 'Sass'];

        foreach($technologies as $technolgy){
            $newTechnology = new Technology();
            $newTechnology->name = $technolgy;
            $newTechnology->slug = Technology::generateSlug($newTechnology->name);
            $newTechnology->save();
        }
    }
}
