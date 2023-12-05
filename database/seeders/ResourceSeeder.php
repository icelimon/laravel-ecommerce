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
