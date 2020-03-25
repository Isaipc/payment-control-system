<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngresosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingresos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tipo_in_id');
            $table->unsignedBigInteger('emp_id');
            $table->unsignedBigInteger('cli_id');
            $table->foreign('tipo_in_id')->references('id')->on('tipo_ingresos');
            $table->foreign('emp_id')->references('id')->on('empleados');
            $table->foreign('cli_id')->references('id')->on('clientes');
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
        Schema::dropIfExists('ingresos');
    }
}
