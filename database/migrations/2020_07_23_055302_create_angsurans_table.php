<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAngsuransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('angsurans', function (Blueprint $table) {
            $table->id();
            $table->string('angsuran_ke')->nullable();
            $table->string('tanggal_seharusnya');
            $table->string('tanggal_pembayaran');
            $table->string('pokok_dibayar');
            $table->string('pokok_tunggakan');
            $table->string('jasa_dibayar');
            $table->string('jasa_tunggakan');
            $table->string('sisa');
            $table->string('nama_penyetor')->nullable();
            $table->string('ttd_penyetor')->nullable();
            $table->foreignId('nasabah_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('angsurans');
    }
}
