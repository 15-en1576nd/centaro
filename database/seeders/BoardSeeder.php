<?php

namespace Database\Seeders;

use App\Models\Board;
use App\Models\board_users;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BoardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Board::create(array('type' => 'personal', 'name' => 'MartZnGeweldigeBord'));
        board_users::create(array('user_id' => 1, 'board_id' => 1, 'board_role_id' => 1));
        board_users::create(array('user_id' => 1, 'board_id' => 2, 'board_role_id' => 1));
    }
}
