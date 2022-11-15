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
        Schema::create('solicitudes_prestamo', function (Blueprint $table) {
            $table->id();
            $table->string('gmin_solicitante');
            $table->integer('tipo_prestamo');
            $table->float('monto');
            $table->float('pago_total');
            $table->string('archivo_solicitud');
            $table->string('archivo_identificacion');
            $table->string('archivo_comprobante_domicilio');
            $table->string('status');
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
        Schema::dropIfExists('solicitudes_prestamo');
    }
};
