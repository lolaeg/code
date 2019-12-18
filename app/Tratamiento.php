<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tratamiento extends Model
{
    protected $fillable = ['description','date_start', 'date_finish','cita_id'];

  /*  public function medico()
    {
        return $this->belongsTo('App\Medico');
    }

    public function paciente()
    {
        return $this->belongsTo('App\Paciente');
    }
    public function medicamento()
    {
        return $this->belongsTo('App\Medicamento');
    }
    public function enfermedad() //CAMBIADO: AÑADIDA LA FUNCION
    {
        return $this->belongsTo('App\Enfermedad');
    }
*/
    public function cita()
    {
        return $this->belongsTo('App\Cita');
    }
    public function medicacion()
    {
        return $this->hasMany('App\Medicacion');
    }

        public function getFullNameAttribute()
    {
        return $this->description .' '.$this->date_start .' '.$this->date_finish;
    }

    public function codigo()
    {
        return $this->description .' '.$this->date_start .' '.$this->date_finish;
    }
}
