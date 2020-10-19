<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'Administrator',
            'email'=>'admin@demo.test',
            'password'=>app('hash')->make('123'),
            'api_token'=>\Str::random(60)
        ]);
        User::create([
            'name'=>'Cảnh Sát',
            'email'=>'police@demo.test',
            'password'=>app('hash')->make('123'),
            'api_token'=>\Str::random(60)
        ]);
        User::create([
            'name'=>'Kẻ Trộm',
            'email'=>'thief@demo.test',
            'password'=>app('hash')->make('123'),
            'api_token'=>\Str::random(60)
        ]);
    }
}
