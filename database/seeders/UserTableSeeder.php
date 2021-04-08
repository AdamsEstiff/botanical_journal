<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "name" => "Adams Estiff",
            "lastname" => "Cedeño Cambronero",
            "email" => "2kamishiro2@gmail.com",
            "password" => Hash::make("moderador"),
        ]);
    }
}
