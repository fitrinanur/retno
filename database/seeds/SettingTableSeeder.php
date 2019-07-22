<?php

use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('setting')->truncate();
        Schema::enableForeignKeyConstraints();

        $frequents = [
            [
                'key' => 'min_conf',
                'value'=>'10'
            ],
            [
                'key' => 'min_sup',
                'value'=>'10'
            ],
        ];

        $timestamp = \Carbon\Carbon::now();
        foreach ($frequents as $frequent) {
            DB::table('setting')->insert([
                'key' => $frequent['key'],
                'value' => $frequent['value'],
            ]);
        }
    }
}
