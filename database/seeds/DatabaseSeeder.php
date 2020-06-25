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
        $this->call(GroupSeeder::class);
        $this->call(FunctionalitySeeder::class);
        $this->call(Functionality_Group_Seeder::class);
        $this->call(PersonSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(EventSeeder::class);
        $this->call(EditionSeeder::class);
        $this->call(TestScheduleSeeder::class);
        $this->call(Group_User_Seeder::class);

    }
}
