<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BoardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('boards')
        ->insert([[
            'title' => '자유게시판111',
            'content' => '자유게시판이다아아아아',
            'bid' => '1'
        ],[
            'title' => '공략게시판111',
            'content' => '공략게시판이다아아아아',
            'bid' => '2'
        ],[
            'title' => '정보게시판111',
            'content' => '정보게시판이다아아아아',
            'bid' => '3'
        ]]);
    }
}
