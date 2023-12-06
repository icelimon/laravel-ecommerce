<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('resources')->insert(['name' => 'user.get']);
        DB::table('resources')->insert(['name' => 'user.post']);
        DB::table('resources')->insert(['name' => 'user.update']);
        DB::table('resources')->insert(['name' => 'user.delete']);
        
        DB::table('resources')->insert(['name' => 'role.get']);
        DB::table('resources')->insert(['name' => 'role.post']);
        DB::table('resources')->insert(['name' => 'role.update']);
        DB::table('resources')->insert(['name' => 'role.delete']);
        
        DB::table('resources')->insert(['name' => 'resource.get']);
        DB::table('resources')->insert(['name' => 'resource.post']);
        DB::table('resources')->insert(['name' => 'resource.update']);
        DB::table('resources')->insert(['name' => 'resource.delete']);
        
        DB::table('resources')->insert(['name' => 'policy.get']);
        DB::table('resources')->insert(['name' => 'policy.post']);
        DB::table('resources')->insert(['name' => 'policy.update']);
        DB::table('resources')->insert(['name' => 'policy.delete']);

        DB::table('resources')->insert(['name' => 'product.get']);
        DB::table('resources')->insert(['name' => 'product.post']);
        DB::table('resources')->insert(['name' => 'product.update']);
        DB::table('resources')->insert(['name' => 'product.delete']);

        DB::table('resources')->insert(['name' => 'cart.get']);
        DB::table('resources')->insert(['name' => 'cart.post']);
        DB::table('resources')->insert(['name' => 'cart.update']);
        DB::table('resources')->insert(['name' => 'cart.delete']);
        
        DB::table('resources')->insert(['name' => 'order.get']);
        DB::table('resources')->insert(['name' => 'order.post']);
        DB::table('resources')->insert(['name' => 'order.update']);
        DB::table('resources')->insert(['name' => 'order.delete']);
    }
}
