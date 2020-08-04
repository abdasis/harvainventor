<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePernyataansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pernyataans', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('jabatan', 100);
            $table->string('kelompok', 100);
            $table->string('alamat', 100);
            $table->string('desa', 100);
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
        Schema::dropIfExists('pernyataans');
    }
}
