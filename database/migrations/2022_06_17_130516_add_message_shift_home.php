<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMessageShiftHome extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
           if (!Schema::hasColumn('shift_homes', 'message'))
        {
        Schema::table('shift_homes', function (Blueprint $table) {
            $table->text('message')->nullable();
        });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('shift_homes', function (Blueprint $table) {
            //
        });
    }
}
