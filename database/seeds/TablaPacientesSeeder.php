<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TablaPacientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nombres= ['Manuel','Javier','Alfonso', 'Carla', 'Carlos',
            'Enrique','Fran','Ernesto','César','Brutus', 'Fernando',
            'Isabel', 'Sofía','Manuel','Javier','Alfonso', 'Carla', 'Carlos',
            'Enrique','Fran','Ernesto','César','Brutus','Fernando','Isabel', 'Sofía',
            'Manuel','Javier','Alfonso', 'Carla', 'Carlos', 'Enrique','Fran','Ernesto',
            'César','Brutus', 'Fernando', 'Isabel', 'Sofía','Manuel','Javier','Alfonso',
            'Carla', 'Carlos', 'Enrique','Fran','Ernesto','César','Brutus','Fernando','Isabel', 'Sofía'];
        $apellidos= ['Domínguez','Bravo','García', 'Salmerón', 'Gutierrez',
            'Tovar','Salazar','Cebrián','Augusto','Primero', 'Fernández',
            'López', 'Alcázar','Sánchez','Lebrija','Casas', 'Lobo', 'Insigne',
            'Galán','Sánchez','Salmerón','Haiku','Rojo','Lusitano','Marquez', 'Chacón',
            'Jimenez','Oro','Plata', 'Cobre', 'Zángano', 'Conejo','Usurero','Legión',
            'Trambólico','Román', 'Calabaza', 'Erguida', 'Tostada','Guillén','Polanco','Morante',
            'Lucena', 'Hermoso', 'Hernán','Cortés','Afásico','Cogido','Leído','Zapatero','Rajoy', 'Borbón'];
        $nuhsa= ['AN0123456789','AN1123456789','AN2123456789', 'AN3123456789', 'AN4123456789',
            'AN5123456789','AN6123456789','AN7123456789','AN8123456789','AN9123456789', 'AN0223456789',
            'AN0133456789', 'AN0113456789','AN0153456789','AN0121456789','AN0124456789', 'AN0122456789', 'AN0123416789',
            'AN0123426789','AN0123436789','AN0123466789','AN0123451789','AN0123156789','AN0123256789','AN0123256789', 'AN0123556789',
            'AN0123656789','AN0123756789','AN0123406789', 'AN0123456780', 'AN0123456781', 'AN0123456782','AN0123456783','AN0123456784',
            'AN0123456786','AN0123456787', 'AN0123456788', 'AN0123456439', 'AN0323456789','AN0123346789','AN0123456709','AN0123456099',
            'AN0123096789', 'AN0123456987', 'AN0321456789','AN0123456054','AN9023456789','AN7723456789','AN1113456789','AN0023456789','AN0123456700', 'AN0120056789'];
        $enfermedad_id=['1','2','3', '4', '5', '6','7','8','7','6', '5', '4', '3','2','1','2', '2', '3',
            '4','5','6','7','8','4','3', '2', '1','2','3', '4', '5', '2','3','7',
            '5','5', '6', '7', '8','6','4','2', '1', '2', '3','4','5','6','6','7','8', '3'];
        $especialidad_id=['1','2','3', '4', '5', '6','7','8','7','6', '5', '4', '3','2','1','2', '2', '3',
            '4','5','6','7','8','4','3', '2', '1','2','3', '4', '5', '2','3','7',
            '5','5', '6', '7', '8','6','4','2', '1', '2', '3','4','5','6','6','7','8', '3'];
        $i=0;
        foreach ($nombres as $key=>$value){
            DB::table('pacientes')->insert([
                'name'=>$value,
                'surname'=>$apellidos[$i],
                'nuhsa'=>$nuhsa[$i],
                'enfermedad_id'=>$enfermedad_id[$i],
                'especialidad_id'=>$especialidad_id[$i],
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ]);
            $i=$i+1;
        }
    }
}
