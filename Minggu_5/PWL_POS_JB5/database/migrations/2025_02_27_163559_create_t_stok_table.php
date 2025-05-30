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
        Schema::create('t_stok', function (Blueprint $table) {
            $table->id('stok_id');

            $table->foreignId('barang_id')
                  ->constrained('m_barang', 'barang_id')
                  ->onDelete('cascade'); // jika barang dihapus, stok ikut terhapus

            $table->foreignId('user_id')
                  ->constrained('m_user', 'user_id')
                  ->onDelete('cascade'); // opsional: jika user dihapus, stoknya ikut terhapus juga

            $table->date('stok_tanggal');
            $table->integer('stok_jumlah');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_stok');
    }
};
