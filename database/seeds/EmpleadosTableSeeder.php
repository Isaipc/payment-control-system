<?php

use Illuminate\Database\Seeder;

class EmpleadosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Empleado::create([
            'nombre' => 'JESUS',
            'apellidos' => 'TEXNA',
            'telefono' => '294135141',
            'direccion' => 'CALLE JUAN ESCUTIA S/N COLONIA EL ARENAL',
            // 'nacimiento' =>  date('Y-m-d', mktime(0, 0, 0, 03, 19, 2020)),
            'tipo_emp_id' => 1
        ]);

        Empleado::create([
            'nombre' => 'CHRISTIAN',
            'apellidos' => 'QUINO XOLO',
            'telefono' => '2941286850',
            'direccion' => 'CALLE EL VERGEL AMPLIACION BELEN GRANDE',
            // 'nacimiento' =>  date('Y-m-d', mktime(0, 0, 0, 03, 19, 2020)),
            'tipo_emp_id' => 1
        ]);
    }
}
