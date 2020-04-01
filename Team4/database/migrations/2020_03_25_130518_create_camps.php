<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCamps extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('camps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer("customer_id"); //關連到顧客id
            $table->string("adult");
            $table->string('child')->nullable();
            $table->dateTime('check_in_date');
            $table->dateTime('striking_camp_date');
            $table->string('campsite_type');
            $table->string('equipment_need');
            $table->string('price');
            $table->string('payment_condition')->default("not yet");
            $table->string('remark',1000)->nullable()->default("No");
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
        Schema::dropIfExists('camps');
    }
}
