<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rec=[
            ['name'=>'Men',],['name'=>'Women'],['name'=>'Child']];
             Section::insert($rec);
    }
}