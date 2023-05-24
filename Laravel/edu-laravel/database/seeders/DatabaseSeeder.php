<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Database\Seeders\CategorySeeder; // 시더 use

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // 초기 데이터 삽입용 시더 호출
        $this->call(CategorySeeder::class);

        // 더미 데이터 삽입용 팩토리 호출
        $cnt = 0;
        while( $cnt <= 5) {
            \App\Models\Board::factory(10000)->create();
            $cnt++;
        }
    }
}
