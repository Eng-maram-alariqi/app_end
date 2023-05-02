<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
      
        Schema::create('addresses_users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('location_map_id');
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('directorate_id');
            $table->timestamps();
        
            $table->foreign('location_map_id')->references('id')->on('location_maps');
            $table->foreign('city_id')->references('id')->on('cities');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('directorate_id')->references('id')->on('directorates');

    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses_users');
    }
};
