<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpeedTestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('speedtest_history', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('provider_id');
            $table->string('ping', 30);
            $table->string('download_speed', 30);
            $table->string('upload_speed', 30);
            $table->string('ip', 30);
            $table->timestamps();

            $table->foreign('provider_id')->references('id')->on('speedtest_provider');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('speedtest_history');
    }
}
