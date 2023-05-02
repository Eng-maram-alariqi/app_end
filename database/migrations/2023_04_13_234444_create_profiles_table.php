<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // public function up(): void
    // {
    //     Schema::create('profiles', function (Blueprint $table) {
    //         $table->id();
    //         $table->timestamps();
    //     });
    // }
    public function up()
{

    Schema::create('profiles', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->unsignedBigInteger('user_id');
        $table->enum('actualLocationType', ['منزل', 'محل', 'مطعم']);
        $table->string('brand_name');
        $table->string('working_hours');
        $table->string('details');
        $table->string('image');
        $table->string('phone_number1')->nullable();
        $table->string('phone_number2')->nullable();
        $table->string('phone_number3')->nullable();
        $table->string('phone_number4')->nullable();
        $table->string('phone_number5')->nullable();
        $table->timestamps();
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    });
    
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
