<?php

namespace Database\Seeders;

use App\Models\color;
use App\Models\preference;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        color::create(array('name' => 'indigo', 'code' => '#7114C5'));
        color::create(array('name' => 'pink', 'code' => '#fd88f4'));
        color::create(array('name' => 'seablue', 'code' => '#53b2ff'));
        color::create(array('name' => 'orange', 'code' => '#ffbb43'));
        color::create(array('name' => 'green', 'code' => '#38b900'));
        color::create(array('name' => 'limegreen', 'code' => '#32CD32'));
        color::create(array('name' => 'darkblue', 'code' => '#0047AB'));

    }
}
