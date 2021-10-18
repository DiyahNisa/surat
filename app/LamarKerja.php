<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LamarKerja extends Model
{
    public $table = "lamars";
    protected $fillable = ['idLamar','tujuan','nama','tempatLahir','tglLahir','jk','penTerakhir','noHp','alamat','posisi','tempatPembuatan'];
    protected $primaryKey = 'idLamar';
    protected $dates = ['tglLahir'];
}
