<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TablaConsultasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $consultas= ['Consulta 1','Consulta 2','Consulta 3'];
        foreach ($consultas as $key=>$value){
            DB::table('consultas')->insert([
                'name'=>$value,
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }
    }
}
