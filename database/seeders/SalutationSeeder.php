<?php

namespace Database\Seeders;

use App\Models\Salutation;
use Illuminate\Database\Seeder;

class SalutationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [
            ['salutation_name' => "Mr."],
            ['salutation_name' => "Mrs."],
            ['salutation_name' => "Ms."],
            ['salutation_name' => "Dr."],
            ['salutation_name' => "Rev."],
            ['salutation_name' => "Hon."]
        ];
        foreach ($datas as $data) {
            Salutation::create($data);
        }
    }
}
