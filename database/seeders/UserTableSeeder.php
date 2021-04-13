<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Let's clear the users table first
        \App\Models\User::truncate();

        //inserting our sole user
        \App\Models\User::create([
            'name' => 'Gordon',
            'email' => 'commisioner@gpc.usa',
            'password' => 'GothamCity',

        ]);
    }
}
