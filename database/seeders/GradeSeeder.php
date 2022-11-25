<?php

namespace Database\Seeders;

use App\Models\Grade;
use Illuminate\Database\Seeder;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [
            ['grade_name' => "Pre-Kindergarten"],
            ['grade_name' => "kindergarten"],
            ['grade_name' => "1"],
            ['grade_name' => "2"],
            ['grade_name' => "3"],
            ['grade_name' => "4"],
            ['grade_name' => "5"],
            ['grade_name' => "6"],
            ['grade_name' => "7"],
            ['grade_name' => "8"],
            ['grade_name' => "Freshman"],
            ['grade_name' => "Sophomore"],
            ['grade_name' => "Junior"],
            ['grade_name' => "Senior"],
            ['grade_name' => "College"],
            ['grade_name' => "Post HS/College"]
        ];
        foreach ($datas as $data) {
            Grade::create($data);
        }
    }
}
