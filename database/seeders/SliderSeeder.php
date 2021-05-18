<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sliders')->insert([
            'title' => "slider 1",
            'subtitle' => "subtitl1",
            'link' => "link1",
        ]);

        DB::table('sliders')->insert([
            'title' => "slider 2",
            'subtitle' => "subtitl2",
            'link' => "link2",
        ]);
    }
}
