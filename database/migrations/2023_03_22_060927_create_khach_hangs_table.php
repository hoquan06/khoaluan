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
        Schema::create('khach_hangs', function (Blueprint $table) {
            $table->id();
            $table->string('ho_lot')->nullable();
            $table->string('ten')->nullable();
            $table->string('ho_va_ten');
            $table->date('ngay_sinh');
            $table->integer('so_dien_thoai');
            $table->string('email');
            $table->string('mat_khau');
            $table->string('dia_chi');
            $table->integer('is_block')->default(0);
            $table->integer('is_email')->default(0);
            $table->string('hash');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('khach_hangs');
    }
};