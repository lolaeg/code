<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    //

    protected $fillable = ['name', 'surname', 'especialidad_id'];


    public function especialidad()
    {
        return $this->belongsTo('App\Especialidad');
    }

    public function citas()
    {
        return $this->hasMany('App\Cita');
    }

    /**
     * @return string
     */
    public function getFullNameAttribute()
    {
        return $this->name . ' ' . $this->surname;
    }

    //modificación mia
    //public function codigo(){
    //  return $this->name .' '.$this->surname. ' '.$this->especialidad()->name;
    //}
}
