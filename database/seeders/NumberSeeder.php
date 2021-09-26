<?php

namespace Database\Seeders;

use App\Models\Number;
use Illuminate\Database\Seeder;

class NumberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws \Exception
     */
    public function run()
    {
        Number::factory(random_int(1,10))->create();
    }
}
