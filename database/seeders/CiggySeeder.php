<?php

namespace Database\Seeders;

use App\Models\Ciggy;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CiggySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ciggy::factory()->times(50)->create();
    }
}
