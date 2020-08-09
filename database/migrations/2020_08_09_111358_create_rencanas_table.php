<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRencanasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rencanas', function (Blueprint $table) {
            $table->id();
            $table->string('tanggal_seharusnya', 100);
            $table->string('tanggal_pembayaran', 100);
            $table->double('pinjaman_pokok',16, 2);
            $table->double('jasa_pinjaman', 16, 2);
            $table->double('sisa_pokok', 16, 2);
            $table->double('sisa_jasa', 16, 2);
            $table->double('total', 16, 2);
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
        Schema::dropIfExists('rencanas');
    }
}
