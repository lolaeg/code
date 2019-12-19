<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicacion extends Model
{
    protected $fillable = ['unidadesmed','frecuenciamed', 'instrucciones','tratamiento_id', 'medicamento_id'];
    //

    public function tratamiento()
    {
        return $this->belongsTo('App\Tratamiento');
    }
    public function medicamento()
    {
        return $this->belongsTo('App\Tratamiento');
    }
}
