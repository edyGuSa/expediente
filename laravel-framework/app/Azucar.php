<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Azucar extends Model
{
    protected $table = 'historico_glucosa';
    protected $fillable = [
    	'paciente_id',
    	'glucosa',
    	'fecha_registro'
    ];
}
