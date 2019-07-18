<?php

use Illuminate\Database\Seeder;

class MembersTableSedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('members')->truncate();
        Schema::enableForeignKeyConstraints();

        $members = [
            [
                'name' => 'Amirasyahdad',
                'no_member'=>'M180720191',
                'birthday' => '1995-09-10',
                'phone_number' => '085678123198',
                'email' => 'amira23@gmail.com',
                'address' => 'Blotan rt 02/18 Baki Siwal Sukoharjo',
            ],
            [
                'name' => 'Rahma Ainur Rofiq',
                'no_member'=>'M180720192',
                'birthday' => '1986-03-13',
                'phone_number' => '085742088411',
                'email' => 'rahma_ar@gmail.com',
                'address' => 'Surakarta',
            ],
            [
                'name' => 'Frida Megawati',
                'no_member'=>'M180720193',
                'birthday' => '1997-01-20',
                'phone_number' => '085734088911',
                'email' => 'fridamega@gmail.com',
                'address' => 'Karanganyar',
            ],
            [
                'name' => 'Retno Tri Asih',
                'no_member'=>'M180720194',
                'birthday' => '1997-03-11',
                'phone_number' => '085642789189',
                'email' => 'asih1103@gmail.com',
                'address' => 'Surakarta',
            ],
        ];

        $timestamp = \Carbon\Carbon::now();
        foreach ($members as $member) {
            DB::table('members')->insert([
                'name' => $member['name'],
                'no_member' => $member['no_member'],
                'birthday' => $member['birthday'],
                'phone_number' => $member['phone_number'],
                'email' => $member['email'],
                'address' => $member['address'],
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ]);
        }
    }
}
