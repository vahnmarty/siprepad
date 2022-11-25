<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LivingSituation;

class LivingSituationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [
            'Lives with student full time',
            'Lives with student part time',
            'Does not live with student'
        ];
        foreach ($datas as $key => $data) {
            LivingSituation::create(['name' => $data]);
        }
    }
}
