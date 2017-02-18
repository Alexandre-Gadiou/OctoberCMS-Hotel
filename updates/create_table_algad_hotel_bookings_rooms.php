<?php

namespace Algad\Hotel\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateTableAlgadHotelBookingsRooms extends Migration
{

    public function up()
    {
        Schema::create('algad_hotel_bookings_rooms', function($table)
        {
            $table->integer('booking_id');
            $table->integer('room_id');
            $table->primary(['booking_id', 'room_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('algad_hotel_bookings_rooms');
    }

}
