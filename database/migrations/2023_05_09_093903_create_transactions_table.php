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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->integer("id_don_hang");
            $table->integer("id_khach_hang");
            $table->string('ma_don_hang');
            $table->string('transId');
            $table->dateTime("ngay_thanh_toan");
            $table->double("so_tien");
            $table->text("message");
            $table->string("signature");
            $table->integer("trang_thai");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
