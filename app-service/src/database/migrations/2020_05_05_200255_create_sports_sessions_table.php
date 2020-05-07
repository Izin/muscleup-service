<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSportsSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sports_sessions', function (Blueprint $table) {
            $table->id();
            $table->date('date_session')->useCurrent();
            $table->integer('pull_ups')->default(0);
            $table->integer('push_ups')->default(0);
            $table->boolean('is_running')->default(false);
            $table->integer('duration_minutes')->default(0);
            $table->text('comment');
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
        Schema::dropIfExists('sports_sessions');
    }
}
