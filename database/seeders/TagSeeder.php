<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::create(['name'=>'Gia đình']);//1
        Tag::create(['name'=>'Công việc']);//2
        Tag::create(['name'=>'Giải trí']);//3
        Tag::create(['name'=>'Học tập']);//4
        Tag::create(['name'=>'Khác']);//5
    }
}
