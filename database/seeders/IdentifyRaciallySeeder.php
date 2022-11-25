<?php

namespace Database\Seeders;

use App\Models\IdentifyRacially;
use Illuminate\Database\Seeder;

class IdentifyRaciallySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [
            ['name' => "Asian"],
            ['name' => "Black/African American"],
            ['name' => "Latino/Latina/Latinx"],
            ['name' => "Native American/Indigenous"],
            ['name' => "Polynesian or Pacific Islander"],
            ['name' => "White/Caucasian"]
        ];
        foreach ($datas as $data) {
            IdentifyRacially::create($data);
        }
    }
}
