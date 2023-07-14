<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //initial data
        Skill::create([
            "name"=>"Learn Laravel","slug"=>"learn/laravel"
        ]);
        Skill::create([
            "name"=>"Learn Vue","slug"=>"learn/vue"
        ]);
        Skill::create([
            "name"=>"Learn React","slug"=>"learn/react"
        ]);
        Skill::create([
            "name"=>"Learn Express","slug"=>"learn/express"
        ]);
        Skill::create([
            "name"=>"Learn ASP","slug"=>"learn/asp"
        ]);
    }
}
