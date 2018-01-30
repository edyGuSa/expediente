<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peso extends Model
{
    protected $table = 'historico_peso';
    protected $fillable = [
    	'paciente_id',
    	'peso',
    	'fecha_registro'
    ];
}
