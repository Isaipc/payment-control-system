<?php

use Illuminate\Database\Seeder;
use App\User;
use App\TipoCuenta;

class TipoCuentaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // llenado inicial de los tipos de cuentas:
        foreach (TipoCuenta::TIPOS_CUENTAS  as $key => $value) {
            TipoCuenta::create([
                'nombre' => $value,
                'created_user_id' => User::DEFAULT_USER,
                'updated_user_id' => User::DEFAULT_USER
            ]);
        }
    }
}
