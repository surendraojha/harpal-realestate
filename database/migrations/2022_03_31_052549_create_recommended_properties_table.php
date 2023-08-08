<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecommendedPropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recommended_properties', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('property_id');
            $table->index('property_id');
            $table->foreign('property_id')->references('id')->on('properties')->onDelete('cascade');

            $table->integer('order');
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
        Schema::dropIfExists('recommended_properties');
    }
}
