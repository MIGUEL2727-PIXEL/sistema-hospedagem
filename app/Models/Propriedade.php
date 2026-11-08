<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Propriedade extends Model
{
   protected $table = 'propriedades';
   protected $fillable = ['nome','endereco'];

   public function quartos() {
    return $this->hasMany(Quarto::class);
   }
}
