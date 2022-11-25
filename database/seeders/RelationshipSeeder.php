<?php

namespace Database\Seeders;

use App\Models\Relationship;
use Illuminate\Database\Seeder;

class RelationshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [
            ['relationship_name' => "Father"],
            ['relationship_name' => "Mother"],
            ['relationship_name' => "Stepfather"],
            ['relationship_name' => "Stepmother"],
            ['relationship_name' => "Grandfather"],
            ['relationship_name' => "Grandmother"],
            ['relationship_name' => 'Brother'],
            ['relationship_name' => 'Sister'],
            ['relationship_name' => 'Stepbrother'],
            ['relationship_name' => 'Stepsister'],
            ['relationship_name' => 'Half-brother'],
            ['relationship_name' => 'Half-sister'],
            ['relationship_name' => "Aunt"],
            ['relationship_name' => "Uncle"],
            ['relationship_name' => "Female Guardian"],
            ['relationship_name' => "Male Guardian"]
        ];
        foreach ($datas as $data) {
            Relationship::create($data);
        }
    }
}
