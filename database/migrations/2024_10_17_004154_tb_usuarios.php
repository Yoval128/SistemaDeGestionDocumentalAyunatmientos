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
        Schema::create('tb_usuarios', function (Blueprint $table) {
            $table->bigIncrements('id_usuario');
            $table->string('nombre');
            $table->string('apellidoP');
            $table->string('apellidoM');
            $table->string('sexo');
            $table->date('fecha_nacimiento');
            $table->string('email');
            $table->string('password');
            $table->string('rol');
            $table->string('foto');
            $table->boolean('activo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_usuarios');
    }
};
