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
        Schema::create('yeu_thiches', function (Blueprint $table) {
            $table->id();
            $table->integer('san_pham_id');
            $table->string('ten_san_pham');
            $table->integer('so_luong')->default(1);
            $table->double('don_gia', 18, 0);
            $table->integer('agent_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('yeu_thiches');
    }
};
