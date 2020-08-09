<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nasabah extends Model
{
    public function angsuran()
    {
        return $this->hasOne(Angsuran::class);
    }

    public function anggota()
    {
        return $this->hasMany(Anggota::class);
    }
}
