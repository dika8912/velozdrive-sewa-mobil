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
      Schema::create('invoices', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained()->onDelete('cascade');
    $table->foreignId('mobil_id')->constrained('mobils')->onDelete('cascade');
    $table->date('tanggal_mulai');
    $table->date('tanggal_selesai');
    $table->integer('durasi_hari');
    $table->decimal('total_harga', 15, 2);
    $table->enum('status', ['pending', 'confirmed', 'ongoing', 'completed', 'cancelled'])->default('pending');
    $table->string('alamat_pengambilan')->nullable();
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice');
    }
};
