<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_service', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('room_id')->unsigned()->index();
            $table->bigInteger('service_id')->unsigned()->index();
            $table->timestamps();

            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('room_service');
    }
}
