<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Ability;
use App\Role;

class AbilitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('abilities')->truncate();
        Schema::enableForeignKeyConstraints();

        $abilities = [
             // User
             'view-users',
             'create-users',
             'update-users',
             'delete-users',

            //  role
            'view-role',
            'update-role',

             //report
             'view-report',
             'update-report',
         ];

        $currentTime = Carbon::now();
        $abilitiesData = [];
        foreach ($abilities as $key => $value) {
            $abilitiesData[] = [
                 'name' => $value,
                 'created_at' => $currentTime,
                 'updated_at' => $currentTime,
             ];
        }

        Ability::insert($abilitiesData);

        $admin = Role::where('name', 'Admin')->first();

        foreach ($abilities as $ability) {
            $admin->abilities()->attach(Ability::where('name', $ability)->first()->id);
        }

        $OwnerAbilities = [
            //report
            'view-report',
            'update-report',
        ];

        $owner = Role::where('name', 'Owner')->first();

        foreach ($OwnerAbilities as $ability) {
            $owner->abilities()->attach(Ability::where('name', $ability)->first()->id);
        }
    }
}
