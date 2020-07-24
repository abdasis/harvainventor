<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nasabah extends Model
{
    public function angsuran()
    {
        return $this->hasMany(Angsuran::class);
    }
}
