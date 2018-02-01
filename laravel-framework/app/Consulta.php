<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    protected $table = 'historico_consulta';
    protected $fillable = [
    	'paciente_id',
    	'notas_medicas',
    	'medicación',
    	'diagnostico',
    ];
}
