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
                'code_treatment' => 'F1',
                'category'=>'Face',
                'price' => 75000,

            ],
            [
                'name' => 'Acne Facial Liur walet',
                'code_treatment' => 'F2',
                'category'=>'Face',
                'price' => 75000,
            ],
            [
                'name' => 'Herbal Facial Liur walet',
                'code_treatment' => 'F3',
                'category'=>'Face',
                'price' => 75000,
            ],
            [
                'name' => 'Herbal Facelift Liur walet',
                'code_treatment' => 'F4',
                'category'=>'Face',
                'price' => 125000,
            ],
            [
                'name' => 'Herbal Facelift With Masker Gold 24K',
                'code_treatment' => 'F5',
                'category'=>'Face',
                'price' => 175000,
            ],
            [
                'name' => 'Herbal Facelift Lengkap',
                'code_treatment' => 'F6',
                'category'=>'Face',
                'price' => 250000,
            ],
            [
                'name' => 'Natural Soft Peeling (By Dokter)',
                'code_treatment' => 'F7',
                'category'=>'Face',
                'price' => 400000,
            ],
            [
                'name' => 'Vampire Facial',
                'code_treatment' => 'F8',
                'category'=>'Face',
                'price' => 400000,
            ],
            [
                'name' => 'Body Massage Aroma Theraphy',
                'code_treatment' => 'B1',
                'category'=>'Body',
                'price' => 100000,
            ],
            [
                'name' => 'Body Whitening',
                'code_treatment' => 'B2',
                'category'=>'Body',
                'price' => 300000,
            ],
            [
                'name' => 'Walet Body Scrub & Body Mask',
                'code_treatment' => 'B3',
                'category'=>'Body',
                'price' => 150000,
            ],
            [
                'name' => 'Aromatic Body Slimming',
                'code_treatment' => 'B4',
                'category'=>'Body',
                'price' => 200000,
            ],
            [
                'name' => 'Traditional Hot Stone Massage',
                'code_treatment' => 'B5',
                'category'=>'Body',
                'price' => 250000,
            ],
            [
                'name' => 'Cuci Blow Biasa',
                'code_treatment' => 'H1',
                'category'=>'Hair',
                'price' => 25000,
            ],
            [
                'name' => 'Cuci Blow Variasi',
                'code_treatment' => 'H2',
                'category'=>'Hair',
                'price' => 35000,
            ],
            [
                'name' => 'Creambath',
                'code_treatment' => 'H3',
                'category'=>'Hair',
                'price' => 35000,
            ],
            [
                'name' => 'Hair Spa',
                'code_treatment' => 'H4',
                'category'=>'Hair',
                'price' => 50000,
            ],
            [
                'name' => 'Masker Rambut',
                'code_treatment' => 'H5',
                'category'=>'Hair',
                'price' => 60000,
            ],
            [
                'name' => 'Menicure',
                'code_treatment' => 'S1',
                'category'=>'Special',
                'price' => 35000,
            ],
            [
                'name' => 'Pedicure',
                'code_treatment' => 'S2',
                'category'=>'Special',
                'price' => 45000,
            ],
            [
                'name' => 'Waxing',
                'code_treatment' => 'S3',
                'category'=>'Special',
                'price' => 100000,
            ],
            [
                'name' => 'Gurah Ratus',
                'code_treatment' => 'S4',
                'category'=>'Special',
                'price' => 35000,
            ],
            [
                'name' => 'Ear Candle Theraphy',
                'code_treatment' => 'S5',
                'category'=>'Special',
                'price' => 35000,
            ],
        ];

        $timestamp = \Carbon\Carbon::now();
        foreach ($treatments as $treatment) {
            DB::table('treatments')->insert([
                'name' => $treatment['name'],
                'category' => $treatment['category'],
                'code_treatment' => $treatment['code_treatment'],
                'price' => $treatment['price'],
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ]);
        }
    }
}
