<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    protected $table = 'historico_';
    protected $fillable = [
    	'paciente_id',
    	'notas_medicas',
    	'medicacion',
    	'diagnostico',
    ];
}
