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
            $table->string('seats');
            $table->string('price');
            $table->string('date');
            $table->string('route_id');
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
        Schema::dropIfExists('confirm_bookings');
    }
}
