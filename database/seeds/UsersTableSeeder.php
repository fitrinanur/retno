<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('users')->truncate();
        Schema::enableForeignKeyConstraints();

        $users = [
            [
                'name' => 'Owner',
                'username' => 'Direktur',
                'email' => 'owner@example.com',
                'password' => bcrypt('12345678'),
                'role_id' => 1,
            ],
            [
                'name' => 'Front Office',
                'username' => 'Front office',
                'email' => 'Frontoffice@example.com',
                'password' => bcrypt('12345678'),
                'role_id' => 2,
            ],
            [
                'name' => 'Admin',
                'username' => 'Admin',
                'email' => 'Admin@example.com',
                'password' => bcrypt('12345678'),
                'role_id' => 3,
            ]
        ];

        $timestamp = \Carbon\Carbon::now();
        foreach ($users as $user) {
            DB::table('users')->insert([
                'name' => $user['name'],
                'username' => $user['username'],
                'email' => $user['email'],
                'password' => $user['password'],
                'role_id' => $user['role_id'],
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ]);
        }
    }
}
