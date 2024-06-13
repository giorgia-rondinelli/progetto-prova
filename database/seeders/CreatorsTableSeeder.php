<?php

namespace Database\Seeders;

use App\functions\Helper;
use App\Models\Creator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreatorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Scarica i dati dall'API per cartoni 2D
        $data_str = file_get_contents('https://api.sampleapis.com/cartoons/cartoons2D');

        // Scarica i dati dall'API per cartoni 3D
        $data_2_str = file_get_contents('https://api.sampleapis.com/cartoons/cartoons3D');

        // Decodifica i dati JSON
        $data = json_decode($data_str);
        $data_2 = json_decode($data_2_str);

        // Combina i dati dei due set in un unico array
        $all_data = array_merge((array)$data, (array)$data_2);

        $all_creator = Creator::all()->pluck('name')->toArray();

        foreach($all_data as $cartoon) {
            foreach($cartoon->creator as $s_creator) {
                if (!in_array($s_creator, $all_creator)) {
                    $newCreator = new Creator();
                    $newCreator->name = $s_creator;
                    $newCreator->slug = Helper::generateSlug($newCreator->name, Creator::class);
                    $newCreator->save();

                    $all_creator[] = $s_creator;
                }
            }
        }
    }
}
