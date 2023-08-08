<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupportForumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('support_forums', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('property_id')->nullable();
            $table->index('property_id');
            $table->foreign('property_id')->references('id')->on('properties')->onDelete('cascade');

            $table->text('comment');

            $table->unsignedBigInteger('parent')->nullable();
            $table->index('parent');
            $table->foreign('parent')->references('id')->on('support_forums')->onDelete('cascade');

            $table->unsignedBigInteger('user_id')->nullable();

            $table->index('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->integer('status')->default(1);
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
        Schema::dropIfExists('support_forums');
    }
}
