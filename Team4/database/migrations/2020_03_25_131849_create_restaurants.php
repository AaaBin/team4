<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurants extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer("customer_id"); //關連到顧客id
            $table->integer("total_number");
            $table->integer('vegetarian_number')->nullable();
            $table->dateTime('date');
            $table->string('time_session');
            $table->string('price');
            $table->string('payment_condition')->default("not yet");
            $table->string('remark',1000)->nullable()->default("No");
            $table->string('guide_need')->default("No");
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
        Schema::dropIfExists('restaurants');
    }
}
