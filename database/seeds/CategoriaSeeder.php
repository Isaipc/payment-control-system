<?php

use Illuminate\Database\Seeder;
use App\Categoria;
use App\User;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::create([
            'nombre' => Categoria::EMPLEADOS,
            'created_user_id' => User::DEFAULT_USER,
            'updated_user_id' => User::DEFAULT_USER
        ]);

        Categoria::create([
            'nombre' => Categoria::CLIENTES,
            'created_user_id' => User::DEFAULT_USER,
            'updated_user_id' => User::DEFAULT_USER
        ]);
    }
}
