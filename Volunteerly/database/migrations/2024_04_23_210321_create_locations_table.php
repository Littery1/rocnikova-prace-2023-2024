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
        Schema::create('locations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('city', 100);
            $table->string('province');
            $table->string('street')->nullable();
            $table->decimal('latitude', 10, 7); 
            $table->decimal('longitude', 10, 7);      
            $table->timestamp('updated_at');
            $table->timestamp('created_at');

            $table->unique(['id'], 'location_key2');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('locations');
    }
};
