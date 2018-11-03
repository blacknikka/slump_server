<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMachineDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('machine_masters', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });

        Schema::create('machines', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('store_id');
            $table->integer('number')->unsigned();
            $table->string('rasp_id')
                ->unique()
                ->comment('端末ID')
                ->default('');

            $table->unsignedInteger('machine_id');

            $table->foreign('machine_id')
            ->references('id')
            ->on('machine_masters');
        });

        Schema::create('hit_masters', function (Blueprint $table) {
            $table->unsignedInteger('machine_id');
            $table->unsignedInteger('hit_no');

            $table->string('name');
            $table->string('type');
            $table->string('icon_path')->default('');

            // primary key
            $table->unique(['machine_id', 'hit_no']);

            $table->foreign('machine_id')
            ->references('id')
            ->on('machine_masters');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('machines');
        Schema::dropIfExists('machine_masters');
        Schema::dropIfExists('hit_masters');
    }
}
