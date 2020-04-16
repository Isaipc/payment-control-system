<?php

use App\TipoEmpleado;
use Illuminate\Database\Seeder;

class TipoEmpleadosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoEmpleado::create([ 'name' => 'ADMINISTRADOR' ]);
        TipoEmpleado::create([ 'name' => 'ENTRENADOR' ]);
        TipoEmpleado::create([ 'name' => 'ALBERQUERO' ]);
    }
}
