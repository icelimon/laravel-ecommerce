<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        $this->call(ResourceSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(PolicySeeder::class);
        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => '123456',
            'role_id' => 1,
            'is_super_admin' => 1
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Customer',
            'email' => 'customer@example.com',
            'password' => '123456',
            'role_id' => 2,
            'is_super_admin' => 0
        ]);
        
    }
}
