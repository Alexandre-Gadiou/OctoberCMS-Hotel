<?php

namespace Algad\Hotel\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateTableAlgadHotelBills extends Migration
{

    public function up()
    {
        Schema::create('algad_hotel_bills', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('booking_id');
            $table->double('amount');
            $table->string('currency', 31);
            $table->boolean('is_paid');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('algad_hotel_bills');
    }

}
