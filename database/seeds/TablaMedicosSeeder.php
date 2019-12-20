<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TablaMedicosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nombres= ['Manuel','Pedro','Antonio','Francisco Javier',
            'Álvaro','Andrés','Santiago','Alfonso'];
        $apellidos=['García','Real','Morante','Peña',
            'Nieto','Sol','Domínguez','Baena'];
        $especialidad_id=['1','2','3','4',
            '5','6','7','8'];
        $i=0;
        foreach ($nombres as $key=>$value){
            DB::table('medicos')->insert([
                'name'=>$value,
                'surname'=>$apellidos[$i],
                'especialidad_id'=>$especialidad_id[$i],
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ]);
            $i=$i+1;
        }
    }
}

