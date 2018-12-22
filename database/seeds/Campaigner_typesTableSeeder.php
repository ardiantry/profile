<?php

use Illuminate\Database\Seeder;

class Campaigner_typesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('campaigner_types')->insert([
            'type' => 'Yayasan',
            'created_at' => \Carbon\Carbon::now('Asia/Jakarta')
        ]);

        DB::table('campaigner_types')->insert([
            'type' => 'Komunitas',
            'created_at' => \Carbon\Carbon::now('Asia/Jakarta')
        ]);
    }
}
