<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Bar; # Make our Book Model accessible
use Faker\Factory; # We’ll use this library to generate random/fake data

class BarsTableSeeder extends Seeder
{
    private $faker;

    public function run(): void
    {

        $this->faker = Factory::create();

        $this->addBarsFromImagesJson();

    }

     private function addBarsFromImagesJson()
     {
         $rawBarData = file_get_contents(database_path('bars.json'));
         $bars = json_decode($rawBarData, true);

         foreach ($bars as $barData) {
             $bar = new Bar();
             $bar->created_at = $this->faker->dateTimeThisMonth();
             $bar->updated_at = $bar->created_at;
             $bar->user_id = $barData['user_id'];
             $bar->name = $barData['name'];
             $bar->slug = $barData['slug'];
             $bar->topic = $barData['topic'];
             $bar->share = $barData['share'];
             $bar->image_id = $barData['image_id'];
             $bar->content1 = $barData['content1'];
             $bar->content2 = $barData['content2'];
             $bar->content3 = $barData['content3'];

             $bar->save();
         }
     }
}