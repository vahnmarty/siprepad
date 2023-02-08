<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Ramsey\Uuid\Type\Integer;
class student_information extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    public function run()
    {  
        DB::table('student_information')->insert([
            'id' => Integer::random(200).'6',
            'Profile_ID' => Integer::random(200).'10',
            'Application_ID' => Integer::random(200).'10',
            'S1_First_Name' => Str::random(200).'S1FirstName',
            'S1_Last_Name' => Str::random(200).'S1LastName',
            'S1_Personal_Email' => Str::random(200).'sOne@gmail.com',
            'S1_Mobile_Phone' => Integer::random(200).'9852145263',
            
            'S2_First_Name' => Str::random(200).'S2FirstName',
            'S2_Last_Name' => Str::random(200).'S2LastName',
            'S2_Personal_Email' => Str::random(200).'sTwo@gmail.com',
            'S2_Mobile_Phone' => Integer::random(200).'9222245263',
            
            'S3_First_Name' => Str::random(200).'S3FirstName',
            'S3_Last_Name' => Str::random(200).'S3LastName',
            'S3_Personal_Email' => Str::random(200).'sThree@gmail.com',
            'S3_Mobile_Phone' => Integer::random(200).'9333345263',
            
            'is_step_complete' => Integer::random(200).'10',
        ]);
        
    }
}
