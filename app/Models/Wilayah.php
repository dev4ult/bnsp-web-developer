<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wilayah extends Model {
    protected $table = "wilayah_ina";

    protected $fillable = [
        'provinsi',
        'jenis_wilayah',
        'nama_wilayah'
    ];
}
