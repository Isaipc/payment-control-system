<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->command->info('user table seeded!');

        //valores fijos de la base de datos:
        $this->call(TipoCuentaSeeder::class);
        $this->command->info('tipo_cuentas table seeded!');

        $this->call(CuentaSeeder::class);
        $this->command->info('cuentas table seeded!');

        $this->call(CategoriaSeeder::class);
        $this->command->info('categorias table seeded!');

        $this->call(SubcategoriaSeeder::class);
        $this->command->info('subcategorias table seeded!');

        $this->call(PersonaSeeder::class);
        $this->command->info('personas table seeded!');
    }
}
