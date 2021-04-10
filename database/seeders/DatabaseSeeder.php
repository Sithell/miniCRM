<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if (User::where('email', 'admin@local.in')->count() == 0) {
            User::create([
                'name' => 'admin',
                'email' => 'admin@local.in',
                'password' => Hash::make('password')
            ]);
        }

        Company::factory(10)->create();
        Employee::factory(50)->create();

        // \App\Models\User::factory(10)->create();
    }
}
