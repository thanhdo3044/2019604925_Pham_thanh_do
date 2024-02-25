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
        Schema::table('stylist_time_sheet', function (Blueprint $table) {
            $table->integer('work_day_id')->after('timesheet_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('stylist_time_sheets', function (Blueprint $table) {
            //
        });
    }
};
