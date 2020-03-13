<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('rfc', 15)->unique()->nullable();
            $table->string('nombre', 50);
            $table->string('apellidos', 200);
            $table->string('telefono', 12)->nullable();
            $table->string('direccion', 200)->nullable();
            $table->string('horario', 200)->nullable();
            $table->date('nacimiento')->nullable();
            $table->boolean('estatus')->default(true);
            $table->boolean('es_nadador_indie')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
