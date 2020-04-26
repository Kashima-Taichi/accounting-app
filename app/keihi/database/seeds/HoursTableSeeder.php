<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

//php artisan make:seeder HoursTableSeeder
//php artisan db:seed
class HoursTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            // オートインクリメントに設定しているカラムは記載不要
            'year' => '2020',
            'month' => '3',
            'fixedTime' => '100',
            'overTime' => '40',
            'created_at' => '2020/03/25 00:00:00',
            'updated_at' => '2020/03/25 00:00:00',
        ];
        DB::table('hours')->insert($data);
    }
}
