<?php

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
        $this->call(CompanySeeder::class);
        $this->call(PersonSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(EventSeeder::class);
        $this->call(EditionSeeder::class);
        $this->call(TestScheduleSeeder::class);
        $this->call(TestScheduleUserSeeder::class);
        $this->call(BrandSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(BikeSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(FunctionalitySeeder::class);
        $this->call(Functionality_Role_Seeder::class);
        $this->call(Role_User_Seeder::class);
        $this->call(TestSeeder::class);
        $this->call(CriteriaSeeder::class);
        $this->call(CategoryCriteriaSeeder::class);
        $this->call(CriteriaTestSeeder::class);

    }
}
