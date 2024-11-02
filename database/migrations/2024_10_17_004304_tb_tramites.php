<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tb_tramite', function (Blueprint $table) {
            $table->bigIncrements('id_tramite');
            $table->bigInteger('id_area'); // Foránea que enlaza con la tabla de áreas (departamento)
            $table->bigInteger('id_usuario');  //Foránea que enlaza con la tabla de usuarios para indicar el responsable
            $table->date('fecha_inicio');   //Fecha de inicio del trámite
            $table->date('fecha_limite');   //Fecha límite para finalizar el trámite
            $table->string('estado');  //('en_proceso', 'pendiente', 'finalizado'), //Estado del trámite
            $table->text('observaciones');  //Comentarios o notas adicionales sobre el trámite
            $table->text('documentos_adjuntos');   //ncentracionRuta de los documentos adjuntos relacionados (o una tabla separada de adjuntos)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_tramite');
    }
};
