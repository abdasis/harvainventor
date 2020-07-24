<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Angsuran extends Model
{
    public function nasabah()
    {
        return $this->belongsTo(Nasabah::class);
    }
}
