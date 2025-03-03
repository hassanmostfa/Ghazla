<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

        // \App\Models\User::factory(10)->create();

        \App\Models\Admin\Admin::create([
            'name' => 'Test User',
            'email' => 'admin@email.com',
            'password' => Hash::make('12345678'),
        ]);
    }
}
