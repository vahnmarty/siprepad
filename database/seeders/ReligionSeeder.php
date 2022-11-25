<?php

namespace Database\Seeders;

use App\Models\Religion;
use Illuminate\Database\Seeder;

class ReligionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [
            ['religion_name' => "Catholic"],
            ['religion_name' => "Christian"],
            ['religion_name' => "Buddhist"],
            ['religion_name' => "Hindu"],
            ['religion_name' => "Jewish"],
            ['religion_name' => "Muslim"],
            ['religion_name' => "Spiritual"],
            ['religion_name' => "No Religion"],
            ['religion_name' => "Other"]
        ];
        foreach ($datas as $data) {
            Religion::create($data);
        }
    }
}
