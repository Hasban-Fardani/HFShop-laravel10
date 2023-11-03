<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::factory()->create([
            "name" => "Hasban Admin",
            "email" => "hasbanfardani@gmail.com",
            "role" => "admin",
            "city" => "Cimahi",
            "province" => "Jawa Barat",
            "address" => "JL. Terusan Mukodar no.233",
            "password" => "123",
        ]);

        User::factory()->create([
            "name" => "Hasban User",
            "email" => "hasbanfardnai77@gmail.com",
            "role" => "user",
            "city" => "Cimahi",
            "province" => "Jawa Barat",
            "address" => "Jl. Terusan Mukodar No.233",
            "password" => "123",
        ]);
    }
}
