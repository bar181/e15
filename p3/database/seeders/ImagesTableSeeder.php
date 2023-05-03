<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Image; # Make our Book Model accessible
use Faker\Factory; # We’ll use this library to generate random/fake data

class ImagesTableSeeder extends Seeder
{
    private $faker;

    public function run(): void
    {

        $this->faker = Factory::create();

        $this->addAllImagesFromIamgesDotJsonFile();

    }

     private function addAllImagesFromIamgesDotJsonFile()
     {
         $imageData = file_get_contents(database_path('images.json'));
         $images = json_decode($imageData, true);

         foreach ($images as $imageData) {
             $image = new Image();
             $image->created_at = $this->faker->dateTimeThisMonth();
             $image->updated_at = $image->created_at;
             $image->var_code = $imageData['var_code'];
             $image->name = $imageData['name'];
             $image->src = $imageData['src'];
             $image->save();
         }
     }
}