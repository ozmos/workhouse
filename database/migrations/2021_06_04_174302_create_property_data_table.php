<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertyDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_data', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->unsignedInteger('price');
            $table->unsignedSmallInteger('bedrooms');
            $table->unsignedSmallInteger('bathrooms');
            $table->unsignedSmallInteger('garages');
            $table->unsignedSmallInteger('frontage');
            $table->string('image');
            $table->boolean('special');
            $table->boolean('featured');
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
        Schema::dropIfExists('property_data');
    }
}
