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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('user_phone');
            $table->unsignedBigInteger('stylist_id');
            $table->unsignedBigInteger('timesheet_id');
            $table->string('price');
            $table->date('date');
            $table->boolean('is_consultant');
            $table->boolean('is_accept_take_a_photo');
            $table->boolean('status');
            $table->softDeletes();
            $table->timestamps();

//            $table->foreign('stylist_id')->references('id')->on('stylists');
//            $table->foreign('user_id')->references('id')->on('users');
//            $table->foreign('timesheet_id')->references('id')->on('timesheet');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
