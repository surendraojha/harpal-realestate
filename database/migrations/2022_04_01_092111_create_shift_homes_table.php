<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShiftHomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shift_homes', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('pick_up_location');
            $table->string('drop_off_location');
            $table->string('phone');
            $table->string('when');
            $table->time('schedule_time');
            $table->date('schedule_date');
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
        Schema::dropIfExists('shift_homes');
    }
}
