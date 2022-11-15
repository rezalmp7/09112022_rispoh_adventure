<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('kd_transaksi')->nullable();
            $table->string('nama_pelanggan')->nullable();
            $table->longText('alamat_pelanggan')->nullable();
            $table->string('noHp_pelanggan')->nullable();
            $table->string('identitas')->nullable();
            $table->integer('total_harga')->nullable();
            $table->enum('status', ['pesan', 'ambil', 'kembali'])->nullable();
            $table->enum('status_pembayaran', ['pending', 'lunas'])->nullable();
            $table->dateTime('tgl_lunas')->nullable();
            $table->dateTime('tgl_pesan')->nullable();
            $table->dateTime('tgl_ambil')->nullable();
            $table->dateTime('tgl_kembali')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
};
