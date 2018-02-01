<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Presion extends Model
{
    protected $table = 'historico_presion';
    protected $fillable = [
    	'paciente_id',
    	'precion',
    	'fecha_registro'
    ];
}
