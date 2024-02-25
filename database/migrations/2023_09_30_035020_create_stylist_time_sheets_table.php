<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('stylist_time_sheet', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('timesheet_id');
            $table->boolean('is_active')->default(true);
            $table->boolean('is_block')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stylist_time_sheet');
    }
};
