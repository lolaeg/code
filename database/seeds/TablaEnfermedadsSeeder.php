<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TablaEnfermedadsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nombres= ['Acidez estomacal','Acné','Adenoma hipofisiario', 'Aerofagia', 'Aftas bucales',
            'Ébola','Eccema','Edema Pulmonar','Esclerosis lateral amiotrófica','Embolia pulmonar',
            'Encefalitis','Encefalopatía hepática', 'Endocarditis'];
        $alias=['Acidez de estómago','Granos','Dolor de cabeza', 'Gases', 'Yagas',
            '-','Sarpullido','Falta de aire','ELA','Pulmón encharcado',
            'Dolor de cabeza','Dolor de cabeza', 'Corazón partío'];
        $especialidad_id=['1','2','3', '4', '5',
            '6','7','8','7','6', '5','4', '3'];
        $i=0;
        foreach ($nombres as $key=>$value){
            DB::table('enfermedads')->insert([
                'name'=>$value,
                'alias'=>$alias[$i],
                'especialidad_id'=>$especialidad_id[$i],
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ]);
            $i=$i+1;
        }
    }
}
