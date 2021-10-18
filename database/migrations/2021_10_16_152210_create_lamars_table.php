<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLamarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lamars', function (Blueprint $table) {
            $table->increments('idLamar');
            $table->string('tujuan');
            $table->string('nama');
            $table->string('tempatLahir');
            $table->date('tglLahir');
            $table->enum('jk',['Laki-laki','Perempuan']);
            $table->string('penTerakhir');
            $table->string('noHp');
            $table->string('alamat');
            $table->string('posisi');
            $table->string('tempatPembuatan');
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
        Schema::dropIfExists('lamars');
    }
}
