<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ahorrador', function (Blueprint $table) {
            $table->id();
            $table->string('gmin');
            $table->string('paterno');
            $table->string('materno');
            $table->string('nombres');
            $table->string('fecha_nacimiento');
            $table->string('ciudad_nacimiento');
            $table->string('nacionalidad');
            $table->string('telefono');
            $table->string('correo_personal');
            $table->string('numero_identificacion');
            $table->string('calle');
            $table->string('colonia');
            $table->string('ciudad');
            $table->string('rfc');
            $table->string('curp');
            $table->string('planta');
            $table->string('departamento');
            $table->string('puesto');
            $table->string('telefono_oficina');
            $table->string('correo_empresa');
            $table->string('tipo_empleado');
            $table->string('foto');
            $table->string('status_empleado');
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
        Schema::dropIfExists('ahorrador');
    }
};
