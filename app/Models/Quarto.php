<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quarto extends Model
{
    protected $fillable = ['propriedade_id','tipo','capacidade','tarifa_base'];

    public function propriedade() {
        return $this->belongsTo(Propriedade::class);
    }
}
