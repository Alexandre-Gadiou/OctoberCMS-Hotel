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
            $table->string('number', 11)->nullable();
            $table->integer('capacity', 11)->nullable();
            $table->float('nightly_price')->nullable();
            $table->longText('description')->nullable();
            $table->longText('description_html')->nullable();
            $table->boolean('is_available');
        });
    }

    public function down()
    {
        Schema::dropIfExists('algad_hotel_rooms');
    }

}
