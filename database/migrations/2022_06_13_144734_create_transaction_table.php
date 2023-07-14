<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction', function (Blueprint $table) {
            $table->id();
            $table->decimal('total_price', 10, 2);
            $table->datetime('startdate');
            $table->datetime('enddate');
            $table->enum('status', ['pending', 'processing', 'completed', 'decline'])->default('pending');
            $table->string('cardname');
            $table->bigInteger('cardnumber');
            $table->string('cardexp');
            $table->integer('cardcvv');
            $table->string('cardtype');
            $table->unsignedBigInteger('properties_id');
            $table->foreign('properties_id')->references('id')->on('properties');
            $table->unsignedBigInteger('users_id');
            $table->foreign('users_id')->references('id')->on('users');
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
        Schema::dropIfExists('transaction');
    }
};
