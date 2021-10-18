<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IjinKerja extends Model
{
    public $table = "izins";
    protected $fillable = ['idIzins','nama','nip','jabatan','tglIzin','tglMasuk','jenis_surat','ketIzin'];
    protected $primaryKey = 'idIzins';
    protected $dates = ['tglIzin','tglMasuk'];
}
