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
        Schema::create('payment', function (Blueprint $table) {
            $table->id();
            $table->integer('booking_id');
            $table->integer('money')->comment('tổng tiền thanh toán');
            $table->string('note')->comment('Nội dung thanh toán');
            $table->string('vnp_response_code')->comment('mã phản hồi');
            $table->string('code_vnpay')->comment('mã giao dịch vnpay');
            $table->string('code_bank')->comment('mã ngân hàng');
            $table->dateTime('time')->comment('thời gian chuyển khoản');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment');
    }
};
