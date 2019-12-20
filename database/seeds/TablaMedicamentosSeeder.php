<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TablaMedicamentosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nombres= ['Paracetamol','Ibuprofeno','Aspirina', 'Omeoplazol', 'Amoxiciclina'];
        $composition= ['Paracetamol','Ibuprofeno','Ácido Acetíl Salicílico', 'Omeoplazol', 'Amoxiciclina'];;
        $presentacion= ['Baja la fiebre','Analgésico','Analgésico vaso-dilatador', 'Protector gástrico', 'Antibiótico'];
        $i=0;
        foreach ($nombres as $key=>$value){
            DB::table('medicamentos')->insert([
                'name'=>$value,
                'composition'=>$composition[$i],
                'presentation'=>$presentacion[$i],
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ]);
            $i=$i+1;
        }
    }
}
