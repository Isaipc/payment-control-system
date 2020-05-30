<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelTransacPersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rel_transac_personas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('created_user_id');
            $table->unsignedBigInteger('persona_id');
            $table->unsignedBigInteger('transaccion_id');
            $table->foreign('created_user_id')->references('id')->on('users');
            $table->foreign('persona_id')->references('id')->on('personas');
            $table->foreign('transaccion_id')->references('id')->on('transaccions');
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
        Schema::dropIfExists('rel_transac_personas');
    }
}
