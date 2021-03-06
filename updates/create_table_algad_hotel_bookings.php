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
            $table->date('checkin');
            $table->date('checkout');
            $table->integer('adults')->unsigned();
            $table->integer('children')->unsigned();
            $table->boolean('reserved');
            $table->integer('user_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('algad_hotel_bookings');
    }

}
