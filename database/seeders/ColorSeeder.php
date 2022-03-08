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
        color::create(array('name' => 'indigo', 'hexcode' => '#7114C5', 'secondaryhexcode' => 'white'));
        color::create(array('name' => 'pink', 'hexcode' => '#fd88f4', 'secondaryhexcode' => 'white'));
        color::create(array('name' => 'seablue', 'hexcode' => '#53b2ff', 'secondaryhexcode' => 'white'));
        color::create(array('name' => 'orange', 'hexcode' => '#ffbb43', 'secondaryhexcode' => 'white'));
        color::create(array('name' => 'green', 'hexcode' => '#38b900', 'secondaryhexcode' => 'white'));
        color::create(array('name' => 'limegreen', 'hexcode' => '#32CD32', 'secondaryhexcode' => 'white'));
        color::create(array('name' => 'darkblue', 'hexcode' => '#0047AB', 'secondaryhexcode' => 'white'));

    }
}
