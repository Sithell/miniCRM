<?php

namespace Database\Factories;

use App\Helpers\Helper;
use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     * @var string
     */
    protected $model = Company::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $fileName = uniqid().'.png';
        Helper::saveRandomImage(storage_path('app/public/companies/'.$fileName), 100, 100);

        return [
            'name' => $this->faker->company,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'website' => $this->faker->url,
            'logo' => 'storage/companies/'.$fileName,
            'owner_id' => User::inRandomOrder()->first()->id
        ];
    }
}
