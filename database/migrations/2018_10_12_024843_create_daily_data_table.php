<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDailyDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_machines', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('store_id');
            $table->unsignedInteger('machine_no');

            $table->unsignedInteger('setting')->comment('設定');
            $table->unsignedInteger('games')->comment('ゲーム数');
            $table->unsignedInteger('max')->comment('最大連');

            $table->unsignedInteger('in')->comment('IN');
            $table->unsignedInteger('out')->comment('OUT');

            $table->unsignedInteger('hits_table_no')->default(0);
            $table->unsignedInteger('slump_table_no')->default(0);
            $table->unsignedInteger('hit_historiy_table_no')->default(0);
            $table->timestamp('date');
        });

        Schema::create('hits', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('hits_table_no')->comment("データ識別");

            $table->unsignedInteger('hit_no')->comment('BONUS種別');
            $table->unsignedInteger('count');
        });

        Schema::create('slumps', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('slump_table_no');

            $table->integer('amount');
            $table->unsignedInteger('data_number');
        });

        Schema::create('hit_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('hit_historiy_table_no')->comment("データ識別");
            $table->unsignedInteger('game_count');
            $table->unsignedInteger('hit_no');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('daily_machines');
        Schema::dropIfExists('hits');
        Schema::dropIfExists('slumps');
        Schema::dropIfExists('hit_histories');
    }
}
