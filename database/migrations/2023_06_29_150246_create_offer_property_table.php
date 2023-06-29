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
        Schema::create('offer_property', function (Blueprint $table) {
            $table->id();
            $table->foreignId('offer_id');
            $table->foreign('offer_id')->references('id')->on('offers')->cascadeOnDelete();

            $table->foreignId('property_id');
            $table->foreign('property_id')->references('id')->on('properties')->cascadeOnDelete();

            $table->dateTime('started_at');
            $table->dateTime('finished_at');
            $table->boolean('expired');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offer_property');
    }
};
