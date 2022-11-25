<?php

namespace Database\Seeders;

use App\Models\Suffix;
use Illuminate\Database\Seeder;

class SuffixSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [
            [
                'suffix_name' => 'Jr.',
            ],
            [
                'suffix_name' => 'II',
            ],
            [
                'suffix_name' => 'III',
            ],
            [
                'suffix_name' => 'IV',
            ],
            [
                'suffix_name' => 'V',
            ]
        ];
        foreach ($datas as $data) {
            Suffix::create($data);
        }
    }
}
