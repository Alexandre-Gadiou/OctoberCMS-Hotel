<?php

namespace Algad\Hotel\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateTableAlgadHotelRooms extends Migration
{

    public function up()
    {
        Schema::create('algad_hotel_rooms', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('title', 255)->nullable();
            $table->string('slug', 255)->nullable();
            $table->string('number', 11)->nullable();
            $table->boolean('is_available');
        });
    }

    public function down()
    {
        Schema::dropIfExists('algad_hotel_rooms');
    }

}
