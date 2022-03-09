<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('board_manual_records', function (Blueprint $table) {
            $table->id();
            $table->integer('board_id');
            $table->integer('user_id');
            $table->integer('category_id');
            $table->string('title');
            $table->string('discription');
            $table->string('type');
            $table->float('value');
            $table->string('attachment');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('board_manual_records');
    }
};
