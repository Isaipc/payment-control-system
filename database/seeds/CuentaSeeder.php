<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Cuenta;

class CuentaSeeder extends Seeder
{
    public const CUENTAS = array(
        [
            'tipo_cuenta' => 'Bienes',
            'items' => array(
                'Activos fijos',
                'Equipo',
                'Suministros',
                'Material papelería',
                'Químicos'
            )
        ],
        [
            'tipo_cuenta' => 'Pasivos',
            'items' => array(
                'Pasivo'
            )
        ],
        [
            'tipo_cuenta' => 'Capital',
            'items' => array(
                'Capital'
            ),
        ],
        [
            'tipo_cuenta' => 'Ingresos',
            'items' => array(
                'Servicio libre',
                'Clase con entrenador'
            ),
        ],
        [
            'tipo_cuenta' => 'Gastos',
            'items' => array(
                'Gastos',
                'Gastos salariales',
                'Reconocimiento',
                'Viaticos',
                'Honorario entrenador',
                'Honorario alberquero',
                'Honorario administrador',
                'Honorario suplente',
            )
        ]
    );

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::CUENTAS  as $group) {
            foreach ($group['items'] as $cuenta) {
                $tipo_cuenta_id = array_search($group['tipo_cuenta'], TipoCuentaSeeder::TIPOS_CUENTAS);

                if ($tipo_cuenta_id !== false) {
                    // echo  "tipo cuenta: " . ($tipo_cuenta_id + 1) . " - Cuenta: " . ($cuenta) . "\n";
                    Cuenta::create([
                        'nombre' => $cuenta,
                        'tipo_cuenta_id' => $tipo_cuenta_id + 1,
                        'created_user_id' => User::DEFAULT_USER,
                        'updated_user_id' => User::DEFAULT_USER
                    ]);
                }
            }
        }
    }
}
