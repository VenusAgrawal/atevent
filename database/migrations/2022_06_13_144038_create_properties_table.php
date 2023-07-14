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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('title', 60);
            $table->text('description');
            $table->float('size');
            $table->float('price');
            $table->float('nopersons');
            $table->string('houseno', 5)->nullable();
            $table->string('street', 60)->nullable();
            $table->string('postcode', 4)->nullable();
            $table->string('locality', 60);
            $table->string('coverphoto', 255);
            $table->unsignedBigInteger('providers_id')->nullable();
            $table->foreign('providers_id')->references('id')->on('providers');
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
        Schema::dropIfExists('properties');
    }
};
