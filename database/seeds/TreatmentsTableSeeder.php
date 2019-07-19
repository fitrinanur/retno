<?php

use Illuminate\Database\Seeder;

class TreatmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('treatments')->truncate();
        Schema::enableForeignKeyConstraints();

        $treatments = [
            [
                'name' => 'Herbal Facial Liur walet',
                'category'=>'Face',
                'price' => 75000,

            ],
            [
                'name' => 'Acne Facial Liur walet',
                'category'=>'Face',
                'price' => 75000,
            ],
            [
                'name' => 'Herbal Facial Liur walet',
                'category'=>'Face',
                'price' => 75000,
            ],
            [
                'name' => 'Herbal Facelift Liur walet',
                'category'=>'Face',
                'price' => 125000,
            ],
            [
                'name' => 'Herbal Facelift With Masker Gold 24K',
                'category'=>'Face',
                'price' => 175000,
            ],
            [
                'name' => 'Herbal Facelift Lengkap',
                'category'=>'Face',
                'price' => 250000,
            ],
            [
                'name' => 'Natural Soft Peeling (By Dokter)',
                'category'=>'Face',
                'price' => 400000,
            ],
            [
                'name' => 'Vampire Facial',
                'category'=>'Face',
                'price' => 400000,
            ],
            [
                'name' => 'Body Massage Aroma Theraphy',
                'category'=>'Body',
                'price' => 100000,
            ],
            [
                'name' => 'Body Whitening',
                'category'=>'Body',
                'price' => 300000,
            ],
            [
                'name' => 'Walet Body Scrub & Body Mask',
                'category'=>'Body',
                'price' => 150000,
            ],
            [
                'name' => 'Aromatic Body Slimming',
                'category'=>'Body',
                'price' => 200000,
            ],
            [
                'name' => 'Traditional Hot Stone Massage',
                'category'=>'Body',
                'price' => 250000,
            ],
            [
                'name' => 'Cuci Blow Biasa',
                'category'=>'Hair',
                'price' => 25000,
            ],
            [
                'name' => 'Cuci Blow Variasi',
                'category'=>'Hair',
                'price' => 35000,
            ],
            [
                'name' => 'Creambath',
                'category'=>'Hair',
                'price' => 35000,
            ],
            [
                'name' => 'Hair Spa',
                'category'=>'Hair',
                'price' => 50000,
            ],
            [
                'name' => 'Masker Rambut',
                'category'=>'Hair',
                'price' => 60000,
            ],
            [
                'name' => 'Menicure',
                'category'=>'Special',
                'price' => 35000,
            ],
            [
                'name' => 'Pedicure',
                'category'=>'Special',
                'price' => 45000,
            ],
            [
                'name' => 'Waxing',
                'category'=>'Special',
                'price' => 100000,
            ],
            [
                'name' => 'Gurah Ratus',
                'category'=>'Special',
                'price' => 35000,
            ],
            [
                'name' => 'Ear Candle Theraphy',
                'category'=>'Special',
                'price' => 35000,
            ],
        ];

        $timestamp = \Carbon\Carbon::now();
        foreach ($treatments as $treatment) {
            DB::table('treatments')->insert([
                'name' => $treatment['name'],
                'category' => $treatment['category'],
                'price' => $treatment['price'],
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ]);
        }
    }
}
