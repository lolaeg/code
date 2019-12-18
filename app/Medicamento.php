<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicamento extends Model
{
    protected $fillable = ['name', 'composition', 'presentation'];

    public function getFullNameAttribute()
    {
        return $this->name .' '. $this->composition .' '. $this->presentation;
    }

    public function codigo()
    {
        return $this->name .' '. $this->composition .' '. $this->presentation;
    }
    public function tratamiento()
    {
        return $this->belongsTo('App\Tratamiento');
    }
    public function medicacion()
    {
        return $this->hasMany('App\Medicacion');
    }
}
