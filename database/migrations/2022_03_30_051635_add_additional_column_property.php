<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdditionalColumnProperty extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->unsignedBigInteger('floor_id')->nullable();
            $table->index('floor_id');

            $table->foreign('floor_id')->references('id')->on('floors')->onDelete('cascade');

            $table->unsignedBigInteger('road_size_id')->nullable();
            $table->index('road_size_id');

            $table->foreign('road_size_id')->references('id')->on('road_sizes')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('properties', function (Blueprint $table) {
            //
        });
    }
}
