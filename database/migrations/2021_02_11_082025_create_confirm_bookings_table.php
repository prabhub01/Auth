<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfirmBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('confirm_bookings', function (Blueprint $table) {
            $table->id();
            $table->string('cus_name');
            $table->string('cus_phone');
            $table->integer('seats');
            $table->integer('price');
            $table->string('date');
            // $table->integer('route_id');
            $table->unsignedBigInteger('route_id');
            // $table->integer('bus_id');
            $table->unsignedBigInteger('bus_id');
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
        Schema::dropIfExists('confirm_bookings');
    }
}
