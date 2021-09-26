<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Number;
use App\Models\NumberPreferences;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customer::factory(10)->create()->each(static function ($customer) {
            Number::factory(random_int(1, 10))->create(['customer_id' => $customer->id])
                ->each(static function ($number) {
                    NumberPreferences::factory()->create(['number_id' => $number->id,
                        'name' => 'auto_attendant']);
                    NumberPreferences::factory()->create(['number_id' => $number->id,
                        'name' => 'voicemail_enabled']);

                });
        });
    }
}
