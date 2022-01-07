<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data', function (Blueprint $table) {
            $table->id();
            $table->string('nomor');
            $table->string('nama');
            $table->unsignedBigInteger('simpanan_id');
            $table->unsignedBigInteger('pinjaman_id');
            $table->unsignedBigInteger('cicilan_id');
            $table->unsignedBigInteger('keperluan_id');
            $table->unsignedBigInteger('status_id');

            
            $table->foreign('simpanan_id')->references('id')->on('kategori_simpanan')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('pinjaman_id')->references('id')->on('kategori_pinjaman')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('cicilan_id')->references('id')->on('kategori_cicilan')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('keperluan_id')->references('id')->on('kategori_keperluan')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('status_id')->references('id')->on('kategori_status')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data');
    }
}
