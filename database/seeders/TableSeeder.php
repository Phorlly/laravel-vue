<?php

namespace Database\Seeders;

use App\Models\Table;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Table::create(["name"=>"T01","noted"=>"Table 1"]);
        Table::create(["name"=>"T02","noted"=>"Table 2"]);
        Table::create(["name"=>"T03","noted"=>"Table 3"]);
        Table::create(["name"=>"T04","noted"=>"Table 4"]);
        Table::create(["name"=>"T05","noted"=>"Table 5"]);
        Table::create(["name"=>"T06","noted"=>"Table 6"]);
        Table::create(["name"=>"T07","noted"=>"Table 7"]);
        Table::create(["name"=>"T08","noted"=>"Table 8"]);
        Table::create(["name"=>"T09","noted"=>"Table 9"]);
        Table::create(["name"=>"T10","noted"=>"Table 10"]);
        Table::create(["name"=>"T11","noted"=>"Table 11"]);
        Table::create(["name"=>"T12","noted"=>"Table 12"]);
    }
}