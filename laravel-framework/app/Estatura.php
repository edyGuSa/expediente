<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estatura extends Model
{
    protected $table = 'historico_estatura';
    protected $fillable = [
    	'paciente_id',
    	'estatura',
    	'fecha_registro'
    ];
}
