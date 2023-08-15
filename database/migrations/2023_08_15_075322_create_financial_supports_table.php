<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinancialSupportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('financial_supports', function (Blueprint $table) {
            $table->id();
            $table->string('photo')->nullable();
            $table->string('title');
            $table->string('subtitle');
            $table->double('interest_rate');
            $table->integer('loan_year');
            $table->integer('insurance')->default(0);
            $table->text('description')->nullable();
            $table->integer('order')->default(1);
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
        Schema::dropIfExists('financial_supports');
    }
}
