<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TablaEspecialidadsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $especialidades= ['Urología','Oftalmología','Ginecología','Dermatología',
        'Pediatría','Gastroenterología','Neumología','Neurología'];
        foreach ($especialidades as $key=>$value){
            DB::table('especialidads')->insert([
                'name'=>$value,
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }
    }
}
