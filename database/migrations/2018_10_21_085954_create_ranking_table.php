<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRankingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rankings', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('type')->comment('ランキングの種別');
            $table->unsignedInteger('ranking_span')->comment('ランキングの期間');
            $table->unsignedInteger('store_id');
            $table->unsignedInteger('machine_no');
            $table->unsignedInteger('score')->comment('ランキングの数値')->default(0);

            $table->unsignedInteger('in')->comment('IN')->default(0);
            $table->unsignedInteger('out')->comment('OUT')->default(0);
            $table->string('name');
            $table->timestamp('date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rankings');
    }
}
