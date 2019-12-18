<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $fillable = ['name', 'surname', 'nuhsa', 'enfermedad_id','especialidad_id'];

    public function enfermedad() //CAMBIADO: AÑADIDA LA FUNCION
    {
        return $this->belongsTo('App\Enfermedad');
    }

    public function especialidad()
    {
        return $this->belongsTo('App\Especialidad');
    }

    public function citas()
    {
        return $this->hasMany('App\Cita');
    }
    public function tratamiento()
    {
        return $this->hasMany('App\Tratamiento');
    }

    public function getFullNameAttribute()
    {
        return $this->name .' '.$this->surname;
        //return $this->name .' '.$this->surname .' '.$this->enfermedad->name; // CAMBIADO
    }
}
