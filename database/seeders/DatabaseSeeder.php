<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserRoleTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(CmsTableSeeder::class);
        $this->call(ApplicationSeeder::class);
        $this->call(RecommendationSeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(StateSeeder::class);
        //$this->call(CitySeeder::class);
        $this->call(GradeSeeder::class);
        $this->call(RelationshipSeeder::class);
        $this->call(ReligionSeeder::class);
        $this->call(SalutationSeeder::class);
        $this->call(SchoolSeeder::class);
        $this->call(SuffixSeeder::class);
        $this->call(IdentifyRaciallySeeder::class);
        $this->call(LivingSituationsSeeder::class);
        $this->call(MaritalSeeder::class);
        $this->call(SpiritualitySeeder::class);
        // \App\Models\User::factory(10)->create();
        $this->call(ApplicationTypeSeeder::class);
    }
}
