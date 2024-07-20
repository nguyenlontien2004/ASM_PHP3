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
        Schema::create('tin_tucs', function (Blueprint $table) {
            $table->id();
            $table->string('tieu_de', 255);
            $table->text('noi_dung');
            $table->text('tom_tat');
            $table->string('hinh_anh');
            $table->unsignedInteger('luot_xem')->default(0);
            $table->date('ngay_dang');
            $table->unsignedBigInteger('danh_muc_id');
            $table->foreign('danh_muc_id')->references('id')->on('danh_muc_tin_tucs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tin_tucs');
    }
};