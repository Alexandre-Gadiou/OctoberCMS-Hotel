<?php

namespace Algad\Hotel\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class ExtendsTableUsers extends Migration
{

    public function up()
    {
        Schema::table('users', function($table)
        {
            $table->timestamp('dateOfBirth');
        });
    }

    public function down()
    {
        Schema::table('users', function ($table)
        {
            $table->dropColumn(['dateOfBirth']);
        });
    }

}
