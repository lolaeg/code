<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->truncateTablas([
            'consultas',
            'especialidads',
            'medicos',
            'enfermedads',
            'pacientes'
        ]);
        $this->call(TablaConsultasSeeder::class);
        $this->call(TablaEspecialidadsSeeder::class);
        $this->call( TablaMedicosSeeder::class);
        $this->call(TablaEnfermedadsSeeder::class);
        $this->call(TablaPacientesSeeder::class);
        $this->call(TablaMedicamentosSeeder::class);
    }

    protected function truncateTablas(array $tablas){
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        foreach ($tablas as $tabla){
            DB::table($tabla)->truncate();
        }
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }
}
