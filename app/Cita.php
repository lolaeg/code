<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    //HE AÑADIDO CONSULTA_ID PORQ  ES UN ATRIBUTO NUEVO QUE NECESITA
    protected $fillable = ['name','fecha_hora', 'medico_id', 'paciente_id','consulta_id'];

    public function medico()
    {
        return $this->belongsTo('App\Medico');
    }

    public function paciente()
    {
        return $this->belongsTo('App\Paciente');
    }
    //HE AÑADIDO CONSULTA YA QUE AHORA LA CLASE CITA VA A TENER UNA CONSULTA ASIGNADA
    public function consulta()
    {
        return $this->belongsTo('App\Consulta');
    }
    public function tratamiento()
    {
        return $this->belongsTo('App\Tratamiento');
    }

    public function getFechaFinAtributte()
    {
        $duracion=15;
        $segundos_fecha_inicio=strtotime($this->fecha_hora);
        $segundos_duracion=$duracion*60;
        $segundos_totales = $segundos_fecha_inicio + $segundos_duracion;
        $fecha_fin = date('H:i', $segundos_totales);

        return $fecha_fin;
    }




}
