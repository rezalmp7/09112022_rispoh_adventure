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
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('kd_transaksi')->nullable();
            $table->integer('id_produk')->nullable();
            $table->string('nama_produk')->nullable();
            $table->integer('qty')->nullable();
            $table->integer('harga')->nullable();
            $table->integer('lama_sewa')->nullable();
            $table->integer('jumlah_harga')->nullable();
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
        Schema::dropIfExists('pesanans');
    }
};
