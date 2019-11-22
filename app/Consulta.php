<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consulta extends Model{

    protected $fillable = ['Nombre', 'consulta_id'];


    public function citas(){

        return $this->HasOne('App\Cita');
    }

}