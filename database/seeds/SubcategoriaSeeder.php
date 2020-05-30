<?php

use Illuminate\Database\Seeder;
use App\Categoria;
use App\Subcategoria;
use App\User;

class SubcategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $empleados = Categoria::firstWhere('nombre', Categoria::EMPLEADOS);
        $clientes = Categoria::firstWhere('nombre', Categoria::CLIENTES);

        foreach (Subcategoria::EMPLEADOS as $key => $value) {
            Subcategoria::create([
                'nombre' => $value,
                'categoria_id' => $empleados->id,
                'created_user_id' => User::DEFAULT_USER,
                'updated_user_id' => User::DEFAULT_USER
            ]);
        }

        foreach (Subcategoria::CLIENTES as $key => $value) {
            Subcategoria::create([
                'nombre' => $value,
                'categoria_id' => $clientes->id,
                'created_user_id' => User::DEFAULT_USER,
                'updated_user_id' => User::DEFAULT_USER
            ]);
        }
    }
}
