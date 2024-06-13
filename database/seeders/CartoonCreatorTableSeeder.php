<?php

namespace Database\Seeders;

use App\Models\Creator;
use App\Models\Cartoon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CartoonCreatorTableSeeder extends Seeder
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

    $creators = Creator::all();

    foreach($creators as $creator){
        foreach($all_data as $cartoon){
            if(in_array($creator->name, $cartoon->creator)){
                $creator_id = $creator->id;
                $cartoon_db = Cartoon::where('id', $cartoon->id)->first();
                $cartoon_db->creators()->attach($creator_id);
            }
        }
    }

    }
}
