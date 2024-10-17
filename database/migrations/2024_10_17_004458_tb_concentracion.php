<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use PhpParser\Node\Expr\BinaryOp\BooleanOr;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tb_concentracion', function (Blueprint $table) {
            $table->bigIncrements('id_concentracion');
            $table->string('clave');
            $table->string('nombre_expediente');
            $table->string('fondo');
            $table->string('seccion');
            $table->string('subseccion');
            $table->string('serie');
            $table->string('subserie');
            $table->date('ano_creacion');
            $table->date('ano_cierre');
            $table->string('motivo_cierre');
            $table->string('legajos');
            $table->string('medida');
            $table->string('ubicacion_fisica');
            $table->text('archivo_pdf');
            $table->boolean('digitalizado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_concentracion');
    }
};
