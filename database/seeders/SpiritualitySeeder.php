<?php

namespace Database\Seeders;

use App\Models\Spirituality;
use Illuminate\Database\Seeder;

class SpiritualitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [
            ['name' => "Church Based"],
            ['name' => "Service Based"],
            ['name' => "Values/Ethics"],
            ['name' => "Global/Environmental"],
            ['name' => "Other"]
        ];
        foreach ($datas as $data) {
            Spirituality::create($data);
        }
    }
}
