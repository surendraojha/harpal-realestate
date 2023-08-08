<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('date_of_build')->nullable();
            $table->string('purpose');
            $table->bigInteger('view')->default(0);
            $table->string('bedroom');
            $table->string('bathroom')->nullable();
            $table->string('floor');
            $table->string('parking')->nullable();
            $table->string('balcony')->nullable();
            $table->string('water')->nullable();
            $table->string('location_for_map');
            $table->text('overview')->nullable();
            $table->text('featured_photo')->nullable();
            $table->text('featured_video')->nullable();
            $table->string('price');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('sub_category_id');
            $table->unsignedBigInteger('user_id');
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('properties');
    }
}
