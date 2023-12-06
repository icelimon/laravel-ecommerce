<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PolicySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('policies')->insert(['role_id' => 1, 'resource_id' => 1]);
        DB::table('policies')->insert(['role_id' => 1, 'resource_id' => 2]);
        DB::table('policies')->insert(['role_id' => 1, 'resource_id' => 3]);
        DB::table('policies')->insert(['role_id' => 1, 'resource_id' => 4]);
        DB::table('policies')->insert(['role_id' => 1, 'resource_id' => 5]);
        DB::table('policies')->insert(['role_id' => 1, 'resource_id' => 6]);
        DB::table('policies')->insert(['role_id' => 1, 'resource_id' => 7]);
        DB::table('policies')->insert(['role_id' => 1, 'resource_id' => 8]);
        
        DB::table('policies')->insert(['role_id' => 1, 'resource_id' => 9]);
        DB::table('policies')->insert(['role_id' => 1, 'resource_id' => 10]);
        DB::table('policies')->insert(['role_id' => 1, 'resource_id' => 11]);
        DB::table('policies')->insert(['role_id' => 1, 'resource_id' => 12]);
        DB::table('policies')->insert(['role_id' => 1, 'resource_id' => 13]);
        DB::table('policies')->insert(['role_id' => 1, 'resource_id' => 14]);
        DB::table('policies')->insert(['role_id' => 1, 'resource_id' => 15]);
        DB::table('policies')->insert(['role_id' => 1, 'resource_id' => 16]);
    }
}
