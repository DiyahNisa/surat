<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIzinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('izins', function (Blueprint $table) {
            $table->increments('idIzins');
            $table->string('nama');
            $table->integer('nip')->unsigned();
            $table->string('jabatan');
            $table->date('tglIzin');
            $table->date('tglMasuk');
            $table->enum('jenis_surat',['Sakit','Izin','Perjalanan Dinas']);
            $table->string('ketIzin');
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
        Schema::dropIfExists('izins');
    }
}
