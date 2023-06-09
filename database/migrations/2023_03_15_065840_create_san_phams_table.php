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
        Schema::create('san_phams', function (Blueprint $table) {
            $table->id();
            $table->string('ten_san_pham');
            $table->string('slug_san_pham');
            $table->integer('so_luong');
            $table->integer('gia_ban');
            $table->integer('gia_khuyen_mai')->nullable();
            $table->string('hinh_anh');
            $table->string('hinh_anh_2')->nullable();
            $table->string('hinh_anh_3')->nullable();
            $table->string('hinh_anh_4')->nullable();
            $table->longText('mo_ta_ngan');
            $table->longText('mo_ta_chi_tiet');
            $table->integer('tinh_trang');
            $table->bigInteger('id_danh_muc')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('san_phams');
    }
};
