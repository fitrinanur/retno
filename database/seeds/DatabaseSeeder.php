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
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(AbilitiesTableSeeder::class);
        $this->call(MembersTableSedeer::class);
        $this->call(TreatmentsTableSeeder::class);
        $this->call(SettingTableSeeder::class);
    }
}
