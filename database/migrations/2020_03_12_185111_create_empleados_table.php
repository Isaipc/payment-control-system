<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->string('rfc', 15)->unique()->nullable();
            $table->string('nombre', 50);
            $table->string('apellidos', 200);
            $table->string('telefono', 12);
            $table->string('direccion', 200)->nullable();
            $table->time('hora_entrada', 0)->nullable();
            $table->time('hora_salida', 0)->nullable();
            $table->date('nacimiento')->nullable();
            $table->boolean('estatus')->default(true);
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
        Schema::dropIfExists('empleados');
    }
}
