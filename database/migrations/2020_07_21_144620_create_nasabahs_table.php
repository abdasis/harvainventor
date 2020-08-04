<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNasabahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nasabahs', function (Blueprint $table) {
            $table->id();
            $table->string('nomor', 100)->nullable();
            $table->string('nama', 100)->nullable();
            $table->longText('alamat')->nullable();
            $table->string('berdiri', 5)->nullable();
            $table->string('desa', 100);
            $table->string('kepala_desa', 100);
            $table->string('ketua', 100);
            $table->string('sekretaris', 100);
            $table->string('bendahara', 100);
            $table->double('total_pinjaman');
            $table->double('jasa_pinjaman');
            $table->string('tanggal_pencarian');
            $table->string('jangka_pinjaman');
            $table->string('jenis_pinjaman');
            $table->string('jumlah_angsuran');
            $table->double('besar_pokok');
            $table->double('besar_jasa');
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
        Schema::dropIfExists('nasabahs');
    }
}
