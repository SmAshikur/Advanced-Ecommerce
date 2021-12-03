<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rec=[
            [
            'name'=>'S M Ashikur Rahman',
            'type'=>'admin',
            'email'=>'admin@gmail.com',
            'password'=>bcrypt('123456'),
            ],
            [
            'name'=>'S M Ashikur Rahman',
            'type'=>'admin',
            'email'=>'admin1@gmail.com',
            'password'=>bcrypt('123456'),
            ]
            ];
             Admin::insert($rec);
    }
}
