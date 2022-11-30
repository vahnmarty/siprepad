<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class ApplicationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('application_types')->truncate();
        $types = array(
            array('name' => "Accepted"),
            array('name' => "Wait Listed"),
            array('name' => "Not Accepted"),
        );
        DB::table('application_types')->insert($types);
    }
}
