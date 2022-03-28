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
        color::create(array('name' => 'indigo', 'code' => '#7114C5', 'class' => 'indigo-600'));
        color::create(array('name' => 'pink', 'code' => '#fd88f4', 'class' => 'pink-600'));
        color::create(array('name' => 'seablue', 'code' => '#53b2ff', 'class' => 'blue-600'));
        color::create(array('name' => 'orange', 'code' => '#ffbb43', 'class' => 'orange-600'));
        color::create(array('name' => 'green', 'code' => '#38b900', 'class' => 'green-600'));
        color::create(array('name' => 'limegreen', 'code' => '#32CD32', 'class' => 'limegreen-600'));
        color::create(array('name' => 'darkblue', 'code' => '#0047AB', 'class' => 'darkblue-600'));

    }
}
