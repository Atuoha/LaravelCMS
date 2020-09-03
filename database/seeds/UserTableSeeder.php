<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([

            'role_id'   => 1,
            'is_active' => 2,
            'name' => str::random(10),
            'email' => str::random(10) . '@gmail.com',
            'photo_id' => 3,
            'password' => Hash::make('secured'),
            'created_at' => today(),
            'updated_at' => today(),


        ]);
    }
}
