<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('created_user_id');
            $table->unsignedBigInteger('updated_user_id');
            $table->unsignedBigInteger('subcategoria_id');
            $table->foreign('created_user_id')->references('id')->on('users');
            $table->foreign('updated_user_id')->references('id')->on('users');
            $table->foreign('subcategoria_id')->references('id')->on('subcategorias');
            $table->string('rfc', 15)->unique()->nullable();
            $table->string('nombre', 60);
            $table->string('apellidos', 200);
            $table->string('telefono', 12);
            $table->string('direccion', 200)->nullable();
            $table->time('hora_entrada', 0)->nullable();
            $table->time('hora_salida', 0)->nullable();
            $table->date('nacimiento')->nullable();
            $table->boolean('estatus')->default(true);
            $table->boolean('es_nadador_indie')->nullable();
            $table->double('pago_fijo')->nullable();
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
        Schema::dropIfExists('personas');
    }
}
