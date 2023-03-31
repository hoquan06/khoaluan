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
        Schema::create('don_hangs', function (Blueprint $table) {
            $table->id();
            $table->string('ma_don_hang');
            $table->double('tong_tien', 18, 0); //18 chữ số, thập phân
            $table->double('tien_giam_gia', 18, 0);
            $table->double('thuc_tra', 18, 0);
            $table->integer('agent_id');
            $table->integer('loai_thanh_toan');
            $table->string('dia_chi_giao_hang');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('don_hangs');
    }
};
