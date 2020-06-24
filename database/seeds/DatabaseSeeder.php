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
        /* $this->call(UserSeeder::class); */
        /* $this->call(CompanySeeder::class); */
        /* $this->call(PersonSeeder::class); */
        /* $this->call(EventSeeder::class); */
        /* $this->call(EditionSeeder::class); */
        /* $this->call(TestScheduleSeeder::class); */
        $this->call(TestScheduleUserSeeder::class);

    }
}
