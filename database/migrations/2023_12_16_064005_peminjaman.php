<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Peminjaman extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->id('id_peminjaman');
            $table->foreignId('id_user')->constrained('user', 'id_user')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('id_mobil')->constrained('mobil', 'id_mobil')->onUpdate('cascade')->onDelete('cascade');
            $table->date('tgl_mulai_peminjaman');
            $table->date('tgl_selesai_peminjaman');
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
        Schema::dropIfExists('peminjaman');
    }
}
