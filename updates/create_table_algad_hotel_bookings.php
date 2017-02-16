<?php

namespace Algad\Hotel\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateTableAlgadHotelBookings extends Migration
{

    public function up()
    {
        Schema::create('algad_hotel_bookings', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->timestamp('date_in');
            $table->timestamp('date_out');
            $table->integer('user_id');
            $table->integer('room_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('algad_hotel_bookings');
    }

}