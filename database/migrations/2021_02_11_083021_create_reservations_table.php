<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->string('cus_name');
            $table->string('cus_phone');
            $table->string('seats');
            $table->string('price');
            $table->string('date');
            // $table->string('bus_id');
            $table->unsignedBigInteger('bus_id');
            // $table->string('route_id');
            $table->unsignedBigInteger('route_id');
            $table->timestamps();

            $table->foreign('route_id')->references('id')->on('routes')->onDelete('cascade');;
            $table->foreign('bus_id')->references('id')->on('buses')->onDelete('cascade');;
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
