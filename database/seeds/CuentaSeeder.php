<?php

use Illuminate\Database\Seeder;
use App\User;
use App\TipoCuenta;
use App\Cuenta;

class CuentaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //recuperando los deltas para el plan de cuentas:
        $bienes = TipoCuenta::firstWhere('nombre', TipoCuenta::BIENES);
        $pasivos = TipoCuenta::firstWhere('nombre', TipoCuenta::PASIVOS);
        $capital = TipoCuenta::firstWhere('nombre', TipoCuenta::CAPITAL);
        $ingresos = TipoCuenta::firstWhere('nombre', TipoCuenta::INGRESOS);
        $gastos = TipoCuenta::firstWhere('nombre', TipoCuenta::GASTOS);

        foreach (Cuenta::BIENES as $value) {
            Cuenta::create([
                'nombre' => $value,
                'tipo_cuenta_id' => $bienes->id,
                'created_user_id' => User::DEFAULT_USER,
                'updated_user_id' => User::DEFAULT_USER,
            ]);
        }

        foreach (Cuenta::PASIVOS as $value) {
            Cuenta::create([
                'nombre' => $value,
                'tipo_cuenta_id' => $pasivos->id,
                'created_user_id' => User::DEFAULT_USER,
                'updated_user_id' => User::DEFAULT_USER,
            ]);
        }

        foreach (Cuenta::CAPITAL as $value) {
            Cuenta::create([
                'nombre' => $value,
                'tipo_cuenta_id' => $capital->id,
                'created_user_id' => User::DEFAULT_USER,
                'updated_user_id' => User::DEFAULT_USER,
            ]);
        }

        foreach (Cuenta::INGRESOS as $value) {
            Cuenta::create([
                'nombre' => $value,
                'tipo_cuenta_id' => $ingresos->id,
                'created_user_id' => User::DEFAULT_USER,
                'updated_user_id' => User::DEFAULT_USER,
            ]);
        }

        foreach (Cuenta::GASTOS as $value) {
            Cuenta::create([
                'nombre' => $value,
                'tipo_cuenta_id' => $gastos->id,
                'created_user_id' => User::DEFAULT_USER,
                'updated_user_id' => User::DEFAULT_USER,
            ]);
        }
    }
}
