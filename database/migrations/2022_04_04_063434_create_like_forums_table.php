<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLikeForumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('like_forums', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('support_forum_id');

            $table->index('support_forum_id');
            $table->foreign('support_forum_id')->references('id')->on('support_forums')->onDelete('cascade');

            $table->unsignedBigInteger('user_id');

            $table->index('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

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
        Schema::dropIfExists('like_forums');
    }
}
