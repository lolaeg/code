<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tratamiento extends Model
{
    protected $fillable = ['enfermedad_id', 'description', 'date_start', 'date_finish'];

    public function enfermedad() //CAMBIADO: AÑADIDA LA FUNCION
    {
        return $this->belongsTo('App\Enfermedad');
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
