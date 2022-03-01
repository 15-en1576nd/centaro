<?php

namespace Database\Seeders;

use App\Models\preference;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PreferenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        preference::create(array('user_id' => 1, 'lang' => 'nl', 'valuta' => 'eur'));
    }
}
