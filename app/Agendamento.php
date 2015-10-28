<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{
    protected $table = 'agendamentos';

    protected $fillable = array('prof_id', 'usuario_id','sala_id','tipo','descricao','dia','hora_inicio','hora_fim');
}
