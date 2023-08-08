<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('beds');
            $table->string('bathroom_type');
            $table->string('currency');
            $table->integer('no_of_guest');

            $table->string('price_for_one_night_1');
            $table->string('price_for_one_night_more');


            $table->string('price_for_week_1');
            $table->string('price_for_week_more');



            $table->string('price_for_month_1');
            $table->string('price_for_month_more');

            $table->unsignedBigInteger('property_id');
            $table->index('property_id');

            $table->foreign('property_id')
                    ->references('id')
                    ->on('properties')
                    ->onDelete('cascade');


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
        Schema::dropIfExists('rooms');
    }
}
