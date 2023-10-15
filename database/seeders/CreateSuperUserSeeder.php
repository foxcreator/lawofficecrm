<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class CreateSuperUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        $superuser = User::create([
//            'name' => 'Adminko',
//            'surname' => 'Adminenko',
//            'birthdate' => fake()->date('2002-01-01'),
//            'phone' => fake()->phoneNumber(),
//            'gender' => fake()->boolean(),
//            'is_working' => fake()->boolean(),
//            'email' => 'superadmin@mail.com',
//            'email_verified_at' => now(),
//            'password' => Hash::make('admin12345'), // password
//            'remember_token' => Str::random(10),
//        ]);

//        Role::create([
//            'name' => 'super-user',
//            'created_at' => Carbon::now(),
//            'updated_at' => Carbon::now(),
//        ]);
        Role::create([
            'name' => 'manager',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        Role::create([
            'name' => 'advocate',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        Role::create([
            'name' => 'guest',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

//        $superuser->assignRole('super-user');
    }
}
