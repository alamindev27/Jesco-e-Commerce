<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Alamin',
            'email' => 'fma.developer21@gmail.com',
            'password' => Hash::make('fma.developer21@gmail.com'),
            'role' => 2,
            'created_at' => Carbon::now(),
        ]);
    }
}
