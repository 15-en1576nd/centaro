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
        color::create(array('name' => 'red', 'code' => '#DC2626', 'class' => 'red-600'));
        color::create(array('name' => 'lightred', 'code' => '#F87171', 'class' => 'red-400'));
        color::create(array('name' => 'orange', 'code' => '#F97316', 'class' => 'orange-500'));
        color::create(array('name' => 'yellow', 'code' => '#FDE047', 'class' => 'yellow-300'));
        color::create(array('name' => 'gold', 'code' => '#CA8A04', 'class' => 'yellow-600'));
        color::create(array('name' => 'limegreen', 'code' => '#84CC16', 'class' => 'lime-500'));
        color::create(array('name' => 'lightgreen', 'code' => '#4ADE80', 'class' => 'green-400'));
        color::create(array('name' => 'darkgreen', 'code' => '#15803D', 'class' => 'green-700'));
        color::create(array('name' => 'cyan', 'code' => '#0D9488', 'class' => 'teal-600'));
        color::create(array('name' => 'blue', 'code' => '#2563eb', 'class' => 'blue-600'));
        color::create(array('name' => 'lightblue', 'code' => '#38bdf8', 'class' => 'sky-400'));
        color::create(array('name' => 'purple', 'code' => '#7c4aed', 'class' => 'violet-600'));
        color::create(array('name' => 'pink', 'code' => '#a855f7', 'class' => 'purple-500'));
    }
}
