<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoostSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boost_subscriptions', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('feature_label_1')->nullable();
            $table->string('feature_value_1')->nullable();

            $table->string('feature_label_2')->nullable();
            $table->string('feature_value_2')->nullable();

            $table->string('feature_label_3')->nullable();
            $table->string('feature_value_3')->nullable();

            $table->string('feature_label_4')->nullable();
            $table->string('feature_value_4')->nullable();

            $table->string('feature_label_5')->nullable();
            $table->string('feature_value_5')->nullable();

            $table->string('feature_label_6')->nullable();
            $table->string('feature_value_6')->nullable();

            $table->string('feature_label_7')->nullable();
            $table->string('feature_value_7')->nullable();


            $table->string('feature_label_8')->nullable();
            $table->string('feature_value_8')->nullable();


            $table->string('feature_label_9')->nullable();
            $table->string('feature_value_9')->nullable();

            $table->string('feature_label_10')->nullable();
            $table->string('feature_value_10')->nullable();


            $table->integer('order')->nullable();
            $table->integer('status')->default(1);


            $table->string('color')->default('yellow');

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
        Schema::dropIfExists('boost_subscriptions');
    }
}
