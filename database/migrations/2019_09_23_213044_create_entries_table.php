<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntriesTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('entries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('centre_id');
            $table->bigInteger('in_time');
            $table->bigInteger('out_time')->nullable();
            $table->bigInteger('total')->nullable();

            $table->foreign('user_id')
                  ->references('id')
                  ->on('users');

            $table->foreign('centre_id')
                ->references('id')
                ->on('centres');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('entries');
    }
}
