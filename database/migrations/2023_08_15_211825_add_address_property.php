<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAddressProperty extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('properties', function (Blueprint $table) {


            $table->unsignedBigInteger('province_id')->nullable();
            $table->index('province_id');
            $table->foreign('province_id')
                    ->references('id')
                    ->on('provinces')
                    ->onDelete('cascade');


            $table->unsignedBigInteger('district_id')->nullable();
            $table->index('district_id');
            $table->foreign('district_id')
                    ->references('id')
                    ->on('districts')
                    ->onDelete('cascade');

            $table->unsignedBigInteger('municipality_id')->nullable();
            $table->index('municipality_id');
            $table->foreign('municipality_id')
                    ->references('id')
                    ->on('municipalities')
                    ->onDelete('cascade');

            $table->unsignedBigInteger('woda_id')->nullable();
            $table->index('woda_id');
            $table->foreign('woda_id')
                    ->references('id')
                    ->on('wodas')
                    ->onDelete('cascade');

            $table->text('tole')->nullable();
            $table->text('street')->nullable();
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
            $table->dropColumn('tole');
            $table->dropColumn('street');
        });
    }
}
