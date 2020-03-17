<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMantenimientoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mantenimiento', function (Blueprint $table) {
            $table->id();
            $table->string('concepto', 120);
            $table->string('tipo', 60);
            $table->double('costo');
            $table->datetime('fecha_compra')->nullable();
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
        Schema::dropIfExists('mantenimiento');
    }
}
