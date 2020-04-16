<?php

use Illuminate\Database\Seeder;
use App\Persona;
use App\User;
use App\Subcategoria;

class PersonaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subcategoria = Subcategoria::firstWhere('nombre', 'Desarrollador');

        Persona::create([
            'nombre' => 'JESUS',
            'apellidos' => 'TEXNA',
            'telefono' => '294135141',
            'direccion' => 'CALLE JUAN ESCUTIA S/N COLONIA EL ARENAL',
            // 'nacimiento' =>  date('Y-m-d', mktime(0, 0, 0, 03, 19, 2020)),
            'pago_fijo' => 100,
            'subcategoria_id' => $subcategoria->id,
            'created_user_id' => User::DEFAULT_USER,
            'updated_user_id' => User::DEFAULT_USER
        ]);

        Persona::create([
            'nombre' => 'CHRISTIAN',
            'apellidos' => 'QUINO XOLO',
            'telefono' => '2941286850',
            'direccion' => 'CALLE EL VERGEL AMPLIACION BELEN GRANDE',
            // 'nacimiento' =>  date('Y-m-d', mktime(0, 0, 0, 03, 19, 2020)),
            'pago_fijo' => 100,
            'subcategoria_id' => $subcategoria->id,
            'created_user_id' => User::DEFAULT_USER,
            'updated_user_id' => User::DEFAULT_USER
        ]);
    }
}
