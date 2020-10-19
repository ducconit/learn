<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Task::create([
            'title'=>'đi sở thú',
            'description'=>'đi sở thú vào thứ 2',
            'status'=>true
        ])->tags()->attach([3]);
        Task::create([
            'title'=>'Thăm bà ngoại',
            'description'=>'thăm bà ngoại thứ 2',
            'status'=>false
        ])->tags()->attach([1]);
    }
}
