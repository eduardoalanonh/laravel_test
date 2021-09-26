<?php

namespace Database\Factories;

use App\Models\NumberPreferences;
use Illuminate\Database\Eloquent\Factories\Factory;

class NumberPreferencesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = NumberPreferences::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'value' =>  '1'
        ];
    }
}
