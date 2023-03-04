<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 15; $i++) {
            DB::table('cats')->insert([
                'name' => Str::random(10),
                'breed' => Str::random(10),
                'description' => 'Very good cat, it can do tricks too.',
                'price' => 150 + $i,
                'dob' => new DateTime('19-11-2022'),
            ]);
        }
    }
}
