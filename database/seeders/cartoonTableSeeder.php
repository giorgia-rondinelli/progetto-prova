<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cartoon;
use App\functions\Helper;

class cartoonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data_str = file_get_contents('https://api.sampleapis.com/cartoons/cartoons2D');
        $data = json_decode($data_str);
        // dd($data);

        foreach ($data as $cartoon) {
            $newCartoon = new Cartoon();
            $newCartoon->title = $cartoon->title;
            $newCartoon->slug = Helper::generateSlug($newCartoon->title, Cartoon::class);
            $newCartoon->year = $cartoon->year;
            $newCartoon->rating = $cartoon->rating;
            $newCartoon->runtime_in_minutes = $cartoon->runtime_in_minutes;
            $newCartoon->episodes = $cartoon->episodes;
            $newCartoon->image = $cartoon->image;
            // dd($newCartoon);
            $newCartoon->save();
        }

        $data_2_str = file_get_contents('https://api.sampleapis.com/cartoons/cartoons3D');
        $data_2 = json_decode($data_2_str);
        // dd($data);

        foreach ($data_2 as $cartoon) {
            $newCartoon = new Cartoon();
            $newCartoon->title = $cartoon->title;
            $newCartoon->slug = Helper::generateSlug($newCartoon->title, Cartoon::class);
            $newCartoon->year = $cartoon->year;
            $newCartoon->rating = $cartoon->rating;
            $newCartoon->runtime_in_minutes = $cartoon->runtime_in_minutes;
            $newCartoon->episodes = $cartoon->episodes;
            $newCartoon->image = $cartoon->image;
            // dd($newCartoon);
            $newCartoon->save();
        }
    }
}
