<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Generator as Faker;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i < 6; $i++){
            $new_project = new Project();
            $new_project->title = $faker->sentence();
            $new_project->slug = Project::generateSlug( $new_project->title );
            $new_project->image = 'placeholders/' . $faker->image(dir: 'storage/app/public/placeholders/', fullPath: false, format:'jpg', gray: true);
            $new_project->description = $faker->paragraph(5);
            $new_project->year_of_development = $faker->year();
            $new_project->repository_url = $faker->url();
            $new_project->website_url = $faker->url();
            $new_project->save();
        }
    }
}
