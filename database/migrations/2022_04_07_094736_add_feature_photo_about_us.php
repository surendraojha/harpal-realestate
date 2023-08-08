<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFeaturePhotoAboutUs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('about_us', function (Blueprint $table) {
            $table->text('featured_photo')->nullable();


            $table->string('title_1');
            $table->string('value_1');

            $table->string('title_2');
            $table->string('value_2');

            $table->string('title_3');
            $table->string('value_3');


            $table->string('title_4');
            $table->string('value_4');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('about_us', function (Blueprint $table) {
            //
        });
    }
}
