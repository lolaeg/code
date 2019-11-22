<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consulta extends Model{

    protected $fillable = ['id', 'name'];


    public function citas(){

        return $this->HasOne('App\Cita');
    }

}