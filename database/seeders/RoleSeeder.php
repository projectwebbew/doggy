<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    public function run()
    {
        DB::table('roles')->insert([
            [
                'slug' => 'admin',
                'name' => 'Administrator'
            ],
            [
                'slug' => 'editor',
                'name' => 'Editor'
            ],
            [
                'slug' => 'manager',
                'name' => 'Manager'
            ],
            [
                'slug' => 'vendor',// поставщик товара
                'name' => 'Vendor',
            ],
            [
                'slug' => 'customer',// клиент
                'name' => 'Customer',
            ],
        ]);
    }
}
