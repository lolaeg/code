<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enfermedad extends Model
{
    protected $fillable = ['name', 'alias', 'especialidad_id'];

    public function especialidad()
    {
        return $this->belongsTo('App\Especialidad');
    }

    public function pacientes()
    {
        return $this->hasMany('App\Paciente');
    }
    public function getFullNameAttribute()
    {
        return $this->name .' '.$this->alias;
    }

    public function codigo()
    {
        return $this->name .' '.$this->alias .' '.$this->especialidad->name;
    }

}
