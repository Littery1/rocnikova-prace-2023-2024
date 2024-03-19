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
        Schema::create('location', function (Blueprint $table) {
            $table->bigIncrements('id')->unique('location_key2');
            $table->string('street');
            $table->string('city', 100);
            $table->string('postal_code', 20);
            $table->string('country', 100);
            $table->decimal('latitude', 9, 7);
            $table->decimal('longitude', 9, 7);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('location');
    }
};
