<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hospede extends Model
{
    protected $fillable = ['nome','documento','telefone','email'];
}
