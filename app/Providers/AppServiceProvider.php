<?php

namespace App\Providers;

use App\Paciente;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * NUHSAs válidos:
     * AN1000038583
     * AN0326435212
     * AN0408397178
     * AN0404408155
     * AN0415331870
     *
     * NUHSA no válido:
     * AN0415531870
     *
     * @return void
     */
    public function boot()
    {
        //
        Validator::extend('nuhsa', function($field,$value,$parameters){
            if (strlen($value)!=12  || substr($value,0,2)!="AN" || !is_numeric(substr($value,2))){
                return false;
            }
            else{
                return true;
            }
            /*$b = (float) substr($value,2,8);
            $c = (float) substr($value,10, 2);

		    if ($b < 10000000) {
                $d = $b + 60 * 10000000;
            }
            else {
                $d = (float) "60" . substr($value, 2, 8);
            }
		    return $d % 97 == $c;*/
        });

        Validator::replacer('nuhsa', function ($message, $attribute, $rule, $parameters) {
              return "NUHSA incorrecto. AN y 10 dígitos. Ej: AN1234567890";

        });
        Validator::extend('especialidad', function ($field,$value1,$value2,$parameters){
            $id_med = $value1->get('id');
            $id_pac = $value2->get('id');
            $medico = Medico::find($id_med);
            $paciente = Paciente::find($id_pac);
            if ($medico->get('especialidad_id') == $paciente->get('especialidad_id')){
                return false;
            }else{
                return true;
            }
        });

        Validator::replacer('especialidad', function ($message, $attribute, $rule, $parameters) {
            return "La especialidad del medico seleccionado es distinta a la de la enfermedad del paciente";

        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
