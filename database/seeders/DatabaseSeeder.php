<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        User::factory()->create([
            'name' => 'Paradise Laundry',
            'email' => 'sarmad@paradise.com',
            'password'  => Hash::make("ShahzadFarooq")
        ]);

        User::factory()->create([
            'name' => 'Paradise Laundry',
            'email' => 'shop@paradise.com',
            'password'  => Hash::make("paradise")
        ]);

//         $this->call([
//             JobSeeder::class,
//             CustomerSeeder::class,
//             AccountSeeder::class,
//         ]);
    }
}
