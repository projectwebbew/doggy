<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@test.ru',
            'email_verified_at' => '2020-01-01 00:00:00',
            'password' => Hash::make('1234demo'),
            'user_status_id' => 2,
        ]);
// set roles
        $admin->roles()->sync([1,2,3,4]);

        $editor = User::create([
            'name' => 'Bloger',
            'email' => 'editor@test.ru',
            'email_verified_at' => '2020-01-01 00:00:00',
            'password' => Hash::make('1234demo'),
            'user_status_id' => 1,
        ]);
        $editor->roles()->sync([2]);

        $manager = User::create([
            'name' => 'Manager',
            'email' => 'manager@test.ru',
            'email_verified_at' => '2020-01-01 00:00:00',
            'password' => Hash::make('1234demo'),
            'user_status_id' => 1,
        ]);
        $manager->roles()->sync([3]);

        $vendor = User::create([
            'name' => 'Vendor',
            'email' => 'vendor@test.ru',
            'email_verified_at' => '2020-01-01 00:00:00',
            'password' => Hash::make('1234demo'),
            'user_status_id' => 1,
        ]);
        $vendor->roles()->sync([4]);

        $customer = User::create([
            'name' => 'Customer',
            'email' => 'customer@test.ru',
            'email_verified_at' => '2020-01-01 00:00:00',
            'password' => Hash::make('1234demo'),
            'user_status_id' => 1,
        ]);
        $customer->roles()->sync([5]);
// Запускаем фабрику и запускаем столько пользователей сколько надо.
        User::factory ()->count (20)->create ();
    }
}
